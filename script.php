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



//VYTIAHNUTIE DAT ZO SUBORU
/* function getData($dataFile) {
    if(is_file($dataFile)) {
        return file_get_contents($dataFile);
    }
} */
$filename = 'store_data.json';

function getData($filename) {
    if(is_file($filename)) {
        $json_arr = json_decode(file_get_contents($filename) , true);
        return $json_arr;
    } else {
        $json_arr = [];
        return $json_arr;
    }
}

$json_arr = getData($filename);


//DEKODOVANIE, PRIPOJENIE A ULOZENIE DAT
function addData($json_arr, $filename) {
    date_default_timezone_set('Europe/Bratislava');
    $json_arr[] = [
        'name' => $_GET['name'],
        'date' => date('d. F Y'),
        'time' => date('H:i:s'),
        'late' => date('H:i:s') > '19:00:00'
    ];
    file_put_contents($filename, json_encode($json_arr, JSON_PRETTY_PRINT));
    return $json_arr;
}


//VYPISANIE DAT
function printArrival($json_arr) {
    $lastArray = end($json_arr);
    echo '<h1>Ahoj ' . $lastArray['name'] . '</h1><br />';
    echo '<p>Dnes je ' . $lastArray['date'] . '</p>';
    echo '<p>Tvoj čas príchodu je ' . $lastArray['time'] . '</p><br />';
}

printArrival(addData($json_arr, $filename));


?>

<a href="/academia/index.html">Späť na zápis</a>

</body>
</html>