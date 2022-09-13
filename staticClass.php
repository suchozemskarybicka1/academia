<?php


class MainFunction  
{

    public static function getData($file) {
        if(is_file($file)) {
            $json_arr = json_decode(file_get_contents($file) , true);
            return $json_arr;
        }
        $json_arr = [];
        return $json_arr;
    }


    public static function addData($json_arr, $file) {
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
            'late' => self::isLate(),
            'order' => $num
        ];
        
        file_put_contents($file, json_encode($json_arr, JSON_PRETTY_PRINT));
        return $json_arr;
    }


    // -------------- MESKANIE --------------

    public static function isLate() {
        return date('H:i:s') > '08:00:00';
    }


    //-------------- VYPISANIE DAT --------------

    public static function printArrival($json_arr) {
        $lastArray = end($json_arr);
        echo '<h1>Ahoj ' . $lastArray['name'] . '</h1>';
        if($lastArray['late']) {
            echo '<h2>Meškáš ty fiškus jeden!</h2><br />';
        }
        echo '<p>Dnes je ' . $lastArray['date'] . '</p>';
        echo '<p>Tvoj čas príchodu je ' . $lastArray['time'] . '</p><br />';
    }

}
