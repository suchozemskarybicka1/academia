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

    // DEFAULT TIME ZONE
    date_default_timezone_set('Europe/Bratislava');
    
    // VARIABLES
    // $actualDate = date('d. F Y');
    // $actualTime = date('H:i:s');

    
    
    // --- VYTAHOVANIE A UKLADANIE DAT DO SUBORU ---
    
    $filename = 'store_data.json';
    
    //VYTIAHNUTIE DAT ZO SUBORU
    function getData($filename) {
        if(is_file($filename)) {
            return file_get_contents($filename);
        }
    }

    // VYPISANIE POZDRAVU S MENOM STUDENDTA, DATUMU A CASU 
    function printArrival($json_arr) {
        $lastArray = end($json_arr);
        echo '<h1>Ahoj ' . $lastArray['name'] . '</h1><br />';
        echo '<p>Dnes je ' . $lastArray['date'] . '</p>';
        echo '<p>Tvoj čas príchodu je ' . $lastArray['time'] . '</p><br />';
    }    
    
    // DEKODOVANIE  JSON DAT Z PREMENNEJ A ULOZENIE DO NOVEJ PREMENNEJ
    $json_arr = json_decode(getData($filename), true);
    
    // PRIPOJENIE NOVYCH DAT Z FORMULARU DO PREMENNEJ
    $json_arr[] = array(
        'name' => $_GET['name'],
        'date' => date('d. F Y'),
        'time' => date('H:i:s')
    );
    
    // ULOZENIE A ENCODE DAT DO SUBORU 
    file_put_contents($filename, json_encode($json_arr, JSON_PRETTY_PRINT));
    
    printArrival($json_arr);

    // --- KONIEC --- VYTAHOVANIE A UKLADANIE DAT DO SUBORU ---


?>

    <a href="/academia/index.html">Späť na zápis</a>

</body>
</html>