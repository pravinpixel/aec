@extends('live-projects.layout')

@section('admin-content')
    <div class="p-4">
        <div id='calendar'></div>
    </div>
    <div id="updateOrCreateEvent" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form class="modal-dialog" onsubmit="updateOrCreateEvent(event)">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title fw-bold" id="modal-label"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="event-type">
                    <input type="hidden" id="event-id">
                    <input type="hidden" id="start-date">
                    <input type="hidden" id="end-date"> 
                    <div>
                        <label for="event-name" class="form-label col-10">Event Color</label>
                        <div class="d-flex flex-wrap justify-content-between gap-1 p-1 bg-white border rounded">
                            @foreach (colors() as $key => $color)
                                <input type="radio" id="picker_{{ $key }}" value="{{ $color }}"
                                    name="color-code" class="form-check-input" required>
                                <label for="picker_{{ $key }}" style="background: {{ $color }}" class="rounded"></label>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="event-name" class="form-label col-10">Event Name</label>
                        <textarea id="event-name" class="form-control" cols="30" rows="5" maxlength="255" required></textarea>
                        <small>Max : 255 characters </small>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" onclick="removeEvent()" id="delete-button"
                        class="btn-sm btn btn-danger shadow-sm"><i class="fa fa-trash"></i></button>
                    <div>
                        <button type="button" class="btn-sm btn btn-light border  ms-2"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn-sm btn btn-info shadow-sm ms-2">Save changes</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </form><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@push('live-project-custom-scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            const myCalendar = new FullCalendar.Calendar(calendarEl, {
                editable: true,
                height: window.innerHeight - 200,
                themeSystem: "bootstrap",
                customButtons: {
                    createEventButton: {
                        text: '+ Create Today Event',
                        click: function() {
                            let currentDate = moment().format('YYYY-MM-DD');
                            setFormModal('CREATE', {
                                startStr: currentDate,
                                endStr: currentDate,
                            })
                        }
                    }
                },
                buttonText: {
                    today: "Today",
                    month: "Month",
                    week: "Week",
                    day: "Day",
                    list: "List",
                },
                headerToolbar: {
                    right: "createEventButton prev,today,next",
                    center: "title",
                    left: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
                },
                handleWindowResize: true,
                selectable: true,
                selectHelper: true,
                displayEventTime: true,
                select: (data) => setFormModal('CREATE', data),
                eventClick: (data) => setFormModal('EDIT', data.event),
                eventDrop: (data) => updateEventApi(data.event),
                eventResize: (data) => updateEventApi(data.event),
                events: {
                    url: "{{ route('calendar.events') }}",
                },
            })
            myCalendar.render()
            setFormModal = (type, data) => {
                if(data.durationEditable === false) {
                    return false
                }
                $('#event-type').val(type)
                $('#delete-button').css('opacity', type === 'CREATE' ? 0 : 1)
                $('#modal-label').text(type === 'CREATE' ? 'Add New Event' : 'Edit Event')
                $('#event-id').val(type === 'CREATE' ? "" : data.id)
                $('#event-name').val(type === 'CREATE' ? '' : data.title)
                $('#start-date').val(type === 'CREATE' ? data.startStr : data.startStr)
                $('#end-date').val(type === 'CREATE' ? data.endStr : (data.end == null ? data.startStr : data.endStr))
                if (type === 'EDIT') {
                    const checkbox = document.querySelectorAll(`input[name=color-code]`)
                    checkbox.forEach(element => {
                        if (element.value === data.backgroundColor) {
                            element.checked = true
                        }
                    });
                }
                $('#updateOrCreateEvent').modal('show')
            }
            updateOrCreateEvent = (event) => {
                event.preventDefault()
                const formType = $('#event-type').val()
                const event_id = $('#event-id').val()
                axios.post(`{{ route('calendar.update-or-create') }}`, {
                    id: event_id,
                    title: $('#event-name').val(),
                    color: $('input[name=color-code]:checked').val(),
                    start: $('#start-date').val(),
                    end: $('#end-date').val(),
                }).then(response => {
                    if (formType === 'EDIT') {
                        myCalendar.getEventById(event_id).remove()
                    }
                    myCalendar.addEvent(response.data)
                    $('#updateOrCreateEvent').modal('hide')
                })
            }
            removeEvent = () => {
                const event_id = $('#event-id').val()
                deleteEventApi(event_id)
                myCalendar.getEventById(event_id).remove()
                $('#updateOrCreateEvent').modal('hide')
            }
            updateEventApi = (event) => {
                axios.post(`{{ route('calendar.update-or-create') }}`, {
                    id: event.id,
                    title: event.title,
                    color: event.backgroundColor,
                    start: moment(event.start).format("Y-MM-DD"),
                    end: moment(event.end).format("Y-MM-DD")
                })
            }
            deleteEventApi = (id) => {
                axios.delete(`{{ route('calendar.delete') }}/${id}`)
            }
        });
    </script>
@endpush
