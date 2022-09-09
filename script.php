<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia Project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php


// -------------- REQUIRE --------------
require_once 'mainFunctions.php';
require_once 'secondaryFunctions.php';



// -------------- TIMEZONE SET --------------
date_default_timezone_set('Europe/Bratislava');



// -------------- VARIABLES --------------
$filename = 'studenti.json';
$json_arr = getData($filename);

$arrivalData = 'prichody.json';
$arrivalArr = getData($arrivalData);

$isLate = isLate();



//-------------- FUNCTIONS CALL --------------

// CALL mainFuncions
printArrival(addData($json_arr, $filename, $isLate));


// VYPISANIE MIEN STUDENTOV POMOCOU ARRAY MAP 
emptyArr($json_arr);


// ZAPISOVANIE PRICHODOV DO POLA 
addArrivalData($arrivalArr, $arrivalData);


// ITEROVANIE 
iterationLate(getData($arrivalData));


?>

<br />
<a href="/academia/index.html">Späť na zápis</a>
<br />

</body>
</html>