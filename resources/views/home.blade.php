@extends('layouts.app')

@section('content')
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid' ],
                editable: true,
                eventLimit: true,
                events: [
                @foreach($events as $event)
                    {
                        title: '{{ $event->title }}',
                        start: '{{ $event->start_time }}',
                        end: '{{ $event->end_time }}'
                    },
                @endforeach
                ]
            });
            calendar.render();
        });

    </script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Booking table</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id='calendar'></div>
                    <div class="text-left mt-3">
                        <a class="btn-info btn">Book a room</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
