<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
  <nav>
    <img src="fotos/logo.png" alt="Logo" class="logo">
    <div id="hover">
      <a href="<?php echo isset($nombreCompleto) ? 'Calendario/index2.php' : 'Calendario/index2.php'; ?>"
        class="menu-item" id="calendario-btn">
        <img src="fotos/calendario.png" alt="Calendario">
        <span>Calendario</span>
      </a>
    </div>
    <div id="hover">
      <a href="<?php echo isset($nombreCompleto) ? 'https://docs.google.com/forms/d/e/1FAIpQLSfP1057v7pV13HD0DRtRFurismdDTSJYpbwL-pbE6BLKbf5cQ/viewform?pli=1' : 'https://docs.google.com/forms/d/e/1FAIpQLSfP1057v7pV13HD0DRtRFurismdDTSJYpbwL-pbE6BLKbf5cQ/viewform?pli=1'; ?>"
        class="menu-item" id="comentarios-btn">
        <img src="fotos/libreta.png" alt="Comentarios">
        <span>Comentarios</span>
      </a>
    </div>
    <div id="hover">
      <a href="https://api.whatsapp.com/send?phone=+524493261669&text=Hola%20quiero%20hacer%20una%20consulta"
        target="_blank">
        <img src="fotos/telefono.png" alt="Contacto">
        <span>Contacto</span>
      </a>
    </div>
    <div id="hover">
      <a href="https://api.whatsapp.com/send?phone=+524493261669&text=Hola%20quiero%20hacer%20una%20consulta"
        target="_blank">
        <img src="fotos/whats.png" alt="Servicio">
        <span>Servicio</span>
      </a>
    </div>
    <script>
      function show() {
        var inicio = document.getElementById("popup");
        var boton = document.getElementById("sesion");
        inicio.style.display = 'block';;
        boton.style.display = 'none';

        var elemento = document.querySelector("#popup");

        // Obtener el div de destino
        var divDestino = document.getElementById("AcercaDe");

        // Mover el elemento al div de destino
        divDestino.appendChild(elemento);
      }
    </script>
    <?php
    session_start();

    // Verificar si el usuario ha iniciado sesión
    if (isset($_SESSION["nombreCompleto"])) {
      $nombreCompleto = $_SESSION["nombreCompleto"];
    }
    if (isset($nombreCompleto)) {
      echo '<div class="welcome-container">';
      echo "<p class='welcome-message'>Bienvenido, $nombreCompleto</p>";
      echo '<form action="logout.php" method="POST"><button class="login-button" type="submit">Cerrar sesión</button></form>';
      echo '</div>';
    } else {
      echo '<button class="login-button" id="sesion" onclick="show()">Iniciar sesión</button>';
      ?>
      <center>
        <div id="popup" style="display: none;">
          <div id="popup-container">
            <center>
              <h2>Iniciar sesion</h2>
            </center>
            <br>
            <div class="login-register">
              <div class="login" id="login">
                <!-- Formulario de inicio de sesión -->
                <form id="login-form" class="login-form" action="login.php" method="POST">
                  <center>
                    <input type="text" name="email" placeholder="Correo Electrónico">
                  </center>
                  <br>
                  <center>
                    <input type="password" name="password" placeholder="Contraseña">
                  </center>
                  <br>
                  <button class="login-button" type="submit">Iniciar sesión</button>
                  <div class="register">
                    <p>¿No tienes cuenta? <a href="#" class="register-link">Registrarse</a></p>
                  </div>
                </form>
              </div>


              <div class="register" id="register" style="display: none;">
                <!-- Formulario de registro -->
                <form id="register-form" class="login-form" action="register.php" method="POST"
                  onsubmit="return validateRegistration();">
                  <input type="text" name="email" placeholder="Correo Electrónico" required>
                  <br>
                  <input type="password" name="password" placeholder="Contraseña" required>
                  <br>
                  <input type="text" name="fullName" placeholder="Nombre Completo" required>
                  <input type="text" name="address" placeholder="Dirección" required>
                  <input type="tel" name="phoneNumber" placeholder="Número de Teléfono" required>
                  <button class="login-button" type="submit">Registrarse</button>
                  <div class="login">
                    <p>¿Ya tienes una cuenta? <a href="#" class="login-link">Iniciar sesión</a></p>
                  </div>
                </form>
              </div>

              <script>
                function validateRegistration() {
                  var email = document.getElementById("register-form").elements["email"].value;
                  var password = document.getElementById("register-form").elements["password"].value;
                  var fullName = document.getElementById("register-form").elements["fullName"].value;
                  var address = document.getElementById("register-form").elements["address"].value;
                  var phoneNumber = document.getElementById("register-form").elements["phoneNumber"].value;

                  if (email === "" || password === "" || fullName === "" || address === "" || phoneNumber === "") {
                    alert("Por favor, complete todos los campos.");
                    return false; // Detener el envío del formulario
                  }

                  return true; // Permitir el envío del formulario si todos los campos están completos
                }

                var registerLink = document.querySelector('.register-link');
                var loginLink = document.querySelector('.login-link');
                var loginContainer = document.querySelector('#login');
                var registerContainer = document.querySelector('#register');

                registerLink.addEventListener('click', function (e) {
                  e.preventDefault();
                  loginContainer.style.display = 'none';
                  registerContainer.style.display = 'block';
                });

                loginLink.addEventListener('click', function (e) {
                  e.preventDefault();
                  loginContainer.style.display = 'block';
                  registerContainer.style.display = 'none';
                });

                var calendarioLink = document.getElementById('calendario-btn');
                var comentariosLink = document.getElementById('comentarios-btn');

                calendarioLink.addEventListener('click', function (e) {
                  if (!<?php echo isset($nombreCompleto) ? 'true' : 'false'; ?>) {
                    e.preventDefault();
                    alert('Por favor, inicia sesión para acceder al calendario.');
                  }
                });

                comentariosLink.addEventListener('click', function (e) {
                  if (!<?php echo isset($nombreCompleto) ? 'true' : 'false'; ?>) {
                    e.preventDefault();
                    alert('Por favor, inicia sesión para acceder a los comentarios.');
                  }
                });
              </script>
              <?php
    }
    ?>
          </div>
          <span class="popup-close" onclick="closePopup()">&times;</span>
          <script>
            function closePopup() {
              var popup = document.getElementById("popup");
              var boton = document.getElementById("sesion");
              popup.style.display = "none";
              boton.style.display = 'block';
            }
          </script>
        </div>
      </div>


  </nav>
  <br />
  <div id="AcercaDe">
    <h2>¡Bienvenidos a la pagina oficial de Inflables Marijo!</h2>
    <p>
      Somos una empresa apasionada y dedicada a brindar diversión y alegría a todos los eventos y fiestas en la ciudad.
      Desde nuestro inicio, hemos sido líderes en el mercado de renta de inflables, destacando por la calidad de
      nuestros productos y el excelente servicio al cliente que ofrecemos.
      Nuestra misión es crear experiencias inolvidables para cada uno de nuestros clientes, tanto niños como adultos.
      Contamos con una amplia variedad de inflables temáticos, desde castillos mágicos hasta deslizaderos acuáticos, que
      garantizan la máxima diversión en cada ocasión.
      ¡Esperamos verte pronto y ser
      parte de tus mejores recuerdos!
    </p>
    <h4>¡A saltar y reír con Inflables Marijo, donde la diversión nunca termina!</h4>
    <br>
    <p>Conoce nuestro catalogo: <a href="#catalogo" class="btnSalto"> ir >></a></p>
  </div>

  <center><img src="fotos/logo.png" class="logo2"></center>
  <h2 id="catalogo">NUESTRO PRODUCTO</h2>
  <p>¡Descubre la magia de la diversión con nuestro catálogo de inflables infantiles!

    En Inflables Marijo, hemos preparado una amplia selección de juegos inflables que harán que cada momento sea
    inolvidable para los más pequeños. Nuestros inflables están diseñados para estimular la imaginación, promover la
    actividad física y, sobre todo, ¡proporcionar toneladas de alegría!</p>

  <div class="container">
    <div class="galeria-container">
      <div class="galeria">
        <div class="fila-galeria">
          <div class="descripcion">
            <h2>Nombre: "Reino Encantado de la Princesita Sofía"</h2>
            <br>
            <p>
              ¡Descubre la magia de la princesa Sofía en nuestra colchoneta inflable! Sumérgete en un mundo encantado
              con
              colores vibrantes y diseños cautivadores. Disfruta de horas de diversión realzadas con la elegancia y
              encanto de la Princesita Sofía. Ideal para fiestas y eventos infantiles, esta colchoneta hará que los
              sueños
              se hagan realidad y que los pequeños se sientan como auténticos miembros de la realeza. ¡Crea recuerdos
              inolvidables en un reino de aventuras y alegría junto a la querida princesa Sofía!</p>
            <div class="btn-Ir">
              <a href=<?php echo isset($nombreCompleto) ? 'Calendario/index2.php' : '#'; ?>" class="go"
                id="calendarioGo">Agendar cita >></a>
            </div>
            <script>
              var calendarioLink = document.getElementById('calendarioGo');

              calendarioLink.addEventListener('click', function (e) {
                if (!<?php echo isset($nombreCompleto) ? 'true' : 'false'; ?>) {
                  e.preventDefault();
                  alert('Por favor, inicia sesión para acceder al calendario.');
                }
              });
            </script>
          </div>
          <div class="content">
            <div class="carrusel">
              <article class="card">
                <img src="fotos/brincolin1_1.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin1_2.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin1_3.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin1_4.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin1_5.jpg" class="img-galeria" alt="">
              </article>
            </div>
          </div>
        </div>
        <br>
        <div class="fila-galeria">
          <div class="descripcion">
            <h2>Nombre: "DinoLand Adventure Mat"</h2>
            <br>
            <p>
              Descripción breve: ¡Embárcate en una emocionante aventura prehistórica con nuestra colchoneta inflable
              DinoLand! Con sus impresionantes 10 metros de largo y 3 metros de ancho, esta colchoneta te transportará a
              la época de los dinosaurios. Disfruta de un día lleno de diversión y entretenimiento saltando y jugando en
              la espaciosa DinoLand Adventure Mat. Ideal para fiestas, eventos al aire libre y celebraciones. ¡Alquila
              esta colchoneta inflable por tan solo 800 pesos por 8 horas y crea recuerdos inolvidables junto a tus
              amigos
              y familiares!</p>
            <div class="btn-Ir">
              <a href=<?php echo isset($nombreCompleto) ? 'Calendario/index2.php' : '#'; ?>" class="go"
                id="calendarioGo">Agendar cita >></a>
            </div>
            <script>
              var calendarioLink = document.getElementById('calendarioGo');

              calendarioLink.addEventListener('click', function (e) {
                if (!<?php echo isset($nombreCompleto) ? 'true' : 'false'; ?>) {
                  e.preventDefault();
                  alert('Por favor, inicia sesión para acceder al calendario.');
                }
              });
            </script>
          </div>
          <div class="content">
            <div class="carrusel">
              <article class="card">
                <img src="fotos/brincolin2_1.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin2_2.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin2_3.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin2_4.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin2_5.jpg" class="img-galeria" alt="">
              </article>
            </div>
          </div>
        </div>
        <br>
        <div class="fila-galeria">
          <div class="descripcion">
            <h2>Nombre: "Colchoneta Tricolor Aventura"</h2>
            <br>
            <p>
              Descripción: ¡Embárcate en una emocionante aventura en nuestra colchoneta inflable tricolor! Con sus
              vibrantes
              colores rojo, amarillo y azul, esta colchoneta te transportará a un mundo lleno de diversión y emoción.
              Salta
              y juega en la espaciosa Colchoneta Tricolor Aventura, ideal para fiestas, eventos al aire libre y
              celebraciones. Disfruta de horas de entretenimiento junto a tus amigos y familiares en esta colchoneta
              repleta
              de energía y diversión. ¡Crea momentos inolvidables mientras te sumerges en un mar de colores y risas!
            </p>
            <div class="btn-Ir">
              <a href=<?php echo isset($nombreCompleto) ? 'Calendario/index2.php' : '#'; ?>" class="go"
                id="calendarioGo">Agendar cita >></a>
            </div>
            <script>
              var calendarioLink = document.getElementById('calendarioGo');

              calendarioLink.addEventListener('click', function (e) {
                if (!<?php echo isset($nombreCompleto) ? 'true' : 'false'; ?>) {
                  e.preventDefault();
                  alert('Por favor, inicia sesión para acceder al calendario.');
                }
              });
            </script>
          </div>
          <div class="content">
            <div class="carrusel">
              <article class="card">
                <img src="fotos/brincolin3_1.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin3_2.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin3_3.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin3_4.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin3_5.jpg" class="img-galeria" alt="">
              </article>
            </div>
          </div>
        </div>
        <br>
        <div class="fila-galeria">
          <div class="descripcion">
            <h2>Nombre: "Reino Encantado de Princesas Disney"</h2>
            <br>
            <p>
              Descripción: ¡Bienvenidos al Reino Encantado de Princesas Disney! Esta colchoneta inflable, de tamaño
              grande
              y
              decorada con tus princesas favoritas, te invita a sumergirte en un mundo mágico de fantasía. Con la
              encantadora presencia de Ariel, Bella, Cenicienta, Rapunzel y muchas más, cada salto y brinco se
              convertirá
              en
              una aventura única. Celebra tus fiestas y eventos especiales junto a las princesas más queridas de
              Disney,
              creando recuerdos inolvidables con tus amigos y familiares. Disfruta de horas de diversión, risas y
              alegría
              en
              el Reino Encantado de Princesas Disney. ¡Ven a vivir la magia y el encanto en esta colchoneta mágica que
              hará
              realidad todos tus sueños!</p>
            <div class="btn-Ir">
              <a href=<?php echo isset($nombreCompleto) ? 'Calendario/index2.php' : '#'; ?>" class="go"
                id="calendarioGo">Agendar cita >></a>
            </div>
            <script>
              var calendarioLink = document.getElementById('calendarioGo');

              calendarioLink.addEventListener('click', function (e) {
                if (!<?php echo isset($nombreCompleto) ? 'true' : 'false'; ?>) {
                  e.preventDefault();
                  alert('Por favor, inicia sesión para acceder al calendario.');
                }
              });
            </script>
          </div>
          <div class="content">
            <div class="carrusel">
              <article class="card">
                <img src="fotos/brincolin4_1.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin4_2.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin4_3.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin4_4.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin4_5.jpg" class="img-galeria" alt="">
              </article>
            </div>
          </div>
        </div>
        <br>
        <div class="fila-galeria">
          <div class="descripcion">
            <h2>Nombre: "Pequeño Reino de Princesas Disney"</h2>
            <br>
            <p>
              Descripción: ¡Bienvenidos al Pequeño Reino de Princesas Disney! Esta encantadora colchoneta inflable,
              diseñada
              para los más pequeños, está decorada con tus princesas favoritas de Disney. Desde Ariel hasta
              Blancanieves,
              las princesas te acompañarán en cada brinco y salto. Con su tamaño ideal para niños pequeños, podrán
              disfrutar
              de momentos mágicos de diversión y juegos. Celebra fiestas temáticas, eventos especiales o simplemente
              pasa
              un
              día inolvidable junto a tus amiguitos. El Pequeño Reino de Princesas Disney hará que la imaginación de
              los
              niños vuele alto mientras se sumergen en un mundo de cuentos de hadas y aventuras. ¡Descubre la magia y
              la
              alegría en esta colchoneta especialmente diseñada para los más pequeños soñadores!</p>
            <div class="btn-Ir">
              <a href=<?php echo isset($nombreCompleto) ? 'Calendario/index2.php' : '#'; ?>" class="go"
                id="calendarioGo">Agendar cita >></a>
            </div>
            <script>
              var calendarioLink = document.getElementById('calendarioGo');

              calendarioLink.addEventListener('click', function (e) {
                if (!<?php echo isset($nombreCompleto) ? 'true' : 'false'; ?>) {
                  e.preventDefault();
                  alert('Por favor, inicia sesión para acceder al calendario.');
                }
              });
            </script>
          </div>
          <div class="content">
            <div class="carrusel">
              <article class="card">
                <img src="fotos/brincolin5_1.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin5_2.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin5_3.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin5_4.jpg" class="img-galeria" alt="">
              </article>
              <article class="card">
                <img src="fotos/brincolin5_5.jpg" class="img-galeria" alt="">
              </article>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="imagen-light">
    <img src="" alt="Enlarged Image">
    <span class="close">&times;</span>
  </div>
  <script src="imagen.js"></script>
</body>
<footer>
  <div class="columna">
    <h3>Comentarios</h3>
    <a href="https://docs.google.com/forms/d/e/1FAIpQLSfP1057v7pV13HD0DRtRFurismdDTSJYpbwL-pbE6BLKbf5cQ/viewform?pli=1">Aquí
      puedes dejar tus comentarios y sugerencias.</a>
  </div>
  <div class="columna">
    <h3>Síguenos en Facebook</h3>
    <a href="https://www.facebook.com/AlejandroGomez697?mibextid=ZbWKwL" target="_blank">
      <i class="fa-brands fa-facebook" style="color: #005eff;">Facebook</i>
    </a>
  </div>
  <div class="columna">
    <h3>Contacto por WhatsApp</h3>
    <a href="https://api.whatsapp.com/send?phone=+524491098557&text=Hola%20quiero%20hacer%20una%20consulta"
      target="_blank">Envíanos un mensaje por WhatsApp al: +52 4491098557</p>
  </div>
</footer>

</html>