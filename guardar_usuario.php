<?php
$conexion = new mysqli("localhost", "root", "", "papeleria");

$correo = $_POST['correo'];
$clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (correo, clave) VALUES (?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $correo, $clave);

if ($stmt->execute()) {
    echo "Usuario registrado correctamente. <a href='login.html'>Iniciar sesión</a>";
} else {
    echo "Error: El correo ya está registrado. <a href='registro.html'>Intentar de nuevo</a>";
}
?>
