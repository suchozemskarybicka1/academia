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
// require_once 'mainFunctions.php';
// require_once 'secondaryFunctions.php';

require_once 'class.php';



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

// ------------ CLASS ------------

$filename = 'studenti.json';
$json_arr = MainFunction::getData($filename);
// $isLate = MainFunction::isLate();
$addingData = MainFunction::addData($json_arr, $filename);

MainFunction::printArrival($addingData);


?>

<br />
<a href="/academia/index.html">Späť na zápis</a>
<br />

</body>
</html>