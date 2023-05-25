@extends('live-projects.layout')

@section('admin-content')
    <div class="col-md-11 mx-auto pt-md-4">
        <div class="card shadow-sm border">
            <div class="card-body">
                <div id='calendar'></div>
            </div>
        </div>
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
                    <div class="d-flex">
                        <label for="event-name" class="form-label col-10">Event Name</label>
                        <label for="event-color" class="form-label">Event Color</label>
                    </div>
                    <div class="input-group">
                        <input type="text" id="event-name" class="form-control w-75" placeholder="Type here..." required>
                        <input class="form-control" id="event-color" type="color" name="color" value="#252525" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info shadow-sm ms-2">Save changes</button>
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
                        text: 'Create Today Event',
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
                events: {
                    url: "http://url/getMonthlyEventList"
                },
                // events: [{
                //     title: 'Internal team meeting',
                //     start: '2023-05-10',
                //     end: '2023-05-15',
                //     color: "#845EC2",
                //     id: 1,
                //     editable: true
                // }, ],
                selectable: true,
                selectHelper: true,
                displayEventTime: true,
                select: (event) => setFormModal('CREATE', event),
                eventClick: (data) => setFormModal('EDIT', data.event),
                eventDrop: (data) => {
                    // var event_start = FullCalendar.formatDate(data.event.start, "Y-MM-DD");
                    // var event_end = FullCalendar.formatDate(data.event.end, "Y-MM-DD");
                    console.log(data)
                },
            })
            myCalendar.render()

            setFormModal = (type, data) => {
                $('#event-type').val(type)
                $('#modal-label').text(type === 'CREATE' ? 'Add New Event' : 'Edit Event')
                $('#event-id').val(type === 'CREATE' ? "" : data.id)
                $('#event-name').val(type === 'CREATE' ? '' : data.title)
                $('#start-date').val(data.startStr)
                $('#end-date').val(data.endStr)
                $('#event-color').val(type === 'CREATE' ? '#936C00' : data.backgroundColor),
                    $('#updateOrCreateEvent').modal('show')
            }
            updateOrCreateEvent = (event) => {
                event.preventDefault()
                const formType = $('#event-type').val()
                const event_id = $('#event-id').val()
                if (formType === 'EDIT') {
                    myCalendar.getEventById(event_id).remove()
                }
                myCalendar.addEvent({
                    id: event_id,
                    title: $('#event-name').val(),
                    color: $('#event-color').val(),
                    start: $('#start-date').val(),
                    end: $('#end-date').val(),
                    allDay: true
                })
                $('#updateOrCreateEvent').modal('hide')
            }
        });
    </script>
@endpush
