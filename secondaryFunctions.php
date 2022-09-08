<?php 

require_once 'mainFunctions.php';


//-------------- VYPISANIE MIEN STUDENTOV POMOCOU ARRAY MAP --------------

function studentName($student) {
    return $student['name'];
}

function emptyArr($json_arr) {
    $json_arr = (array) $json_arr;
    print_r(array_map('studentName', $json_arr));
}


// -------------- ZAPISOVANIE PRICHODOV DO POLA --------------

$arrivalData = 'prichody.json';
$arrivalArr = getData($arrivalData);

function addArrivalData($arrivalArr, $arrivalData) {
    $arrivalArr = (array) $arrivalArr;
    array_push($arrivalArr, date('H:i:s j. F Y'));
    
      file_put_contents($arrivalData, json_encode($arrivalArr, JSON_PRETTY_PRINT));
    return $arrivalArr;
}