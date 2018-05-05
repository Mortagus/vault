<?php

namespace App\Http\Controllers;

use App\Utils\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * @param null $year
     * @param null $month
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function index($year = null, $month = null)
    {
        try {
            $calendar = new Calendar($month, $year);
            return view('calendar.index', [
                'calendar' => $calendar,
                'firstCalendarDay' => $calendar->getFirstDayOfTheWeek(),
                'currentCalendarDay' => $calendar->getFirstDayOfTheWeek(),
                'oneDayInterval' => new \DateInterval('P1D')
            ]);
        } catch (\Exception $e) {
            return 'oupsy: ' . $e->getMessage();
        }
    }
}
