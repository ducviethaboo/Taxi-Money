<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <input type="text" name="kilometter" placeholder="Kilometter">
    <input type='submit' value="Pay">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $km = $_REQUEST['kilometter'];
    function checkKM($km)
    {
        if (is_numeric($km)) {
            return true;
        } else {
            return false;
        }
    }

    function calculateMoney($km)
    {
        if ($km > 0 && $km <= 1) {
            echo '<br>' . "Total : " . $km * 15000 . 'VND';
        } elseif ($km > 1 && $km < 6) {
            echo '<br>' . "Total : " . (($km - 1) * 13500 + 15000) . 'VND';
        } elseif ($km >= 6 && $km <= 120) {
            echo '<br>' . "Total : " . (($km - 5) * 11000 + 15000 + (13500 * 4)) . 'VND';
        } elseif ($km > 120) {
            echo '<br>' . "Total :" . ((($km - 5) * 11000 + 15000 + (13500 * 4)) * 0.9) . 'VND';
        } elseif ($km < 0 || checkKM($km) == false) {
            echo '<br>' . "Please enter a valid number";
        }
    }

    calculateMoney($km);
}
?>
</body>
</html>