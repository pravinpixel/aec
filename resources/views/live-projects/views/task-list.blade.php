<div id="task-app">
    <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>
</div> 
@push('live-project-custom-scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            axios.get("{{ route('live-project.task-list-index', ['project_id' => $project->id]) }}").then((
                response) => {
                if (response.data.status) {
                    $('#task-app').html(response.data.view)
                }
            })
            getLiveProjectSubTasks = (task_id) => {
                axios.get(`{{ route('live-project.sub-task-index') }}/${task_id}`).then((response) => {
                    if (response.data.status) {
                        $('#live-project-sub-tasks-model').modal('show')
                        $('#live-project-sub-tasks-model-content').html(response.data.view)
                    }
                })
            }
            setLiveProjectSubSubTask = (type, sub_sub_task_id, value) => {
                if (type == 'status') {
                    if (value.checked === true) {
                        value = 1
                    } else {
                        value = 0
                    }
                }
                axios.post(`{{ route('live-project.sub-sub-task.update') }}/${sub_sub_task_id}`, {
                    type: type,
                    value: value
                });
            }
            deleteLiveProjectSubSubTask = (sub_sub_task_id, element) => { 
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        cancelButton: 'btn btn-success rounded-pill',
                        confirmButton: 'btn btn-danger rounded-pill ms-2'
                    },
                    buttonsStyling: false
                })
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
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
                        axios.delete(`{{ route('live-project.sub-sub-task.delete') }}/${sub_sub_task_id}`).then((response) => {
                            if(response.data.status) {
                                element.parentNode.parentNode.remove()
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Successfully Deleted !',
                                    backdrop: 'swal2-backdrop-hide',
                                })
                            }
                        }) 
                    }
                })
            }
        });
    </script>
@endpush
