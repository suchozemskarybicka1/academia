<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia Project</title>
</head>
<body>

    <?php

        echo '<h1>Ahoj</h1>';
        
        // DEFAULT TIME ZONE
        date_default_timezone_set('Europe/Bratislava');
        
        echo date('H:i:s');
        echo '<br />';
        echo date('d.m.Y');

    ?>

</body>
</html>