@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nem müködik') }}</div>

                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    let learndayData = <?php echo json_encode($learnDays); ?>;
    console.log(learndayData);

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            /* Tulajdonságok eleje */
            themeSystem: 'bootstrap5',

            initialView: 'dayGridMonth',
            selectable: true,
            editable: true,
            dayMaxEvents: true,
            events: [
                <?php
                for ($i = 0; $i < count($learnDays); $i++) {
                    echo "{title: '" . $learnDays[$i]->name . "', start: '2024-01-2" . $i . "',end: '2018-01-24',allDay: false},";
                } ?>
            ],
            dateClick: function(info) {
                alert('Date: ' + info.dateStr);
                alert('Resource ID: ' + info.resource.id);
            },
            eventClick: function(info) {
                alert('Event is clicked');
            }

            /* Tulajdonságok vége */
        });
        calendar.render();
    });
</script>

@endsection
