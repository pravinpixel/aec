<div id="task-app">
    <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>
</div>  
@push('live-project-custom-styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
@endpush
@push('live-project-custom-scripts') 
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() { 
            setAllTask = () => {
                axios.get("{{ route('live-project.task-list-index', ['project_id' => $project->id]) }}").then((
                    response) => {
                    if (response.data.status) {
                        $('#task-app').html(response.data.view)
                    }
                })
            }
            closeSubTaskMenu = () => {
                $('#create-live-project-task-modal').toggleClass('modal-d-none') 
            }
            setAllTask()
            getLiveProjectSubTasks = (task_id) => { 
                axios.get(`{{ route('live-project.sub-task-index') }}/${task_id}`).then((response) => {
                    if (response.data.status) {
                        $('#live-project-sub-tasks-model').modal('show')
                        $('#live-project-sub-tasks-model-content').html(response.data.view)
                        $( "#sortable" ).sortable({
                            axis: 'y',
                            placeholder: "ui-state-highlight",
                            axis: 'y',
                            stop: function (event, ui) {
                                var data = $(this).sortable('toArray', { attribute: "data-id"}) 
                                axios.post(`{{ route('live-project.sub-task-change-order') }}`,{
                                    data : data
                                }).then((response) => {
                                    console.log(response.data)
                                });
                            }
                        });
                        // $( "#sortable" ).disableSelection();
                    }
                })
            }
            setLiveProjectSubSubTask = (type, sub_sub_task_id, element) => { 
                var inputs = $(`.${element.parentNode.parentNode.classList[0]} input[type=date]`)
                const start_date    = inputs[0]
                const end_date      = inputs[1]
                const delivery_date = inputs[2] 
                end_date.setAttribute('min',start_date.value)
                delivery_date.setAttribute('min',end_date.value)
                axios.post(`{{ route('live-project.sub-sub-task.update') }}/${sub_sub_task_id}`, {
                    type: type,
                    value: element.value
                }).then((response) => {
                    element.classList.remove('border-danger')
                });
            }
            deleteLiveProjectSubSubTask = (sub_sub_task_id, element) => {  
                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel',
                    reverseButtons: true,
                    allowOutsideClick :false,
                    allowEscapeKey:false
                }).then((result) => {
                    if (result.isConfirmed) { 
                        axios.delete(`{{ route('live-project.sub-sub-task.delete') }}/${sub_sub_task_id}`).then((response) => {
                            if(response.data.status) {
                                element.parentNode.parentNode.remove()
                                $(`#${element.attributes[1]['nodeValue']}`).html(response.data.progress)
                                Alert.success('Successfully Deleted !')
                            }
                        }) 
                    }
                })
            }
            deleteLiveProjectSubTask = (sub_task_id,element) => {
                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true,
                    allowOutsideClick :false,
                    allowEscapeKey:false
                }).then((result) => {
                    if (result.isConfirmed) { 
                        axios.delete(`{{ route('live-project.sub-task.delete') }}/${sub_task_id}`).then((response) => {
                            if(response.data.status) {
                                element.parentNode.parentNode.remove() 
                                Alert.success('Successfully Deleted !')
                            }
                        }) 
                    }
                })
            }
            createLiveProjectSubTask = (sub_task_id,row_id,element) => {
                $('#subTaskId').val(sub_task_id)
                $('#taskTableId').val(row_id)
                $('#create-live-project-task-modal').toggleClass('modal-d-none')
            }
            storeSubTask = () => {
                var errorCounts = 0
                const InputData = {
                    TaskName    : $('#TaskName').val(),
                    AssignTo    : $('#AssignTo').val(),
                    StartDate   : $('#StartDate').val(),
                    EndDate     : $('#EndDate').val(),
                    DeliveryDate: $('#DeliveryDate').val(),
                }
                Object.entries(InputData).map((item) => {
                    if(item[1] == '') {
                        errorCounts ++
                        const errorMessage = document.createElement("small");
                        const errorText = document.createTextNode('Please fill out this field.');
                        errorMessage.classList.add('text-danger')
                        errorMessage.appendChild(errorText); 
                        document.querySelector(`#${item[0]}`).parentNode.appendChild(errorMessage)
                        $(`#${item[0]}Error`).html('Please fill out this field.')
                    } else {
                        message = document.querySelector(`#${item[0]}`).parentNode.childNodes
                        Object.entries(message).map((item) => {
                            if(item[1].localName == 'small') {
                                item[1].remove()
                            }
                        })
                    }
                })
                if(errorCounts === 0) {
                    var sub_task_id = $('#subTaskId').val()
                    var task_id     = $('#taskId').val()
                    axios.post(`{{ route('live-project.sub-task.create') }}/${sub_task_id}`,InputData).then((response) => {
                        if(response.data.status) { 
                            Alert.success('Task to be Created!')
                            $('#create-live-project-task-modal').toggleClass('modal-d-none')
                            reFreshTask(task_id)
                        }
                    })
                }
            }
            reFreshTask = (task_id) => {
                axios.get(`{{ route('live-project.sub-task-index') }}/${task_id}`).then((response) => {
                    if (response.data.status) {
                        $('#live-project-sub-tasks-model-content').html(response.data.view)
                    }
                })
            }
            setTaskStatus = (sub_task_id,task_id,element) => {  
                var inputs = $(`.${element.parentNode.parentNode.parentNode.classList[0]} input , .${element.parentNode.parentNode.parentNode.classList[0]} select`)
                var errorCounts = 0
                Object.entries(inputs).map((item) => {
                    if(item[1].value !== undefined) {
                        if(item[1].value == '') {
                            errorCounts ++
                            item[1].classList.add('border-danger')
                        }else {
                            item[1].classList.remove('border-danger')
                        }
                    }
                })
                if(errorCounts === 0) {
                    axios.post(`{{ route("live-project.set-progress",['project_id'=>$project->id]) }}`,{
                        status     : element.checked === true ? 1: 0,
                        sub_task_id: sub_task_id,
                        task_id    : task_id,
                    }).then((response) => {
                        $(`#${element.attributes[2]['nodeValue']}`).html(response.data.progress)
                    })
                } else {
                    element.checked = false
                }
            }
        });
    </script>
@endpush
