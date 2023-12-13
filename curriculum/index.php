<?php
$servidor = "localhost";
$usuario = "prueba";
$contraseña = "prueba123";
$BD = "curriculum";
$conexion = new mysqli($servidor, $usuario, $contraseña, $BD);

if ($conexion->connect_error) {
    die('<strong>No pudo conectarse:</strong> ' . $conexion->connect_error);
}

$sql = "SELECT * FROM datos_personales WHERE Id='1'";
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



$sql = "SELECT lenguajes.Nombre AS lenguaje, habilidades.Nombre AS Habilidad
        FROM habilidad_Lenguaje
        INNER JOIN lenguajes ON habilidad_Lenguaje.id_lenguaje = lenguajes.Id
        INNER JOIN habilidades ON habilidad_lenguaje.id_habilidad = habilidades.Id";
$resultado2 = $conexion->query($sql);

$lenguajes_habilidades = array(); 

if ($resultado2->num_rows > 0) {
    while ($fila = $resultado2->fetch_assoc()) {
        $lenguajes_habilidades[] = array(
            'lenguaje' => $fila['lenguaje'],
            'habilidad' => $fila['Habilidad']
        );
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
                <h1> Nombre: <?php echo $Nombre; ?></h1>
                <h1> Edad: <?php echo $Edad; ?></h1>
            </div>
        </div>
    </header>

    <nav id="menu">
        <ul>
            <li><a href="#menu">&#9776;</a></li>
            <li><a href="#">x</a></li>
            <li><a href="#info">Información</a></li>
            <li><a href="#edu">Educación</a></li>
            <li><a href="#exp">Experiencia Laboral</a></li>
            <li><a href="#skills">Habilidades Profesionales</a></li>
            <li><a href="#hobbies">Intereses y Hobbies</a></li>
        </ul>
    </nav>

    <div id="info">
        <div>
            <h4>Información</h4>
            <ul>
                <li><?php echo $Telefono; ?></li>
                <li style="color: black;"><a href="mailto:<?php echo $Email; ?>"><?php echo $Email; ?></a></li>
                <li><?php echo $Direccion; ?></li>
            </ul>
        </div>
    </div>

    <div id="skills">
        <h4>Habilidades Profesionales</h4>
        <br>
        <hr>
        <ul>
            <?php foreach ($lenguajes_habilidades as $lh) { ?>
                <li>
                    <article>
                        <div class="exp-text">
                            <p class="titulo"><?php echo $lh['habilidad']; ?></p>
                            <p class="descripcion"><?php echo $lh['lenguaje']; ?></p>
                        </div>
                    </article>
                </li>
            <?php } ?>
        </ul>
    </div>

    <div id="hobbies">
        <h4>Intereses y Hobbies</h4>
        <br>
        <hr>
        <ul>
            <li>
                <article>
                    <div class="exp-img">
                        <img src="images/runningIcon.jpg">
                    </div>
                    <div class="exp-text">
                        <p class="descripcion">Running</p>
                    </div>
                </article>
            </li>
            <li>
                <article>
                    <div class="exp-img">
                        <img src="images/readingIcon.jpg">
                    </div>
                    <div classexp-text">
                        <p class="descripcion">Lectura de libros y comics</p>
                    </div>
                </article>
            </li>
            <li>
                <article>
                    <div class="exp-img">
                        <img src="images/pianoIcon.jpg">
                    </div>
                    <div class="exp-text">
                        <p class="descripcion">Piano</p>
                    </div>
                </article>
            </li>
        </ul>
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
