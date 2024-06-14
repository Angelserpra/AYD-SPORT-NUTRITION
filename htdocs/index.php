<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	include 'dcs/php/database.php';

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
        <link rel="stylesheet" href="styles.css" type="text/css">
        <link rel="icon" href="img/logoempresa.png" type="image/x-icon">
    </head>
    <body>
	<?php echo $alertJS; ?>
        <header class="header">
            <div class="container">
                <div class="btn-menu">
                    <label for="btn-menu">☰</label>
                </div>
                <div class="logo">
                    <h1> <a href="index.php">AYD Sport Nutrition</a></h1>
                </div>
                <nav class="menu">
                    <a href="dcs/php/precios.php">Precios</a>
                    <a href="#aqui">Contactanos</a>
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
                    <a href="https://www.instagram.com/davidmrqzz_/" target="_blank">Instagram</a>
                    <script src="dcs/java/descargar-cv.js"></script>
                    <a id="descargar-cv" href="#">Curriculum<img src="img/download.png"/></a>
                </nav>
                <label for="btn-menu">✖️</label>
            </div>
        </div>
        <div class="contenedor-principal">
            <div class="contenedor-titulo">
                <img src="img/nombreEmpresa.png"/>
            </div>
            <div class="separador"></div>
            <div class="bienvenido">
                <h2>Bienvenido a AYD Sport Nutrition</h2>
                <p>En AYD Sport Nutrition, creemos en el poder de la nutrición para transformar vidas. Ofrecemos planes personalizados de nutrición y dieta, diseñados específicamente para atletas y entusiastas del deporte en Granada. Nuestra misión es ayudarte a alcanzar tus objetivos de fitness, a través de la comida saludable y efectiva.</p>
            </div>

            <hr class="separador2">

            <div class="contenedor-servicios">
                <h3>Servicios</h3>
                <div class="servicios">
                    <div class="servicios-div">
                        <img src="img/nutricion-deportiva.jpg"/>
                        <h4>Nutrición Deportiva</h4>
                        <p>Optimiza tu rendimiento deportivo con planes nutricionales a medida.</p>
                    </div>
                    <div class="servicios-div">
                        <img src="img/plan-dieta.jpg"/>
                        <h4>Planes de Dieta Personalizados</h4>
                        <p>Planes de dieta personalizados para alcanzar tus metas de salud y fitness.</p>
                    </div>
                    <div class="servicios-div">
                        <img src="img/suplementos-deportivos.jpg"/>
                        <h4>Asesoramiento en Suplementos</h4>
                        <p>Mejora tu rendimiento y recuperación con asesoramiento en suplementos.</p>
                    </div>
                </div>
            </div>

            <hr class="separador2">



    		<div class="preguntas">
                <h3>Preguntas Frecuentes</h3>
                                <!-- Preguntas Entregas -->
                <div class="contenedor-preguntas" data-categoria="entregas">
                    <div class="contenedor-pregunta">
                        <p class="pregunta">¿Cuáles son los beneficios de la nutrición deportiva? <img src="img/suma.svg" alt="Abrir Respuesta" /></p>
                        <p class="respuesta">La nutrición deportiva puede ayudarte a mejorar tu rendimiento, acelerar tu recuperación después del ejercicio, prevenir lesiones y mantener un peso corporal saludable.</p>
                    </div>
                    <div class="contenedor-pregunta">
                        <p class="pregunta">¿Cuándo debo comer antes y después del ejercicio?<img src="img/suma.svg" alt="Abrir Respuesta" /></p>
                        <p class="respuesta">Es importante comer una comida equilibrada que incluya carbohidratos y proteínas unas 2-3 horas antes del ejercicio. Después del ejercicio, debes consumir proteínas y carbohidratos dentro de los 30-60 minutos para ayudar en la recuperación muscular.</p>
                    </div>
                    <div class="contenedor-pregunta">
                        <p class="pregunta">¿Qué suplementos son más recomendables para deportistas?<img src="img/suma.svg" alt="Abrir Respuesta" /></p>
                        <p class="respuesta">Los suplementos más recomendables para deportistas incluyen proteínas, creatina, aminoácidos y electrolitos.</p>
                    </div>
                </div>
            </div>
    
            
            <script src="dcs/java/respuestas.js"></script>

              <hr class="separador2">
 
              <div class="comentario">
                <h4>“Desde que empecé con AYD Sport Nutrition, mi rendimiento deportivo ha mejorado notablemente. Los planes de dieta son fáciles de seguir y realmente efectivos.”</h4>
                <p>Laura García</p>
            </div>

            <hr class="separador2">

            <div class="contacto" id="aqui">
                <div class="container-contactar">
                    <h3>Contactanos</h3>
                    <div class="contactanos">
                        <form action="https://formspree.io/f/myyrlepr" method="post">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" required>
                        
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        
                            <label for="mensaje">Mensaje:</label>
                            <textarea id="mensaje" name="mensaje" placeholder="Escribe aquí..." required></textarea>
                        
                            <input type="submit" value="Enviar">
                        </form>
                    </div>
                </div>
                <hr class="separador3">
                <div class="redessociales">
                    <p>Teléfono: +34 640 241 328
                    <p>Email: aydsportnutrition@gmail.com</p>
                    <a href="https://www.instagram.com/davidmrqzz_" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/profile.php?id=100040241018521" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.linkedin.com/in/david-m%C3%A1rquez-piles-97bb73273utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app " target="_blank"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <footer>
                <div class="bottom-footer">
                    <p>&copy; 2024 Tu Empresa de Nutrición Deportiva. Todos los derechos reservados.</p>
                </div>
            </footer>
                      

            <!--VENTANA EMERGENTE PARA INICIO DE SESION-->
            <div class="overlay" id="overlay">
                <div class="emergente" id="emergente">
                    <a href="#" id="cerrar-emergente" class="cerrar-emergente"><i class="fas fa-times"></i></a>
                    <h3>INICIAR SESION</h3>
                    <form action="index.php" method="post">
                        <div class="contenedor-iniciosesion">
                            <input type="email" name="correo" placeholder="Correo Electrónico">
                            <div class="containerpasswd">
                                <input type="password" name="passwd" id="Input" placeholder="Contraseña" required/><br>
                                <img src="img/eye.png" alt="" class="icon-sesion" id="Eye">
                                <script src="dcs/java/passwd.js"></script>
                            </div>
                        </div>
                        <input type="submit" class="submit" value="Iniciar Sesión"><br>
                    </form>
                    <a class="registrar-sesion" href="dcs/php/registrosesion.php">¿No tienes cuenta? Registrate aquí.</a>
                </div>
            </div>
            <script src="dcs/java/emergente.js"></script>
            
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
                  	?>

			</p><br>
                        <!-- Agrega este botón donde quieras que aparezca en tu página web -->
                        <form action="dcs/php/cerrarsesion.php" class="cerrarsesion" method="post">
                            <input type="submit" value="Cerrar Sesión">
			    <?php $alertJS ="<script>alert('Has cerrado sesión correctamente');</script>";?>
                        </form>
                    </div>
                </div>
            </div>
            <script src="dcs/java/emergente2.js"></script>
        </div>



    </body>
</html>
