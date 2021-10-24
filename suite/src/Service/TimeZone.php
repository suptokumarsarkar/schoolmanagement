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

    public function getTimezoneList(): array
    {
        static $timezones = null;
        if ($timezones === null) {
            $timezones = [];
            $offsets = [];
            $now = new \DateTime('now', new \DateTimeZone('UTC'));
            foreach (\DateTimeZone::listIdentifiers(\DateTimeZone::ALL) as $timezone) {

                // Calculate offset
                $now->setTimezone(new \DateTimeZone($timezone));
                $offsets[] = $offset = $now->getOffset();

                // Display text for UTC offset
                $hours = intval($offset / 3600);
                $minutes = abs(intval($offset % 3600 / 60));
                $utcDiff = 'UTC' . ($offset ? sprintf('%+03d:%02d', $hours, $minutes) : '');

                // Display text for name
                $name = str_replace('/', ', ',$timezone);
                $name = str_replace('_', ' ', $name);
                $name = str_replace('St ', 'St. ', $name);

                $timezones["$name ($utcDiff)"] = $timezone;
            }
        }

        return $timezones;
    }
}
