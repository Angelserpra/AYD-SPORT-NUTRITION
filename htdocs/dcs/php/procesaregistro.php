<?php
include 'database.php';

$usuario = $_POST['user'];
$apellidos = $_POST['surname'];
$email = $_POST['correoelectronico'];
$contrasena = $_POST['passwd'];
$nacimiento = date('Y-m-d', strtotime($_POST['fechaNacimiento']));
$sexo = $_POST['genero'];

try {
    // Cifrar la contraseña usando bcrypt
    $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);
    $con = $conexiones->prepare("INSERT INTO Usuarios(Nombre, Apellidos, CorreoElectronico, Contraseña, FechaNacimiento, Genero) VALUES (:nombre, :apellidos, :email, :contrasena, :nacimiento, :sexo)");

    $con->bindParam(':nombre', $usuario);
    $con->bindParam(':apellidos', $apellidos);
    $con->bindParam(':email', $email);
    $con->bindParam(':contrasena', $hashed_password); // Guardar la contraseña cifrada
    $con->bindParam(':nacimiento', $nacimiento);
    $con->bindParam(':sexo', $sexo);

    $con->execute();
    echo "Registro exitoso<br>";
    echo "<a href='../../index.php'>Volver... </a>";

} catch (PDOException $e) {
    echo "Ha ocurrido un error, es posible que el correo ya esté utilizado<br>";
    echo "<a href='registrosesion.php'>Intentar de nuevo</a>";
}
?>
