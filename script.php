<?php

    echo '<h1>Ahoj</h1>';

    // DEFAULT TIME ZONE
    date_default_timezone_set('Europe/Bratislava');
    
    echo date('H:i:s');
    echo '<br />';
    echo date('d.m.Y');


    $data = '';
    $filename = 'store_data.json';
    
    if(is_file($filename)) {
        $data = file_get_contents($filename);
    }

    $json_arr = json_decode($data, true);


    $json_arr = array(
        'name' => $_GET['name']
    );

    file_put_contents($filename, json_encode($json_arr, JSON_PRETTY_PRINT), FILE_APPEND);

?>