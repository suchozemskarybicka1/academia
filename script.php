<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia Project</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    
<?php


// -------------- REQUIRE --------------
// require_once 'FuncStudentDataProcessing.php';
// require_once 'FuncArrivalDateProcessing.php';

require_once 'StudentDataProcessing.php';
require_once 'ArrivalDateProcessing.php';
require_once 'addLateToArrival.php';


// -------------- TIMEZONE SET --------------
date_default_timezone_set('Europe/Bratislava');


/*
// -------------- VARIABLES --------------
$filename = 'studenti.json';
$json_arr = getData($filename);
$isLate = isLate();

$arrivalData = 'prichody.json';
$arrivalArr = getData($arrivalData);


//-------------- FUNCTIONS CALL --------------

// CALL mainFuncions
printArrival(addData($json_arr, $filename, $isLate));


// VYPISANIE MIEN STUDENTOV POMOCOU ARRAY MAP 
emptyArr($json_arr);


// ZAPISOVANIE PRICHODOV DO POLA 
addArrivalData($arrivalArr, $arrivalData);


// ITEROVANIE 
iterationLate(getData($arrivalData));
*/

// ------------ INSTANCE CLASS ------------
$arrivalFile = 'prichody.json';
$arrivalArr = StudentDataProcessing::getData($arrivalFile);

// $arrival = new ArrivalDateProcessing($arrivalArr, $arrivalFile);
// $arrival->addArrivalData();
// print_r($arrival->arrivalArr);

// $arrival->getLate();


// ------------ STATIC CLASS ------------

/*
$filename = 'studenti.json';
$json_arr = StudentDataProcessing::getData($filename);
$addingData = StudentDataProcessing::addData($json_arr, $filename);

StudentDataProcessing::printArrival($addingData);
*/

// ------------ DOPLNKOVE ZADANIE  ------------


foreach ($arrivalArr as $key => $value) {
    $object = new addLateToArrival($value);
    $object->isLate();
    echo '<pre>';
    var_dump($object);
    echo '</pre>';
}


?>


<br />
<!-- <a href="/academia/index.html">Späť na zápis</a> -->
<br />

</body>
</html>