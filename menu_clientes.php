<?php include "BD.php";?>
<h2>Cargar Nuevo Cliente</h2>

    <form method="POST" action="">
        <ul>
        <li><input type="text" name="nombre" placeholder="Nombre del cliente" required></li>
        <li><input type="apellido" name="apellido" placeholder="Apellido del cliente" required></li>
        <li><input type="number" name="DNI" placeholder="DNI" required></li>
        <li><input type="email" name="email" placeholder="Correo electrónico" required></li>
        <li><input type="tel" name="tel" placeholder="Telefono" required></li>
        <li><button type="submit" name="guardar">Registrar</button></li>
        </ul>
    </form>

<?php 
if (isset($_POST['guardar'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $DNI = $_post['DNI'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $sql_insertar = "INSERT INTO clientes (cli_nom, cli_ape, cli_DNI, cli_correo, cli_tel ) VALUES ('$nombre', '$apellido', '$DNI', '$email', '$tel')";
    
    if ($conexion->query($sql_insertar) === TRUE) {
        echo "<p style='color:green;'>Cliente guardado con éxito.</p>";
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>


<h2>Listado de Clientes</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Telefono</th>
        </tr>

<?php 
$sql = "select * from clientes";
$resultado = $conexion->query($sql);

while($fila = $resultado->fetch_assoc()) {
     echo "<tr>
        <td>" . $fila["id_cli"] . "</td>
        <td>" . $fila["cli_nom"] . "</td>
        <td>" . $fila["cli_correo"] . "</td>
        <td>" . $fila["cli_tel"] . "</td>
        </tr>";
}
?>
</table>
<br>
<a href="menu1.html">Volver al Menú Principal</a>