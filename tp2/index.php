<!DOCTYPE html>
<html>
    <head>
        <title>Test PHP</title>
    </head>
    <body>
        Il est actuellement 
        <?php 
            date_default_timezone_set('Europe/Paris');
            echo date('H:i:s'); 
        ?>
        .
    </body>
</html>