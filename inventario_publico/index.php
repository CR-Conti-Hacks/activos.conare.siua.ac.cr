<!DOCTYPE html>
<html lang="es">
  <head>
    <?php 
      include("header.php");
    ?>
    <?php
    $colorEnlaceFooterUgit = "rosado";

    ?>
    <style>

      /*Definición de colores*/
      :root {
      --fondo1: #283593 !important;
      --fondo2: #0D79C4 !important;
      --circulos: #FFF !important;
      --boton: #ff4081 !important;
    }

    /*Header*/
      .mdl-layout__header {
        background-color: var(--fondo1);
      } 
      /*Card*/
      div.mdl-card__title {
        background-color: var(--fondo2);
        color: #FFF;
    }
    /*Boton*/
    .mdl-button--accent.mdl-button--accent.mdl-button--raised, .mdl-button--accent.mdl-button--accent.mdl-button--fab {
        color: #FFF;
        background-color: var(--boton);
    }
    /*Preloader*/
    .loading::before {
        background-color: var(--fondo1);
    }
    .loading:not(:required)::after {
        -webkit-box-shadow: var(--circulos) 1.5em 0 0 0, var(--circulos) 1.1em 1.1em 0 0, var(--circulos) 0 1.5em 0 0, var(--circulos) -1.1em 1.1em 0 0, var(--circulos) -1.5em 0 0 0, var(--circulos) -1.1em -1.1em 0 0, var(--circulos) 0 -1.5em 0 0, var(--circulos) 1.1em -1.1em 0 0;
        box-shadow: var(--circulos) 1.5em 0 0 0, var(--circulos) 1.1em 1.1em 0 0, var(--circulos) 0 1.5em 0 0, var(--circulos) -1.1em 1.1em 0 0, var(--circulos) -1.5em 0 0 0, var(--circulos) -1.1em -1.1em 0 0, var(--circulos) 0 -1.5em 0 0, var(--circulos) 1.1em -1.1em 0 0;
        color: #FFF;
    }

    </style>

  </head>

  <body id="top">
    <div class="page-wrapper"></div>
    <div class="loading">Cargando &#8230;</div>


    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

    <?php 
      include("menu.php")
    ?>

      <!-- ******************************************************************************** -->
      <!-- ***************************    MAIN      *************************************** -->
      <!-- ******************************************************************************** -->
      <main class="mdl-layout__content">
        <div class="site-content">
          <div class="container">


              <!-- ********************************************* -->
              <!-- ***********     BIENVENIDA   **************** -->
              <!-- ********************************************* -->
              <div class="mdl-grid site-max-width">
                <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp welcome-card portfolio-card">
                  <div class="mdl-card__title" id="titulo_bienvenida">
                    <h2 class="mdl-card__title-text">Bienvenid@</h2>
                  </div>
                  <div class="mdl-card__supporting-text">
                    <p>
                      Bienvenido este sitio es la parte parte pública del Sistema de Inventario de la Sede Interuniversitaria de Alajuela, el cual brinda un servicio de consulta automática
                      de los activos pertenecientes a la SIUA, o a las diferentes universidades miembros de la misma
                    </p>
                    <p>
                      El sitio posee la habilidad de consultar información de un activo, como es su marca, modelo, color, numero de serie, Ubicación, entre otras.
                    </p>
                    <p>
                      Brinda además la posibilidad de un verificador de activos por ubicación
                    </p>
                  </div>
                  <div class="mdl-card__actions mdl-card--border">
                    <!-- ********************************************* -->
                    <!-- ***********     IR A SITIO   **************** -->
                    <!-- ********************************************* -->
                    <section class="section--center mdl-grid site-max-width homepage-portfolio">
                        <a class="mdl-button mdl-button--raised mdl-js-button mdl-js-ripple-effect mdl-button--accent" href="http://sae.siua.ac.cr" target="_blank">
                          <i class="fa fa-share fa-lg"></i>
                          Ir al Sistema (SAE)
                        </a>
                    </section>


                  </div>
                </div>
              </div>
          </div>
        </div>
        <?php
          include("footer.php");

        ?>
      </main>
      <script src="scripts/material.min.js" defer></script>
      <script src="scripts/index.js"></script>

      <!-- Jquery -->
      <script src="scripts/jquery-3.2.0.min.js"></script>
    </div>
  </body>
</html>
