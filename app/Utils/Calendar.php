<?php
/**
 * Created by PhpStorm.
 * User: Benouz
 * Date: 28-04-18
 * Time: 17:47
 */

namespace App\Utils;


class Calendar
{
    const FIRST_MONTH_INDEX = 1;
    const LAST_MONTH_INDEX = 12;
    const FIRST_YEAR_INDEX = 1970;
    const LAST_YEAR_INDEX = 2500;

    private $monthNames = [
        'Janvier', 'Février', 'Mars', 'Avril',
        'Mai', 'Juin', 'Juillet', 'Août',
        'Septembre', 'Octobre', 'Novembre', 'Décembre'
    ];

    public $weekDayNames = [
        'Lundi', 'Mardi', 'Mercredi',
        'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'
    ];

    /**
     * @var int $month
     */
    private $month;

    /**
     * @var int $year
     */
    private $year;

    /**
     * Calendar constructor.
     * @param int $month : le mois compris entre 1 et 12
     * @param int $year :
     * @throws \Exception
     */
    public function __construct($month = null, $year = null)
    {
        $this->setMonth($month);
        $this->setYear($year);
    }

    /**
     * Just something to display by default
     *
     * @return string
     */
    public function __toString()
    {
        return $this->monthNames[$this->month - 1] . ' ' . $this->year;
    }

    /**
     * Return the number of weeks for the month designated by the parameters received
     *
     * @return int
     */
    public function getWeeks()
    {
        $firstDay = $this->getFirstDayOfTheMonth();
        $lastDay = $this->getLastDayOfTheMonth($firstDay);

        $firstDayWeekNumber = intval($firstDay->format('W'));
        $lastDayWeekNumber = intval($lastDay->format('W'));

        $weekCounter = max($firstDayWeekNumber, $lastDayWeekNumber) % 52;
        $weekCounter -= min($firstDayWeekNumber, $lastDayWeekNumber) - 1;

        return abs($weekCounter);
    }

    /**
     * @return \DateTime
     */
    public function getFirstDayOfTheMonth()
    {
        return new \DateTime($this->year . '-' . $this->month . '-01');
    }

    /**
     * @param \DateTime $firstDay
     * @return \DateTime
     */
    public function getLastDayOfTheMonth(\DateTime $firstDay)
    {
        return new \DateTime($firstDay->format('Y-m-t'));
    }

    /**
     * @param \DateTime $day
     * @return \DateTime
     * @throws \Exception
     */
    public function getFirstDayOfTheWeek(\DateTime $day = null)
    {
        if ($day === null) {
            $day = $this->getFirstDayOfTheMonth();
        }
        return (clone $day)->modify('last monday');
    }

    /**
     * @param \DateTime $day
     * @return bool
     */
    public function isWithinMonth(\DateTime $day)
    {
        $monthToTest = intval($day->format('m'));

        return $monthToTest == $this->month;
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    /**
     * @param int $month
     * @return Calendar
     * @throws \Exception
     */
    public function setMonth($month): Calendar
    {
        $month = $this->sanitizeMonth($month);
        $this->checkMonth($month);
        $this->month = $month;

        return $this;
    }

    /**
     * @param $month
     * @return int
     */
    private function sanitizeMonth($month)
    {
        if ($month === null) {
            $month = date('m');
        }

        return intval($month);
    }

    /**
     * @param $month
     * @throws \Exception
     */
    private function checkMonth($month)
    {
        if ($month < self::FIRST_MONTH_INDEX || $month > self::LAST_MONTH_INDEX) {
            throw new \Exception('[' . $month . '] is an invalid month value.');
        }
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     * @return Calendar
     * @throws \Exception
     */
    public function setYear($year): Calendar
    {
        $year = $this->sanitizeYear($year);
        $this->checkYear($year);
        $this->year = $year;

        return $this;
    }

    /**
     * @param $year
     * @return int
     */
    private function sanitizeYear($year)
    {
        if ($year === null) {
            $year = date('Y');
        }

        return intval($year);
    }

    /**
     * @param $year
     * @throws \Exception
     */
    private function checkYear($year)
    {
        if ($year < self::FIRST_YEAR_INDEX || $year > self::LAST_YEAR_INDEX) {
            throw new \Exception('[' . $year . '] is an invalid year value.');
        }
    }
}