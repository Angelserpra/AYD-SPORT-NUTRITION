<?php
    session_start();
    // Eliminar todas las variables de sesión
    session_destroy();
    // Redirigir a la página de inicio de sesión o a otra página
    header('Location: ../../index.php');
    exit();
?>
