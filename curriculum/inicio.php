
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="style2.css">
    <link rel="icon" href="images/favicon.jpg" sizes="16x16" type="image/jpg">
	  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

	<style>
	
		</style>
	
	 <script>
    $(document).ready(function() {
    
      // Asegurar que el campo de email contiene '@'
      $('#emailW').on('input', function() {
        if ($(this).val().indexOf('@') === -1) {
          // Si no contiene '@', agregar una clase de estilo para resaltar el error
          $(this).addClass('error');
        } else {
          // Si contiene '@', quitar la clase de estilo
          $(this).removeClass('error');
        }
      });

      // Validación del formulario
      $('#miFormulario').submit(function(event) {
        // Evitar que se envíe el formulario si hay errores
        if ($('#emailW').val().indexOf('@') === -1) {
          alert('¡Error! Por favor, revise los campos del formulario.');
          event.preventDefault();
        }
      });
    });
  </script>

	
	
    <title>Mi currículums</title>
</head>
<body>
    <header id="arriba" class="parallax">
        <div class="exp-text">
            <div style="margin-left:100px; width:1000px;">
                <h1> Iniciar sesión </h1>
            </div>
        </div>
    </header>

   <ul class="nav">
				<li><a href="llamada2.php">Sobre mí</a></li>
				<li><a href="">Estudios y habilidades </a>
						
						</li>
						
				
				<li><a href="">Experiencia</a>
				
				</li>
				<li><a href="">Configuracion</a>
					<ul>
						<li><a href="config.php">Cambiar datos</a></li>
						<li><a href="">Crear nuevo perfil</a></li>
						<li><a href="">Cerrar sesión</a></li>

					</ul>
				</li>
			</ul>

    <div id="info">
        <div>
            <h4>Información</h4></br>

            <form action="llamada.php" method="post" id="miFormulario">
                <label for="email">Email</label>
                <input type="text" name="email" id="emailW" required></br></br>

                <label for="pass">Password</label>
                <input type="password" name="pass" required></br></br>

                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>

    <div id="skills">
        <!-- Contenido de habilidades -->
    </div>

    <div id="hobbies">
        <!-- Contenido de intereses y hobbies -->
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
