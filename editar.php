<?php
include("BD.php");

// Validar datos
if (!isset($_GET['tabla']) || !isset($_GET['id'])) {
    die("Error: datos incompletos");
}

$tabla = $_GET['tabla'];
$id = $_GET['id'];

// Definir ID según tabla
if($tabla == "clientes"){
    $id_columna = "id_cli";
} elseif($tabla == "producto"){
    $id_columna = "id_pro";
} elseif($tabla == "ventas"){
    $id_columna = "id_ven";
} else {
    die("Tabla no válida");
}


$sql = "SELECT * FROM $tabla WHERE $id_columna = $id";
$resultado = $conexion->query($sql);

if (!$resultado || $resultado->num_rows == 0) {
    die("Registro no encontrado");
}

$fila = $resultado->fetch_assoc();
?>

<form action="actualizar.php" method="POST">
    <input type="hidden" name="tabla" value="<?= $tabla ?>">
    <input type="hidden" name="id" value="<?= $id ?>">

    <?php foreach ($fila as $campo => $valor) { 
        if ($campo != $id_columna) { ?>
            <input type="text" name="<?= $campo ?>" value="<?= $valor ?>">
    <?php } } ?>

    <button type="submit">Actualizar</button>
</form>