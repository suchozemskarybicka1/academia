<?php

class addLateToArrival
{

    public $date;

    public function __construct($date)
    {
        $this->date = $date;
    }

    public function isLate() {
        if ($this->date > '19:00:00')
            $this->date .= ' meskanie';
            return $this->date;
        }       

} 