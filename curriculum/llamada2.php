<?php
   session_start();
      require_once("comun.php");

$servidor = "localhost";
$usuario = "prueba";
$contraseña = "prueba123";
$BD = "curriculum";
$conexion = new mysqli($servidor, $usuario, $contraseña, $BD);

if ($conexion->connect_error) {
    die('<strong>No pudo conectarse:</strong> ' . $conexion->connect_error);
}
$email = $_SESSION["email"];
$sql = "SELECT * FROM datos_personales WHERE email='$email'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $Nombre = $fila["Nombre"]; // Alberto
        $Apellidos = $fila["Apellidos"]; // Sanchis
        $Edad = $fila["Edad"];
        $Telefono = $fila["Telefono"];
        $Email = $fila["email"];
        $Direccion = $fila["Direccion"];
    }
} else {
    echo "No se encontraron resultados.";
}

$conexion->close();


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="style2.css">
    <link rel="icon" href="images/favicon.jpg" sizes="16x16" type="image/jpg">
    <title>Mi currículum</title>


			
</head>
<body>
    <header id="arriba" class="parallax">
        <div class="exp-text">
            <div style="margin-left:100px; width:1000px;">
                <h1> Mis curriculum vitae </h1>
            </div>
        </div>
    </header>

    <?php echo $nav_bar;?>

    <div id="info">
        <div>
            <h2>Mis datos personales:</h2></br>
		<p>Nombre: <?php echo $Nombre; ?> </p>
		<p>Apellidos: <?php echo $Apellidos; ?> </p>
		<p>Edad: <?php echo $Edad; ?> </p>
		<p>Telefono: <?php echo $Telefono; ?> </p>
        <p>Email: <?php echo $Email; ?> </p>
 		<p>Direccion: <?php echo $Direccion; ?> </p>


		  
        </div>
    </div>

    <div id="skills">
    
    </div>

    <div id="hobbies">
     
    </div>

    <footer>
        <div>
            <p>Sitio desarrollado por Matías Gabriel Pérez.<br><a href="#arriba">Volver arriba</a></p>
            <a href="https://github.com/DiestroCorleone" target="_blank"><img src="https://icongr.am/devicon/github-original.svg?size=128&color=1d001f"></a>
            <a href="https://www.linkedin.com/in/mat%C3%ADas-gabriel-p%C3%A9rez-b163691b4/" target="_blank"><img src="https://icongr.am/entypo/linkedin-with-circle.svg?size=128&color=1d001f"></a>
        </div>
    </footer>
</body>
</html>
