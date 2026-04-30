<?php
include("BD.php");

if (!isset($_GET['tabla']) || !isset($_GET['id'])) {
    die("Error: datos incompletos");
}

$tabla = $_GET['tabla'];
$id = $_GET['id'];

if($tabla == "clientes"){
    $id_columna = "id_cli";

    $check = $conexion->query("SELECT * FROM ventas WHERE id_cli = $id");

    if ($check->num_rows > 0) {
        die("No se puede eliminar: el cliente tiene ventas asociadas");
    }

} elseif($tabla == "producto"){
    $id_columna = "id_pro";

    $check = $conexion->query("SELECT * FROM ventas WHERE id_pro = $id");

    if ($check->num_rows > 0) {
        die("No se puede eliminar: el producto tiene ventas asociadas");
    }

} elseif($tabla == "ventas"){
    $id_columna = "id_ven";
} else {
    die("Tabla no válida");
}

$sql = "DELETE FROM $tabla WHERE $id_columna = $id";

if ($conexion->query($sql)) {

    if ($tabla == "clientes") {
        header("Location: menu_clientes.php");
    } elseif ($tabla == "producto") {
        header("Location: menu_productos.php");
    } elseif ($tabla == "ventas") {
        header("Location: ventas1.php");
    } else {
    echo "Error al eliminar";
}
}
?>