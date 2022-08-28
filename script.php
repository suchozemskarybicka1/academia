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

$filename = 'store_data.json';

//VYTIAHNUTIE DAT ZO SUBORU
function getData($a) {
    if(is_file($a)) {
        return file_get_contents($a);
    }
}

//DEKODOVANIE, PRIPIJENIE A ULOZENIE DAT
function processData($b) {
    date_default_timezone_set('Europe/Bratislava');
    $json_arr = json_decode(getData($b), true);
    $json_arr[] = array(
        'name' => $_GET['name'],
        'date' => date('d. F Y'),
        'time' => date('H:i:s')
    );
    file_put_contents($b, json_encode($json_arr, JSON_PRETTY_PRINT));
    return $json_arr;
}

// processData($filename);

//VYPISANIE DAT
function printArrival($c) {
    $lastArray = end($c);
    echo '<h1>Ahoj ' . $lastArray['name'] . '</h1><br />';
    echo '<p>Dnes je ' . $lastArray['date'] . '</p>';
    echo '<p>Tvoj čas príchodu je ' . $lastArray['time'] . '</p><br />';
}    

if(printArrival(processData($filename))) {
    
};

// --- KONIEC --- VYTAHOVANIE A UKLADANIE DAT DO SUBORU ---


?>

<a href="/academia/index.html">Späť na zápis</a>

</body>
</html>