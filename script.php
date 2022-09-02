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

$filename = 'studenti.json';

//VYTIAHNUTIE DAT ZO SUBORU
function getData($filename) {
    if(is_file($filename)) {
        $json_arr = json_decode(file_get_contents($filename) , true);
        return $json_arr;
    }
    $json_arr = [];
    return $json_arr;
}
$json_arr = getData($filename);


date_default_timezone_set('Europe/Bratislava');

//DEKODOVANIE, PRIPOJENIE A ULOZENIE DAT
function addData($json_arr, $filename, $isLate) {
    if (date('H:i:s') < '23:59:59' && date('H:i:s') > '21:00:00') {
        die('Nemôžeš sa zapísať!');
    }
    // $num = $json_arr['orderNum'];
    // $num++;
    $json_arr[] = [
        'name' => $_REQUEST['name'],
        'date' => date('j. F Y'),
        'time' => date('H:i:s'),
        'late' => $isLate,
        // 'orderNum' => $num
    ];
    file_put_contents($filename, json_encode($json_arr, JSON_PRETTY_PRINT));
    return $json_arr;
}

function isLate() {
    return date('H:i:s') > '08:00:00';
}
$isLate = isLate();


//VYPISANIE DAT
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


?>

<a href="/academia/index.html">Späť na zápis</a>

</body>
</html>