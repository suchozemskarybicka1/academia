<?php 

require_once 'script.php';


//-------------- VYPISANIE MIEN STUDENTOV POMOCOU ARRAY MAP --------------

function studentName($student) {
    return $student['name'];
}

function emptyArr($json_arr) {
    $json_arr = (array) $json_arr;
    echo '<pre>';
    print_r(array_map('studentName', $json_arr));
    echo '</pre>';
}


// -------------- ZAPISOVANIE PRICHODOV DO POLA --------------

function addArrivalData($arrivalArr, $arrivalData) {
    $arrivalArr = (array) $arrivalArr;
    array_push($arrivalArr, date('H:i:s j. F Y'));
    
      file_put_contents($arrivalData, json_encode($arrivalArr, JSON_PRETTY_PRINT));
    return $arrivalArr;
}



// -------------- POMOCNA FUNKCIA PRE PRIPISANIE MESKANIA --------------

function iterationLate($lateArrival) {

    foreach ($lateArrival as $key => $value) {
        if ($value > '08:00:00') {
            $lateArrival[$key] .= ' meskanie';
        }
        print_r('<pre>' . $lateArrival[$key] . '</pre>');
    }

}