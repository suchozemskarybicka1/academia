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

require 'mainFunctions.php';
require_once 'secondaryFunctions.php';


//-------------- VOLANIE mainFuncions --------------
printArrival(addData($json_arr, $filename, $isLate));




//-------------- VYPISANIE MIEN STUDENTOV POMOCOU ARRAY MAP --------------
echo '<pre>';
emptyArr($json_arr);
echo '</pre>';



// -------------- ZAPISOVANIE PRICHODOV DO POLA --------------
addArrivalData($arrivalArr, $arrivalData);


//  SKUSANIE a ROZROBENE -------------- ITEROVANIE --------------

$lateArrival = getData($arrivalData);

echo '<pre>';
print_r($lateArrival);
echo '</pre>';


foreach ($lateArrival as $value) {
    if ($value > '20:00:00') {
        $value = $value . ' meskanie <br/>';
        print_r($value);
    }
}


?>

<br />
<a href="/academia/index.html">Späť na zápis</a>
<br />

</body>
</html>