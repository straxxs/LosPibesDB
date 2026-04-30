<?php
include("BD.php");

if (!isset($_POST['tabla']) || !isset($_POST['id'])) {
    die("Error: datos incompletos");
}

$tabla = $_POST['tabla'];
$id = intval($_POST['id']);

// ID según tabla
if($tabla == "clientes"){
    $id_columna = "id_cli";
} elseif($tabla == "producto"){
    $id_columna = "id_pro";
} elseif($tabla == "ventas"){
    $id_columna = "id_ven";
} else {
    die("Tabla no válida");
}

$campos = [];

foreach ($_POST as $key => $value) {
    if ($key != "id" && $key != "tabla") {
        $value = $conexion->real_escape_string($value);
        $campos[] = "$key='$value'";
    }
}

$sql = "UPDATE $tabla SET " . implode(", ", $campos) . " WHERE $id_columna = $id";

if ($conexion->query($sql)) {

    if ($tabla == "clientes") {
        header("Location: menu_clientes.php");
    } elseif ($tabla == "producto") {
        header("Location: menu_productos.php");
    } elseif ($tabla == "ventas") {
        header("Location: ventas1.php");
    }

} else {
    echo "Error: " . $conexion->error;
}
?>