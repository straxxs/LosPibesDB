<?php include "BD.php";?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos.css">
    <link href="https://googleapis.com" rel="stylesheet">
</head>
<body>
    <div class="card">
<h2>Cargar Producto</h2>

    <form method="POST">
        <ul>
        <li><input type="text" name="nom" placeholder="Producto" required></li>
        <li><input type="number" name="precio" placeholder="Precio" required></li>
        <li><input type="text" name="secc" placeholder="Seccion" required></li>
        <li><input type="number" name="stock" placeholder="Stock" required></li>
        <li><select name="proveedor">
        <?php
        $provedores = $conexion->query("SELECT * FROM proveedores");
        while ($p = $provedores->fetch_assoc()) {
            echo "<option value='{$p['id_prov']}'>{$p['prov_nom']}</option>";
        }
        ?>
    </select></li>
        <li><button type="submit" name="guardar">Registrar</button></li>
        </ul>
    </form>
    </div>

<?php 
if (isset($_POST['guardar'])){
    $nombre = $_POST['nom'];
    $precio = $_POST['precio'];
    $seccion = $_POST['secc'];
    $stock = $_POST['stock'];
    $prov = $_POST['proveedor'];
    $sql_insertar = "INSERT INTO productos (pro_nom, pro_precio, pro_secc, pro_stock, id_prov ) VALUES ($nombre, $precio, $seccion, $stock, $prov)";
}
?>

<div class="card">
<h2>Listado de Productos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>precio</th>
            <th>seccion</th>
            <th>stock</th>
        </tr>

<?php 
$productos = $conexion->query("select * from producto");

while($fila = $productos->fetch_assoc()) {
    echo "<tr>
        <td>" . $fila["id_pro"] . "</td>
        <td>" . $fila["pro_nom"] . "</td>
        <td>" . $fila["pro_precio"] . "</td>
        <td>" . $fila["pro_secc"] . "</td>
        <td>" . $fila["pro_stock"] . "</td>
        </tr>";
}
?>
</table>
<br>
<a href="index.html" class="btn-link">Volver al Menú Principal</a>
</div>
</body>
</html>
