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
    
    // VYPISANIE POZDRAVU S MENOM STUDENDTA, DATUMU A CASU 
    echo '<h1>Ahoj ' . $_GET['name'] . '</h1>';
    echo '<br />';
    echo '<p>Dnes je ' . date('d.m.Y') . '</p>';
    echo '<p>Tvoj čas príchodu je ' . date('H:i:s') . '</p>';
    echo '<br />';

    
    // --- VYTAHOVANIE A UKLADANIE DAT DO SUBORU ---

    $data = '';
    $filename = 'store_data.json';

    // POKIAL SUBOR EXISTUJE VYTIAHNE Z NEHO DATA A ZAPISE DO PREMENNEJ
    if(is_file($filename)) {
        $data = file_get_contents($filename);
    }

    // DEKODOVANIE  JSON DAT Z PREMENNEJ A ULOZENIE DO NOVEJ PREMENNEJ
    $json_arr = json_decode($data, true);

    // PRIPOJENIE NOVYCH DAT Z FORMULARU DO PREMENNEJ
    $json_arr[] = array(
        'name' => $_GET['name']
    );

    // ULOZENIE A ENCODE DAT DO SUBORU 
    file_put_contents($filename, json_encode($json_arr, JSON_PRETTY_PRINT));

    echo '<br />';
    echo '<a href="/academia/index.html">Späť na zápis</a>';
    
     // --- KONIEC --- VYTAHOVANIE A UKLADANIE DAT DO SUBORU ---
?>

</body>
</html>