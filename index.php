<?php
  include 'controllers/consultas.php';
  if (empty($grupos)) {
      echo "No hay grupos disponibles.";
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>5o Distrito | Área Yucatán Uno</title>
  <link rel="icon" href="img/logo.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="styles.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <script>
    const dataGrafica = <?php echo $dataGraficaJSON; ?>;
  </script>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" class="img-fluid" style="width: 30px; height: 30px; margin-right: 10px;">
                5o Distrito|Yucatán Uno
            </a>
            <div>
                <a href="https://wa.me/529992399347" target="_blank">
                    <img src="img/WhatsApp.png" style="width: 40px; height: 40px;">
                </a>
            </div>             
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="#inicio">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#cuadernillo">Cuadernillo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#registro">Registro</a></li>
                </ul>
            </div>
        </div>
    </nav>

<section id="inicio" class="primario animar" 
         style="background-image: url('img/banner.jpg');">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-2">
          <img src="img/logoCMSG.png" class="img-fluid" style="width: auto; height: 100px; margin-right: 10px;">
        </div>
        <div class="col-md-5">
          <h1 class="display-4">5o Distrito</h1>
          <h1 class="display-4">Área Yucatán Uno</h1>
          <!-- <p class="lead">Las personas en esta imagen son generadas con IA y no son miembros de AA</p> -->
        </div>
        <div class="col-md-5">
          <h2>Registro de Asistencia</h2>
          <canvas id="graficaPastel" width="400" height="400"></canvas>
        </div>        
      </div>
    </div>
</section>

  <!-- Sección Nosotros -->
  <section id="nosotros" class="secundario animar">
    <div class="container">
      <h2>Preámbulo</h2>
      <p>Alcohólicos Anónimos es una comunidad de personas que comparten su mutua experiencia, fortaleza y esperanza para resolver su problema común y ayudar a otros a recuperarse del alcoholismo.

        El único requisito para ser miembro de A.A. es el deseo de dejar la bebida. Para ser miembro de A.A. no se pagan derechos de admisión ni cuotas; nos mantenemos con nuestras propias contribuciones. A.A. no está afiliada a ninguna secta, religión, partido político, organización o institución alguna; no desea intervenir en controversias; no respalda ni se opone a ninguna causa.
        
        Nuestro objetivo primordial es mantenernos sobrios y ayudar a otros alcohólicos a alcanzar el estado de sobriedad.</p>
    </div>
  </section>

<section id="cuadernillo" class="secundario animar"> 
    <div class="primario">
  <h2>Cuadernillo de actividades</h2>
  <?php
  $imagenes = ["pagina01", "pagina02", "pagina03", "pagina04", "pagina05", "pagina06"];
  $frases = ["", "", "", "", "", ""];
  ?>

  <!-- Carrusel -->
  <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
      <div class="carousel-inner">
          <?php foreach ($imagenes as $index => $imagen) : ?>
              <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                  <img src="img/<?php echo $imagen; ?>.jpg" class="d-block w-100 carousel-img" alt="Imagen <?php echo $index + 1; ?>">
                  <div class="carousel-caption d-none d-md-block">
                      <?php echo $frases[$index]; ?>
                  </div>
              </div>
          <?php endforeach; ?>
      </div>

      <!-- Controles -->
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Siguiente</span>
      </button>
  </div>
  </div>
</section>

  <!-- Sección Contacto -->
  <section id="registro">
    <div class="primario">
      <h2>50o Aniversario del 5o Distrito</h2>
      <div class="row">
        <div class="col-md-6">
          <h4>Bienvenido, Registra tu asistencia</h4>         
            <form action="controllers/registro.php" method="POST">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Requerido" required>
                </div>  
                <div class="form-group">
                    <label for="grupo">Grupo</label>
                    <select class="form-control" id="grupo" name="grupo" required onchange="toggleGrupoInput(this)">
                        <option value="" disabled selected>Selecciona un grupo</option>
                        <option value="nuevo">No está en esta lista...</option>
                        <?php foreach ($grupos as $grupo): ?>
                            <option value="<?php echo $grupo['grupo']; ?>"><?php echo $grupo['grupo']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="text" class="form-control mt-2" id="grupo2" name="grupo2" placeholder="Ingrese el nombre del grupo" style="display: none;">
                </div>
                <div class="form-group">
                  <label for="distrito">Distrito</label>
                  <input type="text" class="form-control" id="distrito" name="distrito" placeholder="No es necesario llenar si es del V Distrito">
                </div>    
                <div class="form-group">
                  <label for="area">Área</label>
                  <input type="text" class="form-control" id="area" name="area" placeholder="No es necesario llenar si es Yucatán Uno">
                </div> 
                <div class="form-group">
                  <label for="servicio">Servicio</label>
                  <input type="text" class="form-control" id="servicio" name="servicio">
                </div>                                           
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
      </div>
      <br>
        <div class="col-md-6">
          <h4>Encuéntranos</h4>
          <div id="map" class="embed-responsive embed-responsive-4by3">
            <iframe class="embed-responsive-item" 
                src="https://maps.google.com/maps?q=20.9727169,-89.6525105&hl=es;z=14&output=embed" 
                allowfullscreen></iframe>
          </div>
          <p class="mt-3">Dirección: CALLE 59 # 708-B x 108 y 110 COL BOJORQUEZ, Mérida, Yucatán, México<br>Teléfono: 999 239 9347<br>Email: ...</p>
        </div>      
    </div>
  </section>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="grafica.js"></script>
  <script>
    function toggleGrupoInput(select) {
      const grupo2Input = document.getElementById('grupo2');
      if (select.value === 'nuevo') {
        grupo2Input.style.display = 'block'; // Muestra el campo de entrada
        grupo2Input.setAttribute('required', 'required'); // Hace que el campo sea requerido
      } else {
        grupo2Input.style.display = 'none'; // Oculta el campo de entrada
        grupo2Input.removeAttribute('required'); // Elimina el atributo requerido
        grupo2Input.value = ''; // Limpia el valor del campo
      }
    }
  </script>
</body>
</html>
