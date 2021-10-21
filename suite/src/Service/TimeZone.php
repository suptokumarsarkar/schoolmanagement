<?php

namespace App\Service;

Class TimeZone{
    private string $currentTimezone;
    private string $time;
    function setTimezone($currentTimezone){
        $this->currentTimezone = $currentTimezone;
    }
    public function setTime($time): self{
        $this->time = $time;
        return $this;
    }
    public function getTime(): string{
        return $this->time;
    }
    public function convoTime($timezone): string{
//        Set The Timezone To Default
        date_default_timezone_set($this->currentTimezone);

//        Calculating Time In BD ForMat
        $PrevTime = strtotime($this->getTime());

//        Setting Time as Need
        date_default_timezone_set($timezone);

        $CurTime = date("h:i a, d/m/y", $PrevTime);

//        Setting The TimeZone to Default
        date_default_timezone_set($this->currentTimezone);

//        Return Timezone
        return $CurTime;
    }
}
