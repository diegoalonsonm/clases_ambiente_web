<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sem6</title>
</head>
<body>
    <?php
        $apellido = "Naranjo";
        function sumar($a, $b){
            return $a + $b;
        }
    ?>
    <h4>titulo hr4</h4>
    <?php
        echo "Hello <br>";
        echo "hola otra vez".$apellido;
        echo "<h2>hola</h2>";
    ?>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid ducimus fuga illo laborum molestias odio quia quis vero voluptates! Eaque esse iure sapiente temporibus voluptatibus? Cum eum vel voluptates.</p>
    <p><?php echo sumar(5, 10); ?></p>
</body>
</html>