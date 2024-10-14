<?php
    if (isset($_POST['css'])) {
        $styleValue = $_POST['css']; 
        setcookie("style", $styleValue, time() + 3600);
    } else {
        if (isset($_COOKIE['style'])) {
            $styleValue = $_COOKIE['style']; 
        } else {
            $styleValue = 'style1'; 
        }
    }
?>
<!doctype HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test</title>
        <link rel="stylesheet" href="<?php echo $styleValue ?>.css" type="text/css" media="screen" title="style" charset="utf-8" />
    </head>
    <body>
        Test<br><br>
        <form id="style_form" action="index.php" method="POST">
            <select name="css">
                <option value="style1" <?php echo ($styleValue == 'style1') ? 'selected' : ''; ?>>style1</option>
                <option value="style2" <?php echo ($styleValue == 'style2') ? 'selected' : ''; ?>>style2</option>
            </select>
            <input type="submit" value="Appliquer" />
        </form>
    </body>
</html>
