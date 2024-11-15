<?php
session_start();
$_SESSION["usuario"] = "juan";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sesiones</title>
</head>
<body>
    <input type="text" value="<?php echo $_SESSION["usuario"]?>">
</body>
</html>
