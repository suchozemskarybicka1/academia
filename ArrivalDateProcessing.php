<?php


class ArrivalDateProcessing
{

    public $arrivalFile;
    public $arrivalArr;


    public function __construct($arrivalArr, $arrivalFile)
    {
        $this->arrivalArr = $arrivalArr;
        $this->arrivalFile = $arrivalFile;
    }

    public function addArrivalData() {
        $this->arrivalArr = (array) $this->arrivalArr;
        array_push($this->arrivalArr, date('H:i:s j. F Y'));
        
          file_put_contents($this->arrivalFile, json_encode($this->arrivalArr, JSON_PRETTY_PRINT));
        return $this->arrivalArr;
    }
    
    private function iterationLate() {
        foreach ($this->arrivalArr as $key => $value) {
            if ($value > '08:00:00') {
                $this->arrivalArr[$key] .= ' meskanie';
            }
            print_r('<pre>' . $this->arrivalArr[$key] . '</pre>');
        }
    }
    
    public function getLate() {
        $this->iterationLate();
    }

}