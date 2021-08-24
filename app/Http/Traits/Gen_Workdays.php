<?php

namespace App\Http\Traits;

use App\Models\Workday;

trait Gen_Workdays
{
    public function get_workdays($start, $holidays = [])
    {
        $sdate = strtotime($start);
        $end = strtotime(date("Y-m-t", $sdate));
        $days = ($end - $sdate) / 86400 + 1;
        $no_full_weeks = floor($days / 7);
        $no_remaining_days = fmod($days, 7);

        $the_first_day_of_week = date("N", $sdate);
        $the_last_day_of_week = date("N", $end);

        if ($the_first_day_of_week <= $the_last_day_of_week) {
            if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) {
                $no_remaining_days--;
            }
        }
        else {
            if ($the_first_day_of_week == 7) {
                $no_remaining_days--;
            }
            else {
                $no_remaining_days--;
            }

        }

        $workingDays = $no_full_weeks * 6;
        if ($no_remaining_days > 0) {
            $workingDays += $no_remaining_days;
        }

        foreach ($holidays as $holiday) {
            $time_stamp = strtotime($holiday);
            if ($sdate <= $time_stamp && $time_stamp <= $end && date("N", $time_stamp) != 7)
                $workingDays--;
        }
 	 		
        $ins = new Workday();
        $ins->wo_period = date_format(date_create($start), "Y-m");
        $ins->wo_tdays = $workingDays;
        $ins->wo_thours = $workingDays * 8;
        if($ins->save()) {
            return true;
        }
        else {
            return false;
        }

    }
}
