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


$filename = 'store_data.json';

//VYTIAHNUTIE DAT ZO SUBORU
function getData($a) {
    if(is_file($a)) {
        return file_get_contents($a);
    }
}

//DEKODOVANIE, PRIPOJENIE A ULOZENIE DAT
function processData($b) {
    date_default_timezone_set('Europe/Bratislava');
    $json_arr = json_decode(getData($b), true);
    if (date('H:i:s') > '21:00:00') {
        $json_arr[] = array(
            'name' => $_GET['name'],
            'date' => date('d. F Y'),
            'time' => date('H:i:s'),
            'late' => TRUE
        );
    } else {
        $json_arr[] = array(
            'name' => $_GET['name'],
            'date' => date('d. F Y'),
            'time' => date('H:i:s'),
            'late' => FALSE
        );
    };

    file_put_contents($b, json_encode($json_arr, JSON_PRETTY_PRINT));
    return $json_arr;
}

echo '<pre>';
print_r(processData($filename));
echo '</pre>';

//VYPISANIE DAT
function printArrival($c) {
    $lastArray = end($c);
    echo '<h1>Ahoj ' . $lastArray['name'] . '</h1><br />';
    echo '<p>Dnes je ' . $lastArray['date'] . '</p>';
    echo '<p>Tvoj čas príchodu je ' . $lastArray['time'] . '</p><br />';
}    

// printArrival(processData($filename))


/* --- test zapisania TRUE or FALSE
date_default_timezone_set('Europe/Bratislava');
$json_arr[] = array(
    'name' => 'Adrian',
    'date' => date('d. F Y'),
    'time' => date('H:i:s'),
    'late' => null
);
if (date('H:i:s') > '19:00:00') {
    $json_arr[0]['late'] = TRUE;
} else {
    $json_arr[0]['late'] = FALSE;
}

echo '<pre>';
print_r($json_arr);
echo '</pre>';
--- koniec testu */

        
?>

<a href="/academia/index.html">Späť na zápis</a>

</body>
</html>