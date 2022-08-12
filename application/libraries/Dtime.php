<?php

class Dtime 
{
    
    public function SelisiTgl($date1, $date2) { 
        //hitung selisih hari;
        $current = $date1;
        $datetime2 = date_create($date2);
        $count = 0;
        while(date_create($current) < $datetime2){
            $current = gmdate("Y-m-d", strtotime("+1 day", strtotime($current)));
            $count++;
        }
        return $count;
    }
    
    public function IsDiantara($val1, $val2, $d_time)
    {
        $datetime1 = new DateTime($val1);
        $datetime2 = new DateTime($val2);
        $thetime = new DateTime($d_time);
        return ($thetime >= $datetime1 && $thetime <= $datetime2) || ($thetime <= $datetime1 && $thetime >= $datetime2);
    }

    public function FormatJam($DateTime)
    {
        $DATETIME = new DateTime($DateTime);
        return $DATETIME->format("H:i");
    }
}
