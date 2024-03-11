<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Cleaver</title>
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">
  </head>

  <body onload="cuenta()">

    {*Barra de navegacion de Usuarios*}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="indexPrincipal.php">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="experiencia_laboral.php">Experiencia Laboral
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="formacion_academica.php">Formacion Academica
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="Aficiones.php">Aficiones
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="interes.php">Interes
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="buscar_vacantes.php">Buscar Vacantes</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            {if $COUNT >= 1}
              <a class="btn demo-btn-on-bg text-white font-weight-bold ml-2 mt-2 mt-lg-0" data-toggle="modal" data-target="#exampleModal">
                <span class="fa-layers fa-fw mr-2 fa-lg">
                  <i class="fas fa-bell"></i>
                  <span class="fa-layers-counter" style="background:Tomato">{$COUNT}</span>
                </span>{$smarty.session.nomusuario}</a>
            </li>
            {else}
              <li class="nav-link active">{$smarty.session.nomusuario}</li>
            {/if}
            {* Creacion de la modal de notificaciones *}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-bell"></i> Notificaciones</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    {if $COUNTLAB >= 1}
                    <a class="nav-link" href="experiencia_laboral.php" style="color: blue;">Aun no ha registrado sus datos de Experiencia Laboral, click aqui para ir al registro</a>
                    {/if}
                    {if $COUNFOR >= 1}
                    <a class="nav-link" href="formacion_academica.php" style="color: blue;">Aun no ha registrado Formacion Academica, click aqui para ir al registro</a>
                    {/if}
                    {if $COUNTAFI >= 1}
                    <a class="nav-link" href="aficiones.php" style="color: blue;">Aun no ha registrado Experiencia Profesional, click aqui para ir al registro</a>
                    {/if}
                    {if $COUNTINT >= 1}
                    <a class="nav-link" href="interes.php" style="color: blue;">Aun no ha registrado sus datos de Interes, click aqui para ir al registro</a>
                    {/if}
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
            {*Boton para cerrar la sesion*}
            <a class="nav-link active text-danger" href="index.php" style="font-weight:bold;">Cerrar Sesión</a>
          </ul>
        </div>
      </div>
    </nav>

    {*Formulario del test de Clever*}
    <form action="cleaver.php" method="POST">
      <align>
        <form action="../pagina/cleaver.php" target="_blank">
          <div class="card border-primary shadow p-3 mb-5 bg-body rounded"
            style="max-width: 60rem; margin:auto; margin-top:30px;">
            <div class="card-header text-center">
              <h4 class="card-title">TEST DE CLEAVER</h4>
              <p class="card-description">La prueba consta de veinticinco partes. Para cada parte, se le mostrarán una
                serie
                de cuatro opciones, tendra que elegir qué opción se aplica más a usted y cuál se aplica menos.</p>
              <br>
              <h5 style="color: #20c997;">Tiempo limite: <p class="tiempo" id="minuto" style="display: inline;"></p>
                <p style="display: inline;" class="tiempo"> : </p>
                <p class="tiempo" style="display: inline;" id="contador"></p>
              </h5><br>
              <div class="alert alert-info">
                <strong>RECOMENDACIÓN:</strong> Trate de seleccionar la respuesta de manera natural que más se apegue a
                usted, en lugar de pensar demasiado en el significado de cada una.
              </div>
            </div>
            <center>
              <div class="card-body">
                <!--Parte 1-->
                <p>
                  <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
                    <FONT COLOR="black">
                      <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 1
                      </div>
                    </FONT>
                  </div>
                  <br>
                  <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    &nbsp
                    &nbsp &nbsp &nbsp &nbsp &nbsp
                  </div>
                  <!--TEXTOS -->
                  <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
                    <FONT COLOR="white">
                      <div class="container text-center">
                        <div class="row align-items-center">
                          <div class="col">
                            <div class="card-header bg-primary" align="center" style="width:35rem">Adopta una actitud
                              dominunate hacia otros</div>
                    </FONT>
                  </div>
                  <div class="col">
                    <input type="radio" name="resp1" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
                    <input type="radio" name="resp2" value="A">
                  </div>
              </div>
          </div>
          </div>
          <!--TEXTOS -->
          <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
            <FONT COLOR="white">
              <div class="container text-center">
                <div class="row align-items-center">
                  <div class="col">
                    <div class="card-header bg-primary" align="center" style="width:35rem">Inlfuencia las ideas de otras
                      personas</div>
            </FONT>
          </div>
          <div class="col">
            <input type="radio" name="resp1" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
            <input type="radio" name="resp2" value="B">
          </div>
          </div>
          </div>
          </div>
          <!--TEXTOS -->
          <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
            <FONT COLOR="white">
              <div class="container text-center">
                <div class="row align-items-center">
                  <div class="col">
                    <div class="card-header bg-primary" align="center" style="width:35rem">Permanece estable y calmado
                      todo
                      el tiempo</div>
            </FONT>
          </div>
          <div class="col">
            <input type="radio" name="resp1" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
            <input type="radio" name="resp2" value="C">
          </div>
          </div>
          </div>
          </div>
          <!--TEXTOS -->
          <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
            <FONT COLOR="white">
              <div class="container text-center">
                <div class="row align-items-center">
                  <div class="col">
                    <div class="card-header bg-primary" align="center" style="width:35rem">Cumple con instrucciones y
                      reglas
                    </div>
            </FONT>
          </div>
          <div class="col">
            <input type="radio" name="resp1" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
            <input type="radio" name="resp2" value="D">
          </div>
          </div>
          </div>
          </div>
          <br>
          </p>

          <!--Parte 2-->
          <p>
            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 2
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Comportarse compasivamente
                        con
                        otros</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp3" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp4" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Persuadir a otros de tu
                        puntos
                        de vista</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp3" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp4" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Mostrar modestia al describir
                        tus logros</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp3" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp4" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Producir ideas originales
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp3" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp4" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 3-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 3
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Recibir atención de otras
                        personas</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp5" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp6" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Trabajar junto con otros para
                        lograr una meta</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp5" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp6" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Defender sus derechos</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp5" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp6" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Mostrar afecto en relaciones
                        personales</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp5" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp6" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 4-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 4
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Saber cuándo admitir la
                        derrota
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp7" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp8" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Probar experiencias nuevas
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp7" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp8" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Permanecer leal a tus amigos
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp7" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp8" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Ser percibido como divertido
                        por otros</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp7" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp8" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 5-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 5
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Escuchar ideas nuevas con
                        mente
                        abierta</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp9" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp10" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Estar listo para hacer u
                        sacrificio por otros</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp9" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp10" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Mostar determinación para
                        lograr una meta</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp9" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp10" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Mantener una perspectiva
                        positiva</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp9" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp10" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 6-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 6
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Que otras personas disfruten
                        de
                        tu compañía</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp11" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp12" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Ser meticuloso para conseguir
                        detalle preciso</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp11" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp12" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Defender tus puntos de vista
                        y
                        opiniones</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp11" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp12" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Mantenerse tranquilo y
                        ecuánime
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp11" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp12" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 7-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 7
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Conservar una ventaja
                        competitiva sobre otros</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp13" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp14" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Tomarse tiempo para pensar
                        acerca de las necesidades de otras personas</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp13" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp14" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Mantener una cisión de la
                        vida
                        y optimista</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp13" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp14" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Mantenerse en buenos términos
                        con tanta gente como sea posible
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp13" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp14" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 8-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 8
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>

            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Explicar las cosas con
                        precisión cuando se requiera</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp15" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp16" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Seguir las reglas en todo
                        momento</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp15" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp16" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Tener control de tu vida
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp15" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp16" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Disfrutar de todo lo que
                        haces
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp15" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp16" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 9-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 9
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>

            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Estar listo para tomar
                        riesgos
                        cuando se requiera</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp17" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp18" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Comunicarse de una forma que
                        inspire</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp17" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp18" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Aceptar la parte que te tocó
                        en
                        la vida</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp17" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp18" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Preservar el status quo</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp17" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp18" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 10-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 10
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>

            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Disfrutar la compañía de
                        otras
                        personas</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp19" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp20" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Aceptar faltas en otros</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp19" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp20" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Estar seguro de tus propias
                        habilidades</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp19" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp20" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Evitar situaciones
                        confrontativas</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp19" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp20" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 11-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 11
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>

            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Sacar plena ventaja de las
                        oportunidades</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp21" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp22" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Ser receptivo a nuevas ideas
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp21" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp22" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Ser amigable y cordial cuando
                        quiera que sea posible</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp21" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp22" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Comportarse de una forma
                        moderada y contenida</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp21" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp22" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 12-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 12
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>

            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Expresar ideas a otras
                        personas
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp23" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp24" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Mantener una actitud
                        auto-disciplinada</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp23" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp24" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Tomar decisiones y mantenerse
                        firme en ellas</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp23" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp24" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Cumple con instrucciones y
                        reglas</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp23" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp24" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 13-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 13
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>

            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Presentar una imagen
                        profesional y refinada</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp25" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp26" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">No tener miedo de ofender
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp25" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp26" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Evitar herir los sentimientos
                        de otras personas</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp25" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp26" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Ser feliz en tu trabajo</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp25" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp26" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 14-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 14
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>

            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Tomar el control cuando una
                        situación lo requiera</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp27" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp28" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Ser el centro de atención
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp27" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp28" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Ayudar a otras personas
                        cuando
                        puedas</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp27" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp28" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Evitar riesgos innecesarios
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp27" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp28" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 15-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 15
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>

            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Tener cuidado para que las
                        cosas salgan exactamente bien</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp29" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp30" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Rehusarse a aceptar la
                        derrota
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp29" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp30" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Tener un impacto positivo en
                        la
                        vida de otras personas</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp29" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp30" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Dar a otros el beneficio de
                        la
                        duda</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp29" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp30" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 16-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 16
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>

            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Ofrecerse voluntario para
                        ayudar a otros</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp31" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp32" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Disfrutar de tu trabajo</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp31" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp32" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Pactar una solución cuando
                        puedas</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp31" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp32" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Abordar a los problemas de
                        una
                        forma dinámica y original</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp31" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp32" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 17-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 17
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>

            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Esperar que las cosas salgan
                        lo
                        mejor posible</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp33" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp34" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Simpatizar con los problemas
                        de
                        los demás</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp33" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp34" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Tratar calmadamente con
                        situaciones difíciles</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp33" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp34" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Exigir estándares altos</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp33" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp34" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 18-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 18
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>

            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Mantener un estándar de
                        auto-disciplina</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp35" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp36" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Estar preparado para perdonar
                        a
                        otros</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp35" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp36" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Asegurarte que los demás
                        entiendan tu punto de vista</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp35" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp36" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Seguir con una tarea hasta
                        terminarla</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp35" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp36" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 19-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 19
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>

            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Poner un estándar que sea
                        modelo para los demás</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp37" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp38" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Ser amable y considerado
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp37" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp38" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Saber cuándo aceptar la
                        derrota
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp37" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp38" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Tener una personalidad
                        enérgica
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp37" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp38" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 20-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 20
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>

            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Tener respeto por los demás
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp39" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp40" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Estar preparado para intentar
                        nuevas maneras de abordar un problema</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp39" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp40" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Sentirse confiado en la
                        compañía de otros</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp39" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp40" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Siempre tomar en cuenta los
                        puntos de vista de otros</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp39" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp40" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 21-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 21
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>

            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Estar preparado para
                        confrontar
                        a otros cuando sea necesario</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp41" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp42" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Adaptarse bien a situaciones
                        nuevas</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp41" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp42" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Tener una actitud calmada y
                        relajada ante la vida</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp41" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp42" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Generar un ambiente alegre
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp41" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp42" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 22-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 22
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>

            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Confiar en otras personas
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp43" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp44" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Estar satisfecho con tu
                        posición en la vida</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp43" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp44" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Mantener una actitud positiva
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp43" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp44" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Tratar de evitar el conflicto
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp43" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp44" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 23-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 23
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>

            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Agradarle a otras personas
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp45" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp46" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Mantener un amplio
                        conocimiento
                        general</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp45" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp46" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Abordar a los problemas con
                        vigor y entusiasmo</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp45" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp46" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Aceptar las faltas en otras
                        personas</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp45" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp46" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 24-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 24
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>

            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Ser considerado como buena
                        compañía</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp47" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp48" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Asegurarse de que tu trabajo
                        es
                        exacto</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp47" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp48" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Expresarte en cuestiones que
                        son importantes para ti</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp47" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp48" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Utilizar contención y
                        auto-control</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp47" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp48" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--Parte 25-->
          <p>

            <div class="card border-secondary mb-3" style="max-width: 25rem; border:none; display:inline;">
              <FONT COLOR="black">
                <div class="card-header bg-info" style="font-weight:bold;" align="center">PARTE 25
                </div>
              </FONT>
            </div>
            <br>
            <div align=right class="well">( + )&nbsp&nbsp &nbsp &nbsp ( - ) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
            </div>

            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Completar tareas tan
                        rápidamente como sea posible</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp49" value="A"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp50" value="A">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Adoptar un actitud cordial
                      </div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp49" value="B"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp50" value="B">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Tener un amplio círculo de
                        amigos</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp49" value="C"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp50" value="C">
            </div>
            </div>
            </div>
            </div>
            <!--TEXTOS -->
            <div align="center" class="card border-secondary mb-3" style="max-width: 45rem;border:none;">
              <FONT COLOR="white">
                <div class="container text-center">
                  <div class="row align-items-center">
                    <div class="col">
                      <div class="card-header bg-primary" align="center" style="width:35rem">Abordarse a los problemas de
                        forma sistemática</div>
              </FONT>
            </div>
            <div class="col">
              <input type="radio" name="resp49" value="D"> &nbsp &nbsp &nbsp &nbsp &nbsp
              <input type="radio" name="resp50" value="D">
            </div>
            </div>
            </div>
            </div>
            <br>
          </p>
          <!--MENSAJE FINAL -->
          <p>
            </div>
            <div align="center"><br>
              <div class="alert alert-warning">
                <strong>!OJO!</strong>&nbsp ¡NO OLVIDE CONTESTAR NINGUNA DE LAS PARTES ANTES PRESIONAR EL BOTÓN FINALIZAR
                TEST!
              </div>
              <input class="btn btn-primary" name="btnfinalizar" type="submit" value="FINALIZAR TEST">
            </div>
            </div>
            <br>

          </p>

        </form>
      </align>
    </form>
    
    {*Conexion de librerias de JavaScript y bootstrap*}                
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="../smarty/js/contador-cleaver.js"></script>
  </body>

</html>