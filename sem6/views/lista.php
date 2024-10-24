<?php
    $listaEstudiantes = ["Marta", "Ana", "Maria", "Diego"];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>lista</title>
</head>
<body>
    <h2>lista estudiantes</h2>
    <ul>
        <?php
            foreach($listaEstudiantes as $estudiante){
                echo "<li>".$estudiante."</li>";
            }
        ?>
    </ul>
    <br><br>
    <table>
        <tr>
            <th>Nombre</th>
        </tr>
        <?php
            foreach($listaEstudiantes as $estudiante){
                echo "<tr><td>".$estudiante."</td></tr>";
            }
        ?>
    </table>
</body>
</html>