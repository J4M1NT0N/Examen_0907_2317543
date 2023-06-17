<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Final</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
<?php
$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
$conexion = new PDO('mysql:host=localhost;dbname=Final_0907_23_17543', 'root', '12345678', $pdo_options);

if (isset($_POST['accion']) &&
    $_POST['accion'] == "crear"){
        
        $insert = $conexion->prepare("INSERT INTO producto (carnet,nombre,dpi,
        direccion) VALUES (:codigo,:nombre,,:existencia)");
        $insert->bindValue('carnet', $_POST['codigo']);
        $insert->bindValue('nombre', $_POST['nombre']);
        $insert->bindValue('dpi', $_POST['precio']);
        $insert->bindValue('direccion', $_POST['existencia']);
        $insert->execute();
    }


$select = $conexion->query("SELECT codigo, nombre, precio, existencia FROM Final_0907_23_17543");
?>

    <table border="1">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Existencia</th>
</tr>
</thead>
<tbody>
    <?php foreach($select->fetchAll() as $producto) { ?>
        <tr>
            <td> <?php echo $alumno["codigo"] ?> </td>
            <td> <?php echo $alumno["nombre"] ?> </td>
            <td> <?php echo $alumno["precio"] ?> </td>
            <td> <?php echo $alumno["direccion"] ?> </td>
            <td>
                <form action="editar.php" method="POST">
                    <input type="hidden" name="codigo"
                    value="<?php echo $producto["codigo"]?>">
    </tr>
    <?php } ?>
    </tbody>
    </table>
    </body>
</html>
