<?php
 require_once("comun.php");
 session_start();


 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Mi currículum</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="icon" href="images/favicon.jpg" sizes="16x16" type="image/jpg">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function updateData() {
			var id= $("#Id").val();
            var nombre = $("#Nombre").val();
            var apellido = $("#Apellidos").val();
            var direccion = $("#Direccion").val();
            var telefono = $("#Telefono").val();
            var email = $("#Email").val();
            var edad = $("#Edad").val();

            $.ajax({
                type: "POST",
                url: "funciones.php",
                data: {
                    email: email,
					id: id,
                    nombre: nombre,
                    apellido: apellido,
                    edad: edad,
                    direccion: direccion,
                    telefono: telefono
                },
                success: function(response) {
                    alert('Cambios realizados con éxito'); // Muestra el mensaje de éxito
                },
                error: function() {
                    alert('No se han actualizado los datos'); // Muestra el mensaje de error
                }
            });
        }
    </script>

</head>
<body>
    <header id="arriba" class="parallax">
        <div class="exp-text">
            <div style="margin-left:100px; width:1000px;">
                <h1> Mi curriculum vitae </h1>
            </div>
        </div>
    </header>

    <?php echo $nav_bar; ?>

    <div id="info">
        <div>
            <h2>Mis datos personales:</h2>
			
            <?php
                $servidor = "localhost";
                $usuario = "prueba";
                $contraseña = "prueba123";
                $BD = "curriculum";
                $conexion = new mysqli($servidor, $usuario, $contraseña, $BD);

                if ($conexion->connect_error) {
                    die('<strong>No pudo conectarse:</strong> ' . $conexion->connect_error);
                }

                $email = $_SESSION["email"];
				$id = $_SESSION["id"];

                $sql = "SELECT * FROM datos_personales WHERE email='$email'";
                $resultado = $conexion->query($sql);

                if (!$resultado) {
                    die('<strong>Error en la consulta:</strong> ' . $conexion->error);
                }

                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        $Nombre = $fila["Nombre"];
                        $Apellidos = $fila["Apellidos"];
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
            <form name="" method="post" onsubmit="event.preventDefault(); updateData();">    
			 <input type="hidden" name="Id" id="Id" value="<?php echo $id; ?>"/>
                <p>Nombre: <input type="text" name="Nombre" id="Nombre" placeholder="<?php echo $Nombre; ?>"/></p>
                <p>Apellidos: <input type="text" name="Apellidos" id="Apellidos" placeholder="<?php echo $Apellidos; ?>" /> </p>
                <p>Edad: <input type="text" name="Edad" id="Edad" placeholder=" <?php echo $Edad; ?>" /> </p>
                <p>Telefono: <input type="text" name="Telefono" id="Telefono" placeholder=" <?php echo $Telefono; ?>" /> </p>
                <p>Email: <input type="text" name="Email" id="Email" placeholder=" <?php echo $Email; ?> " /> </p>
                <p>Direccion: <input type="text" id="Direccion" name="Direccion" placeholder=" <?php echo $Direccion; ?>"  /> </p>
                </br>
				<button type="submit">Enviar</button>
            </form>
        </div>
    </div>

    <div id="skills">
        <!-- Agrega contenido de habilidades aquí -->
    </div>

    <div id="hobbies">
        <!-- Agrega contenido de pasatiempos aquí -->
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
