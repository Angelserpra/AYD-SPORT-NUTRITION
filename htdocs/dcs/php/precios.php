<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	include 'database.php';

    try {
	$correo = $_POST['correo'];
	$passwd = $_POST['passwd'];

        $consulta = "SELECT * FROM Usuarios WHERE CorreoElectronico = :correo AND Contraseña = :passwd";
        $cons = $conexiones->prepare($consulta);
        $cons->execute(array(':correo' => $correo, ':passwd' =>$passwd));
        $usuario = $cons->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            $_SESSION['usuario'] = $usuario['Nombre'];
            $_SESSION['correo'] = $usuario['CorreoElectronico'];
	    $_SESSION['passwd'] = $usuario['Contraseña'];
            $alertJS= "<script>alert('Inicio de sesión exitoso');</script>";

        } else {
            $alertJS = "<script>alert('Correo Electrónico o Contraseña incorrectos');</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>AYD Sport Nutrition</title>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet"> 
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <link rel="stylesheet" href="../../styles.css" type="text/css">
    </head>
    <body>
	<?php echo $alertJS; ?>
        <header class="header">
            <div class="container">
                <div class="btn-menu">
                    <label for="btn-menu">☰</label>
                </div>
                <div class="logo">
                    <h1> <a href="../../index.php">AYD Sport Nutrition</a></h1>
                </div>
                <nav class="menu">
                    <a href="precios.php">Precios</a>

                    <a href="../../index.php#aqui">Contactanos</a>
                    <!--PONER NOMBRE CUANDO INICIEMOS SESION-->
                    <?php
	  		if (isset($_SESSION['usuario'])) {
        			// Si el usuario ha iniciado sesión, mostrar su nombre en el botón "Iniciar Sesión"
				echo '<button id="abrir-emergente2" class="abrir-emergente2">' . ($_SESSION['usuario']) . '</button>';
    			} else {
				// Si el usuario no ha iniciado sesión, mostrar el botón "Iniciar Sesión" normalmente
        			echo '<button id="abrir-emergente" class="abrir-emergente">Iniciar Sesión</button>';
			}
    		    ?>

                </nav>
            </div>
        </header>
        <input type="checkbox" id="btn-menu">
        <div class="container-menu">
            <div class="cont-menu">
                <nav>
                    <a href="https://github.com/Angelserpra" target="_blank">GitHub</a>
                    <script src="../java/descargar-cv.js"></script>
                    <a href="https://www.instagram.com/davidmrqzz_/" target="_blank">Instagram</a>
                    <a id="descargar-cv" href="#">Curriculum<img src="../../img/download.png"/></a>
                </nav>
                <label for="btn-menu">✖️</label>
            </div>
        </div>

        <div class="contenedor-principal-precios">
        <h2>Planes de Precios</h2>
<div class="pricing-container">
    <div class="pricing-card" onclick="selectOption(this)">
      <h3>Básico</h3>
      <p class="price">$19.99/mes</p>
      <ul>
        <li>Plan de alimentación personalizado</li>
        <li>Asesoramiento nutricional básico</li>
        <li>Acceso a recetas saludables</li>
      </ul>
 
    </div>
    <div class="pricing-card" onclick="selectOption(this)">
      <h3>Intermedio</h3>
      <p class="price">$39.99/mes</p>
      <ul>
        <li>Plan de alimentación personalizado</li>
        <li>Asesoramiento nutricional avanzado</li>
        <li>Acceso a recetas y planes de entrenamiento</li>
        <li>Seguimiento de progreso</li>
      </ul>

    </div>
    <div class="pricing-card" onclick="selectOption(this)">
      <h3>Premium</h3>
      <p class="price">$59.99/mes</p>
      <ul>
        <li>Plan de alimentación personalizado</li>
        <li>Asesoramiento nutricional avanzado</li>
        <li>Acceso a recetas y planes de entrenamiento</li>
        <li>Seguimiento de progreso</li>
        <li>Consultas individuales con nutricionista</li>
      </ul>

    </div>
  </div>
  <script src="../java/precios.js"></script>

<!--VENTANA EMERGENTE PARA INICIO DE SESION-->
            <div class="overlay" id="overlay">
                <div class="emergente" id="emergente">
                    <a href="#" id="cerrar-emergente" class="cerrar-emergente"><i class="fas fa-times"></i></a>
                    <h3>INICIAR SESION</h3>
                    <form action="precios.php" method="post">
                        <div class="contenedor-iniciosesion">
                            <input type="email" name="correo" placeholder="Correo Electrónico">
                            <div class="containerpasswd">
                                <input type="password" name="passwd" id="Input" placeholder="Contraseña" required/><br>
                                <img src="....//img/eye.png" alt="" class="icon-sesion" id="Eye">
                                <script src="../java/passwd.js"></script>
                            </div>
                        </div>
                        <input type="submit" class="submit" value="Iniciar Sesión"><br>
                    </form>
                    <a class="registrar-sesion" href="registrosesion.php">¿No tienes cuenta? Registrate aquí.</a>
                </div>
            </div>
            <script src="../java/emergente.js"></script>


        </div>
<!--VENTANA EMERGENTE PARA PERFIL-->
            <div class="overlay2" id="overlay2">
                <div class="emergente2" id="emergente2">
                    <a href="#" id="cerrar-emergente2" class="cerrar-emergente2"><i class="fas fa-times"></i></a>
                    <h3>PERFIL</h3>
                    <div class="contenedor-emergente2">
                        <p>Nombre:  
                            <?php
                                    echo "  " .$_SESSION['usuario']. "<br>" ;
                            ?>
                        </p>
                        <p>Correo:  
                            <?php
        	                     echo " " . $_SESSION['correo']. "<br>";
 	             	    ?>
			</p>
			<p>Contraseña:  
			    <?php
				     echo " " . $_SESSION['passwd']. "<br>";
				     echo "<a href='cambiarpasswd.php'>Cambiar contraseña</a>";
			    ?>
			</p>
                        <!-- Agrega este botón donde quieras que aparezca en tu página web -->
                        <form action="cerrarsesion.php" method="post">
                            <input type="submit" value="Cerrar Sesión">
                        </form>
                    </div>
                </div>
            </div>
            <script src="../java/emergente2.js"></script>
        </div>


    </body>
</html>
