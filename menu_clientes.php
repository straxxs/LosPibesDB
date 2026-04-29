<?php include "BD.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Clientes</title>
    <link rel="stylesheet" href="estilos.css">
    <link href="https://googleapis.com" rel="stylesheet">
</head>
<body>

<div class="card">
    <h2>Cargar Nuevo Cliente</h2>
    <form method="POST" action="">
        <ul>
            <li><input type="text" name="nombre" placeholder="Nombre del cliente" required></li>
            <li><input type="text" name="apellido" placeholder="Apellido del cliente" required></li>
            <li><input type="number" name="DNI" placeholder="DNI" required></li>
            <li><input type="email" name="email" placeholder="Correo electrónico" required></li>
            <li><input type="tel" name="tel" placeholder="Teléfono" required></li>
            <li><button type="submit" name="guardar">Registrar Cliente</button></li>
        </ul>
    </form>
</div>

<?php 
if (isset($_POST['guardar'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $DNI = $_POST['DNI']; // Corregido $_post a $_POST
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $sql_insertar = "INSERT INTO clientes (cli_nom, cli_ape, cli_DNI, cli_correo, cli_tel ) VALUES ('$nombre', '$apellido', '$DNI', '$email', '$tel')";
    $conexion->query($sql_insertar); // Ejecutar la consulta
}
?>

<div class="card">
    <h2>Listado de Clientes</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $sql = "SELECT * FROM clientes";
        $resultado = $conexion->query($sql);
        while($fila = $resultado->fetch_assoc()) {
            echo "<tr>
                <td>" . $fila["id_cli"] . "</td>
                <td>" . $fila["cli_nom"] . " " . $fila["cli_ape"] . "</td>
                <td>" . $fila["cli_correo"] . "</td>
                <td>" . $fila["cli_tel"] . "</td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
    <br>
    <a href="index.html" class="btn-link">← Volver al Menú Principal</a>
</div>

</body>
</html>
