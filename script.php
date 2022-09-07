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



//-------------- VYTIAHNUTIE DAT ZO SUBORU --------------

$filename = 'studenti.json';

function getData($file) {
    if(is_file($file)) {
        $json_arr = json_decode(file_get_contents($file) , true);
        return $json_arr;
    }
    $json_arr = [];
    return $json_arr;
}
$json_arr = getData($filename);


//-------------- PRIPOJENIE A ULOZENIE DAT --------------

date_default_timezone_set('Europe/Bratislava');

function addData($json_arr, $file, $isLate) {
    if (date('H:i:s') < '23:59:59' && date('H:i:s') > '21:00:00') {
        die('Nemôžeš sa zapísať!');
    }
    
    $json_arr = (array) $json_arr;

    //incrementovanie poradoveho cisla pri zapise studenta
    $num = count($json_arr);
    $num++;
    
    $json_arr[] = [
        'name' => $_REQUEST['name'],
        'date' => date('j. F Y'),
        'time' => date('H:i:s'),
        'late' => $isLate,
        'order' => $num
    ];
    
    file_put_contents($file, json_encode($json_arr, JSON_PRETTY_PRINT));
    return $json_arr;
}

// -------------- MESKANIE --------------

function isLate() {
    return date('H:i:s') > '08:00:00';
}
$isLate = isLate();


//-------------- VYPISANIE DAT --------------

function printArrival($json_arr) {
    $lastArray = end($json_arr);
    echo '<h1>Ahoj ' . $lastArray['name'] . '</h1>';
    if($lastArray['late']) {
        echo '<h2>Meškáš ty fiškus jeden!</h2><br />';
    }
    echo '<p>Dnes je ' . $lastArray['date'] . '</p>';
    echo '<p>Tvoj čas príchodu je ' . $lastArray['time'] . '</p><br />';
}

printArrival(addData($json_arr, $filename, $isLate));


echo '<a href="/academia/index.html">Späť na zápis</a><br />';


// ------------------------ KONIEC ------------------------



//-------------- VYPISANIE MIEN STUDENTOV POMOCOU ARRAY MAP --------------

function studentName($student) {
    return $student['name'];
}

function emptyArr($json_arr) {
    $json_arr = (array) $json_arr;
    print_r(array_map('studentName', $json_arr));
}

echo '<pre>';
emptyArr($json_arr);
echo '</pre>';

// ------------------------ KONIEC ------------------------



// -------------- ZAPISOVANIE PRICHODOV DO POLA --------------

$arrivalData = 'prichody.json';
$arrivalArr = getData($arrivalData);

function addArrivalData($arrivalArr, $arrivalData) {
    $arrivalArr = (array) $arrivalArr;
    array_push($arrivalArr, date('H:i:s j. F Y'));
    
      file_put_contents($arrivalData, json_encode($arrivalArr, JSON_PRETTY_PRINT));
    return $arrivalArr;
}

addArrivalData($arrivalArr, $arrivalData);
// ------------------------ KONIEC ------------------------


//  SKUSANIE a ROZROBENE -------------- ITEROVANIE --------------

$lateArrival = getData($arrivalData);

foreach( $lateArrival as $value) {
    $lateArrival = $lateArrival . ' meskanie';
}


echo '<pre>';
print_r($lateArrival);
echo '</pre>';

// ------------------------ KONIEC ------------------------

?>

<br />
<br />

</body>
</html>