<?php


class SecondaryFunctions
{

    public $arrivalData;
    public $arrivalArr;


    public function __construct($arrivalArr, $arrivalData)
    {
        $this->arrivalArr = $arrivalArr;
        $this->arrivalData = $arrivalData;
    }

    public function addArrivalData() {
        $this->arrivalArr = (array) $this->arrivalArr;
        array_push($this->arrivalArr, date('H:i:s j. F Y'));
        
          file_put_contents($this->arrivalData, json_encode($this->arrivalArr, JSON_PRETTY_PRINT));
        return $this->arrivalArr;
    }
    

}