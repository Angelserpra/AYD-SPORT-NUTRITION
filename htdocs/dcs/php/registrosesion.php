
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Registro de sesión</title>
        <link rel="stylesheet" href="../../styles.css" type="text/css">
        
    </head>
    <body class="bodysesion">
	<?php echo $alertJS; ?>
        <div class="inicioSesion">
            <h2 class="h2sesion">Registrar usuario</h2>
            <form id="signupForm" action="procesaregistro.php" method="post">
                <label for="user">Nombre:</label><br>
                <input type="text" name="user" required/><br>

                <label for="surname">Apellidos:</label><br>
                <input type="text" name="surname" required/><br>
                
                <label for="correoelectronico">Correo Electronico:</label><br>
                <input type="email" name="correoelectronico" required/><br>

                <label for="passwd">Contraseña:</label><br>
                <div class="containerpasswd">
                    <input type="password" name="passwd" id="Input" required/><br>
                    <img src="../../img/eye.png" alt="" class="icon" id="Eye">
                    <script src="../java/passwd.js"></script>
                </div>

                <label for="fechaNacimiento">Fecha de nacimiento:</label><br>
                <input type="date" name="fechaNacimiento" required/><br>

                <label class="genero" for="genero">Genero: </label>
                <select id="genero" name="genero" required>
                    <option value="hombre">Hombre</option>
                    <option value="mujer">Mujer</option>
                    <option value="otro">Otro</option>
                </select><br><br><br>

                <input type="submit" value="Registrar usuario"/>
                <input type="reset" value="Borrar todo"/>
            </form>
            <a class="cancelarsesion" href="../../index.php">Cancelar</a>
        </div>
    </body>
</html>
