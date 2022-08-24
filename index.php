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
        echo '<h1>Ahoj</h1>';
    ?>
        
        <?php
        // DEFAULT TIME ZONE
        date_default_timezone_set('Europe/Bratislava');
        
        echo date('H:i:s');
        echo '<br />';
        echo date('d.m.Y');

        if(isset($_GET['submit'])) {
            $data = '';
            $filename = "store_data.json";
            if(is_file($filename)) {
                $data = file_get_contents($filename);
            }

            $json_arr = json_decode($data, true);


            $json_arr = array('name' => $_GET['name']);

            file_put_contents($filename, json_encode($json_arr));
        }
    ?>

    <form action="store_data.json" method="get">
        <input type="text" name="name">
        <input type="submit" name="submit" value="submit">
    </form>

</body>
</html>