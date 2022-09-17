<?php

class GoatClass
{

    public $date;

    public function __construct($date)
    {
        $this->date = $date;
    }

    public function getLate() {
        if ($this->date > '08:00:00')
            $this->date .= 'meskanie';
            return $this->date;
        }       

} 