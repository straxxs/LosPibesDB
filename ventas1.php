<?php include("BD.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos.css">
    <link href="https://googleapis.com" rel="stylesheet">
</head>
<body>
<div class="card">
<h2>Registrar Venta</h2>

<form method="POST">
    <select name="id_cli">
        <?php
        $clientes = $conexion->query("SELECT * FROM clientes");
        while ($c = $clientes->fetch_assoc()) {
            echo "<option value='{$c['id_cli']}'>{$c['cli_nom']}</option>";
        }
        ?>
    </select>

    <select name="id_pro">
        <?php

        $productos = $conexion->query("SELECT * FROM producto");
        while ($p = $productos->fetch_assoc()) {
            echo "<option value='{$p['id_pro']}'>{$p['pro_nom']}</option>";
        }
        ?>
    </select>

    <input type="number" placeholder="Cantidad" name="cantidad" required>

    <button type="submit">Registrar</button>
</form>
</div>
<?php
if ($_POST) {
    $id_cli = $_POST['id_cli'];
    $id_pro = $_POST['id_pro'];
    $cantidad = $_POST['cantidad'];

    $sql = "INSERT INTO ventas (id_cli, id_pro, ven_cant, ven_fecha) 
            VALUES ('$id_cli', '$id_pro', '$cantidad', NOW())";
    $conexion->query($sql);
}
?>
<div class="card">
<h2>Listado de Ventas</h2>

<table>
<tr>
    <th>ID</th>
    <th>Cliente</th>
    <th>Producto</th>
    <th>Cantidad</th>
</tr>

<?php

$sql = "SELECT v.id_ven, c.cli_nom as cliente, p.pro_nom as producto, v.ven_cant
        FROM ventas v
        JOIN clientes c ON v.id_cli = c.id_cli
        JOIN producto p ON v.id_pro = p.id_pro";

$resultado = $conexion->query($sql);

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>
            <td>{$fila['id_ven']}</td>
            <td>{$fila['cliente']}</td>
            <td>{$fila['producto']}</td>
            <td>{$fila['ven_cant']}</td>
            <td>
                <a href='editar.php?tabla=ventas&id=".$fila["id_ven"]."'>Editar</a> |
                <a href='eliminar.php?tabla=ventas&id=".$fila["id_ven"]."' onclick='return confirm(\"¿Eliminar?\")'>Eliminar</a>
            </td>
        </tr>";
}
?>
</table>
<a href="index.html" class="btn-link">Volver al Menú Principal</a>
</div>
</body>
</html>