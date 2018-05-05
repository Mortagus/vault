@extends('app')

@section('title', 'Calendar')

@include('partials.top-menu')

@section('complement-css')
    @parent
    <style>
        #calendar-main h1 {
            text-decoration: underline;
        }
        #calendar-container {
            height: calc(100vh - 225px);
        }

        #calendar-container .table {
            height: 100%;
        }

        #calendar-container .table td,
        #calendar-container .table th {
            text-align: center;
            width: 14.29%;
        }

        #calendar-container .table td {
            padding: 5px 10px;
            border: 1px solid #cccccc;
            vertical-align: top;
            text-align: left;
            height: 20%;
        }

        #calendar-container .calendar_table_6_weeks td {
            height: 16.67%
        }

        #calendar-container td.out-month-day {
            opacity: 0.3;
        }

        #calendar-container td.normal-day {
            font-size: 1.3em;
        }
    </style>
@endsection

@section('main-container')
    <?php $weekCounter = $calendar->getWeeks(); ?>
    <div id="calendar-main" class="container" style="padding: 50px 0;">
        <h1>Calendar Exercice (from GrafikArt.fr)</h1>
        <div class="d-flex">
            <h2>{{ $calendar }}</h2>
            <div>
                <a href="{{ route('calendar-index', $calendar->getPreviousMonthParameters()) }}" class="btn btn-primary">&lt;</a>
                <a href="{{ route('calendar-index', $calendar->getNextMonthParameters()) }}" class="btn btn-primary">&gt;</a>
            </div>
        </div>
        <div class="col-md-12" id="calendar-container">
            <table class="table calendar_table_{{ $weekCounter }}_weeks">
                <thead>
                    <tr>
                        @foreach ($calendar->weekDayNames as $dayName)
                            <th class="calendar_week_day">{{ $dayName }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @for ($week = 0; $week < $weekCounter; $week++)
                        <tr>
                            @foreach ($calendar->weekDayNames as $index => $dayName)
                            <td class="{{ $calendar->isWithinMonth($currentCalendarDay) ? 'normal-day' : 'out-month-day'}}">
                                {{ $currentCalendarDay->format('d') }}
                                <?php $currentCalendarDay = $currentCalendarDay->add($oneDayInterval) ?>
                            </td>
                            @endforeach
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection