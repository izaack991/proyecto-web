<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test de Raven</title>
    <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
    <link rel="icon" href="../../assets/images/WorkeleWB.ico" type="image/x-icon">
    <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {*Codigo de CSS para el diseño personalizado del test*}
    <style>
      .pregresp {
        border: 1px solid #20c997;
        padding: 10px;
        margin: 10px;
        font-size: 15px;
        font-weight: bold;
        border-radius: 0.4rem;
      }

      .pregunta {
        color: #20c997;
      }

      .tiempo {
        color: red;
      }
    </style>
  </head>

  {*Codigo JavaScript para el contador*}
  <script type="text/javascript">
    var timeLimit = 20; //tiempo en minutos
    var conteo = new Date(timeLimit * 60000);

    function inicializar() {
      document.getElementById('cuenta').childNodes[0].nodeValue =
        conteo.getMinutes() + ":" + conteo.getSeconds();
    }

    function cuenta() {
      intervaloRegresivo = setInterval("regresiva()", 1000);
    }

    function regresiva() {
      if (conteo.getTime() > 0) {
        conteo.setTime(conteo.getTime() - 1000);
      } else {
        clearInterval(intervaloRegresivo);
        Swal.fire({
          title: 'El tiempo limite ha expirado',
          confirmButtonText: 'Finalizar',
        }).then((result) => {

          if (result.isConfirmed) {
            $("#btnfinalizar").click();
          }
        })
      }

      document.getElementById('cuenta').childNodes[0].nodeValue =
        conteo.getMinutes() + ":" + conteo.getSeconds();
    }

    onload = inicializar;
  </script>

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

    {*Card del test de raven*}
    <div class="card border-primary shadow p-3 mb-5 bg-body rounded" style="max-width: 60rem; margin:auto; margin-top:30px;">
      <div class="card-header text-center">
        <h4 class="card-title">TEST DE RAVEN</h4>
      </div>
      <center>
        <div class="card-body">
          <h5 style="color: #20c997;">Tiempo limite: <p class="tiempo" id="minuto" style="display: inline;"></p>
            <p style="display: inline;" class="tiempo"> : </p>
            <p class="tiempo" style="display: inline;" id="contador"></p>
          </h5><br>
          <p><b>INSTRUCCIONES:</b> Para cada uno de los problemas siguientes, se sugieren algunas
            respuestas. Marque en la hoja de respuestas con una cruz el espacio que corresponda a
            la solución que usted considere más acertada. No marque más de una.</p>
        </div>
      </center>

      {*Formulario del test de raven*}
      <form action="testRaven.php" method="POST">
        <div align="left">
          <div class="pregresp">
            <div class="pregunta">1.- <br>
              <div align="center">
                <img src="../pagina/img/1.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg1" value="A" /> 1<br />
                    <input type="radio" name="preg1" value="B" /> 2<br />
                    <input type="radio" name="preg1" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg1" value="E" /> 4<br />
                    <input type="radio" name="preg1" value="F" /> 5<br />
                    <input type="radio" name="preg1" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">2.- <br>
              <div align="center">
                <img src="../pagina/img/2.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg2" value="A" /> 1<br />
                    <input type="radio" name="preg2" value="B" /> 2<br />
                    <input type="radio" name="preg2" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg2" value="E" /> 4<br />
                    <input type="radio" name="preg2" value="F" /> 5<br />
                    <input type="radio" name="preg2" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">3.- <br>
              <div align="center">
                <img src="../pagina/img/3.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg3" value="A" /> 1<br />
                    <input type="radio" name="preg3" value="B" /> 2<br />
                    <input type="radio" name="preg3" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg3" value="E" /> 4<br />
                    <input type="radio" name="preg3" value="F" /> 5<br />
                    <input type="radio" name="preg3" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">4.- <br>
              <div align="center">
                <img src="../pagina/img/4.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg4" value="A" /> 1<br />
                    <input type="radio" name="preg4" value="B" /> 2<br />
                    <input type="radio" name="preg4" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg4" value="E" /> 4<br />
                    <input type="radio" name="preg4" value="F" /> 5<br />
                    <input type="radio" name="preg4" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">5.- <br>
              <div align="center">
                <img src="../pagina/img/5.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg5" value="A" /> 1<br />
                    <input type="radio" name="preg5" value="B" /> 2<br />
                    <input type="radio" name="preg5" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg5" value="E" /> 4<br />
                    <input type="radio" name="preg5" value="F" /> 5<br />
                    <input type="radio" name="preg5" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">6.- <br>
              <div align="center">
                <img src="../pagina/img/6.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg6" value="A" /> 1<br />
                    <input type="radio" name="preg6" value="B" /> 2<br />
                    <input type="radio" name="preg6" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg6" value="E" /> 4<br />
                    <input type="radio" name="preg6" value="F" /> 5<br />
                    <input type="radio" name="preg6" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">7.- <br>
              <div align="center">
                <img src="../pagina/img/7.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg7" value="A" /> 1<br />
                    <input type="radio" name="preg7" value="B" /> 2<br />
                    <input type="radio" name="preg7" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg7" value="E" /> 4<br />
                    <input type="radio" name="preg7" value="F" /> 5<br />
                    <input type="radio" name="preg7" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">8.- <br>
              <div align="center">
                <img src="../pagina/img/8.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg8" value="A" /> 1<br />
                    <input type="radio" name="preg8" value="B" /> 2<br />
                    <input type="radio" name="preg8" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg8" value="E" /> 4<br />
                    <input type="radio" name="preg8" value="F" /> 5<br />
                    <input type="radio" name="preg8" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">9.- <br>
              <div align="center">
                <img src="../pagina/img/9.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg9" value="A" /> 1<br />
                    <input type="radio" name="preg9" value="B" /> 2<br />
                    <input type="radio" name="preg9" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg9" value="E" /> 4<br />
                    <input type="radio" name="preg9" value="F" /> 5<br />
                    <input type="radio" name="preg9" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">10.- <br>
              <div align="center">
                <img src="../pagina/img/10.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg10" value="A" /> 1<br />
                    <input type="radio" name="preg10" value="B" /> 2<br />
                    <input type="radio" name="preg10" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg10" value="E" /> 4<br />
                    <input type="radio" name="preg10" value="F" /> 5<br />
                    <input type="radio" name="preg10" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">11.- <br>
              <div align="center">
                <img src="../pagina/img/11.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg11" value="A" /> 1<br />
                    <input type="radio" name="preg11" value="B" /> 2<br />
                    <input type="radio" name="preg11" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg11" value="E" /> 4<br />
                    <input type="radio" name="preg11" value="F" /> 5<br />
                    <input type="radio" name="preg11" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">12.- <br>
              <div align="center">
                <img src="../pagina/img/12.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg12" value="A" /> 1<br />
                    <input type="radio" name="preg12" value="B" /> 2<br />
                    <input type="radio" name="preg12" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg12" value="E" /> 4<br />
                    <input type="radio" name="preg12" value="F" /> 5<br />
                    <input type="radio" name="preg12" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">13.- <br>
              <div align="center">
                <img src="../pagina/img/13.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg13" value="A" /> 1<br />
                    <input type="radio" name="preg13" value="B" /> 2<br />
                    <input type="radio" name="preg13" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg13" value="E" /> 4<br />
                    <input type="radio" name="preg13" value="F" /> 5<br />
                    <input type="radio" name="preg13" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">14.- <br>
              <div align="center">
                <img src="../pagina/img/14.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg14" value="A" /> 1<br />
                    <input type="radio" name="preg14" value="B" /> 2<br />
                    <input type="radio" name="preg14" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg14" value="E" /> 4<br />
                    <input type="radio" name="preg14" value="F" /> 5<br />
                    <input type="radio" name="preg14" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">15.- <br>
              <div align="center">
                <img src="../pagina/img/15.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg15" value="A" /> 1<br />
                    <input type="radio" name="preg15" value="B" /> 2<br />
                    <input type="radio" name="preg15" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg15" value="E" /> 4<br />
                    <input type="radio" name="preg15" value="F" /> 5<br />
                    <input type="radio" name="preg15" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">16.- <br>
              <div align="center">
                <img src="../pagina/img/16.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg16" value="A" /> 1<br />
                    <input type="radio" name="preg16" value="B" /> 2<br />
                    <input type="radio" name="preg16" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg16" value="E" /> 4<br />
                    <input type="radio" name="preg16" value="F" /> 5<br />
                    <input type="radio" name="preg16" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">17.- <br>
              <div align="center">
                <img src="../pagina/img/17.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg17" value="A" /> 1<br />
                    <input type="radio" name="preg17" value="B" /> 2<br />
                    <input type="radio" name="preg17" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg17" value="E" /> 4<br />
                    <input type="radio" name="preg17" value="F" /> 5<br />
                    <input type="radio" name="preg17" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">18.- <br>
              <div align="center">
                <img src="../pagina/img/18.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg18" value="A" /> 1<br />
                    <input type="radio" name="preg18" value="B" /> 2<br />
                    <input type="radio" name="preg18" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg18" value="E" /> 4<br />
                    <input type="radio" name="preg18" value="F" /> 5<br />
                    <input type="radio" name="preg18" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">19.- <br>
              <div align="center">
                <img src="../pagina/img/19.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg19" value="A" /> 1<br />
                    <input type="radio" name="preg19" value="B" /> 2<br />
                    <input type="radio" name="preg19" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg19" value="E" /> 4<br />
                    <input type="radio" name="preg19" value="F" /> 5<br />
                    <input type="radio" name="preg19" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">20.- <br>
              <div align="center">
                <img src="../pagina/img/20.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg20" value="A" /> 1<br />
                    <input type="radio" name="preg20" value="B" /> 2<br />
                    <input type="radio" name="preg20" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg20" value="E" /> 4<br />
                    <input type="radio" name="preg20" value="F" /> 5<br />
                    <input type="radio" name="preg20" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">21.- <br>
              <div align="center">
                <img src="../pagina/img/21.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg21" value="A" /> 1<br />
                    <input type="radio" name="preg21" value="B" /> 2<br />
                    <input type="radio" name="preg21" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg21" value="E" /> 4<br />
                    <input type="radio" name="preg21" value="F" /> 5<br />
                    <input type="radio" name="preg21" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">22.- <br>
              <div align="center">
                <img src="../pagina/img/22.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg22" value="A" /> 1<br />
                    <input type="radio" name="preg22" value="B" /> 2<br />
                    <input type="radio" name="preg22" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg22" value="E" /> 4<br />
                    <input type="radio" name="preg22" value="F" /> 5<br />
                    <input type="radio" name="preg22" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">23.- <br>
              <div align="center">
                <img src="../pagina/img/23.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg23" value="A" /> 1<br />
                    <input type="radio" name="preg23" value="B" /> 2<br />
                    <input type="radio" name="preg23" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg23" value="E" /> 4<br />
                    <input type="radio" name="preg23" value="F" /> 5<br />
                    <input type="radio" name="preg23" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">24.- <br>
              <div align="center">
                <img src="../pagina/img/24.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg24" value="A" /> 1<br />
                    <input type="radio" name="preg24" value="B" /> 2<br />
                    <input type="radio" name="preg24" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg24" value="E" /> 4<br />
                    <input type="radio" name="preg24" value="F" /> 5<br />
                    <input type="radio" name="preg24" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">25.- <br>
              <div align="center">
                <img src="../pagina/img/25.jpg" height="563" width="788" />
              </div>
            </div>
            <br>
            <div>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg25" value="A" /> 1<br />
                    <input type="radio" name="preg25" value="B" /> 2<br />
                    <input type="radio" name="preg25" value="C" /> 3<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg25" value="E" /> 4<br />
                    <input type="radio" name="preg25" value="F" /> 5<br />
                    <input type="radio" name="preg25" value="G" /> 6<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">26.- <br>
              <img src="../pagina/img/26.jpg" height="563" width="788" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg26" value="A" /> 1<br />
                    <input type="radio" name="preg26" value="B" /> 2<br />
                    <input type="radio" name="preg26" value="C" /> 3<br />
                    <input type="radio" name="preg26" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg26" value="E" /> 5<br />
                    <input type="radio" name="preg26" value="F" /> 6<br />
                    <input type="radio" name="preg26" value="G" /> 7<br />
                    <input type="radio" name="preg26" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">27.- <br>
              <img src="../pagina/img/27.jpg" height="563" width="788" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg27" value="A" /> 1<br />
                    <input type="radio" name="preg27" value="B" /> 2<br />
                    <input type="radio" name="preg27" value="C" /> 3<br />
                    <input type="radio" name="preg27" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg27" value="E" /> 5<br />
                    <input type="radio" name="preg27" value="F" /> 6<br />
                    <input type="radio" name="preg27" value="G" /> 7<br />
                    <input type="radio" name="preg27" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">28.- <br>
              <img src="../pagina/img/28.jpg" height="563" width="788" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg28" value="A" /> 1<br />
                    <input type="radio" name="preg28" value="B" /> 2<br />
                    <input type="radio" name="preg28" value="C" /> 3<br />
                    <input type="radio" name="preg28" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg28" value="E" /> 5<br />
                    <input type="radio" name="preg28" value="F" /> 6<br />
                    <input type="radio" name="preg28" value="G" /> 7<br />
                    <input type="radio" name="preg28" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">29.- <br>
              <img src="../pagina/img/29.jpg" height="563" width="788" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg29" value="A" /> 1<br />
                    <input type="radio" name="preg29" value="B" /> 2<br />
                    <input type="radio" name="preg29" value="C" /> 3<br />
                    <input type="radio" name="preg29" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg29" value="E" /> 5<br />
                    <input type="radio" name="preg29" value="F" /> 6<br />
                    <input type="radio" name="preg29" value="G" /> 7<br />
                    <input type="radio" name="preg29" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">30.- <br>
              <img src="../pagina/img/30.jpg" height="563" width="788" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg30" value="A" /> 1<br />
                    <input type="radio" name="preg30" value="B" /> 2<br />
                    <input type="radio" name="preg30" value="C" /> 3<br />
                    <input type="radio" name="preg30" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg30" value="E" /> 5<br />
                    <input type="radio" name="preg30" value="F" /> 6<br />
                    <input type="radio" name="preg30" value="G" /> 7<br />
                    <input type="radio" name="preg30" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">31.- <br>
              <img src="../pagina/img/31.jpg" height="563" width="788" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg31" value="A" /> 1<br />
                    <input type="radio" name="preg31" value="B" /> 2<br />
                    <input type="radio" name="preg31" value="C" /> 3<br />
                    <input type="radio" name="preg31" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg31" value="E" /> 5<br />
                    <input type="radio" name="preg31" value="F" /> 6<br />
                    <input type="radio" name="preg31" value="G" /> 7<br />
                    <input type="radio" name="preg31" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">32.- <br>
              <img src="../pagina/img/32.jpg" height="563" width="788" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg32" value="A" /> 1<br />
                    <input type="radio" name="preg32" value="B" /> 2<br />
                    <input type="radio" name="preg32" value="C" /> 3<br />
                    <input type="radio" name="preg32" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg32" value="E" /> 5<br />
                    <input type="radio" name="preg32" value="F" /> 6<br />
                    <input type="radio" name="preg32" value="G" /> 7<br />
                    <input type="radio" name="preg32" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">33.- <br>
              <img src="../pagina/img/33.jpg" height="563" width="788" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg33" value="A" /> 1<br />
                    <input type="radio" name="preg33" value="B" /> 2<br />
                    <input type="radio" name="preg33" value="C" /> 3<br />
                    <input type="radio" name="preg33" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg33" value="E" /> 5<br />
                    <input type="radio" name="preg33" value="F" /> 6<br />
                    <input type="radio" name="preg33" value="G" /> 7<br />
                    <input type="radio" name="preg33" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">34.- <br>
              <img src="../pagina/img/34.jpg" height="563" width="788" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg34" value="A" /> 1<br />
                    <input type="radio" name="preg34" value="B" /> 2<br />
                    <input type="radio" name="preg34" value="C" /> 3<br />
                    <input type="radio" name="preg34" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg34" value="E" /> 5<br />
                    <input type="radio" name="preg34" value="F" /> 6<br />
                    <input type="radio" name="preg34" value="G" /> 7<br />
                    <input type="radio" name="preg34" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">35.- <br>
              <img src="../pagina/img/35.jpg" height="563" width="788" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg35" value="A" /> 1<br />
                    <input type="radio" name="preg35" value="B" /> 2<br />
                    <input type="radio" name="preg35" value="C" /> 3<br />
                    <input type="radio" name="preg35" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg35" value="E" /> 5<br />
                    <input type="radio" name="preg35" value="F" /> 6<br />
                    <input type="radio" name="preg35" value="G" /> 7<br />
                    <input type="radio" name="preg35" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">36.- <br>
              <img src="../pagina/img/36.jpg" height="563" width="788" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg36" value="A" /> 1<br />
                    <input type="radio" name="preg36" value="B" /> 2<br />
                    <input type="radio" name="preg36" value="C" /> 3<br />
                    <input type="radio" name="preg36" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg36" value="E" /> 5<br />
                    <input type="radio" name="preg36" value="F" /> 6<br />
                    <input type="radio" name="preg36" value="G" /> 7<br />
                    <input type="radio" name="preg36" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">37.- <br>
              <img src="../pagina/img/37.jpg" height="563" width="788" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg37" value="A" /> 1<br />
                    <input type="radio" name="preg37" value="B" /> 2<br />
                    <input type="radio" name="preg37" value="C" /> 3<br />
                    <input type="radio" name="preg37" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg37" value="E" /> 5<br />
                    <input type="radio" name="preg37" value="F" /> 6<br />
                    <input type="radio" name="preg37" value="G" /> 7<br />
                    <input type="radio" name="preg37" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">38.- <br>
              <img src="../pagina/img/38.jpg" height="563" width="788" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg38" value="A" /> 1<br />
                    <input type="radio" name="preg38" value="B" /> 2<br />
                    <input type="radio" name="preg38" value="C" /> 3<br />
                    <input type="radio" name="preg38" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg38" value="E" /> 5<br />
                    <input type="radio" name="preg38" value="F" /> 6<br />
                    <input type="radio" name="preg38" value="G" /> 7<br />
                    <input type="radio" name="preg38" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">39.- <br>
              <img src="../pagina/img/39.jpg" height="563" width="788" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg39" value="A" /> 1<br />
                    <input type="radio" name="preg39" value="B" /> 2<br />
                    <input type="radio" name="preg39" value="C" /> 3<br />
                    <input type="radio" name="preg39" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg39" value="E" /> 5<br />
                    <input type="radio" name="preg39" value="F" /> 6<br />
                    <input type="radio" name="preg39" value="G" /> 7<br />
                    <input type="radio" name="preg39" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">40.- <br>
              <img src="../pagina/img/40.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg40" value="A" /> 1<br />
                    <input type="radio" name="preg40" value="B" /> 2<br />
                    <input type="radio" name="preg40" value="C" /> 3<br />
                    <input type="radio" name="preg40" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg40" value="E" /> 5<br />
                    <input type="radio" name="preg40" value="F" /> 6<br />
                    <input type="radio" name="preg40" value="G" /> 7<br />
                    <input type="radio" name="preg40" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">41.- <br>
              <img src="../pagina/img/41.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg41" value="A" /> 1<br />
                    <input type="radio" name="preg41" value="B" /> 2<br />
                    <input type="radio" name="preg41" value="C" /> 3<br />
                    <input type="radio" name="preg41" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg41" value="E" /> 5<br />
                    <input type="radio" name="preg41" value="F" /> 6<br />
                    <input type="radio" name="preg41" value="G" /> 7<br />
                    <input type="radio" name="preg41" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">42.- <br>
              <img src="../pagina/img/42.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg42" value="A" /> 1<br />
                    <input type="radio" name="preg42" value="B" /> 2<br />
                    <input type="radio" name="preg42" value="C" /> 3<br />
                    <input type="radio" name="preg42" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg42" value="E" /> 5<br />
                    <input type="radio" name="preg42" value="F" /> 6<br />
                    <input type="radio" name="preg42" value="G" /> 7<br />
                    <input type="radio" name="preg42" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">43.- <br>
              <img src="../pagina/img/43.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg43" value="A" /> 1<br />
                    <input type="radio" name="preg43" value="B" /> 2<br />
                    <input type="radio" name="preg43" value="C" /> 3<br />
                    <input type="radio" name="preg43" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg43" value="E" /> 5<br />
                    <input type="radio" name="preg43" value="F" /> 6<br />
                    <input type="radio" name="preg43" value="G" /> 7<br />
                    <input type="radio" name="preg43" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">44.- <br>
              <img src="../pagina/img/44.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg44" value="A" /> 1<br />
                    <input type="radio" name="preg44" value="B" /> 2<br />
                    <input type="radio" name="preg44" value="C" /> 3<br />
                    <input type="radio" name="preg44" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg44" value="E" /> 5<br />
                    <input type="radio" name="preg44" value="F" /> 6<br />
                    <input type="radio" name="preg44" value="G" /> 7<br />
                    <input type="radio" name="preg44" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">45.- <br>
              <img src="../pagina/img/45.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg45" value="A" /> 1<br />
                    <input type="radio" name="preg45" value="B" /> 2<br />
                    <input type="radio" name="preg45" value="C" /> 3<br />
                    <input type="radio" name="preg45" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg45" value="E" /> 5<br />
                    <input type="radio" name="preg45" value="F" /> 6<br />
                    <input type="radio" name="preg45" value="G" /> 7<br />
                    <input type="radio" name="preg45" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">46.- <br>
              <img src="../pagina/img/46.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg46" value="A" /> 1<br />
                    <input type="radio" name="preg46" value="B" /> 2<br />
                    <input type="radio" name="preg46" value="C" /> 3<br />
                    <input type="radio" name="preg46" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg46" value="E" /> 5<br />
                    <input type="radio" name="preg46" value="F" /> 6<br />
                    <input type="radio" name="preg46" value="G" /> 7<br />
                    <input type="radio" name="preg46" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">47.- <br>
              <img src="../pagina/img/47.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg47" value="A" /> 1<br />
                    <input type="radio" name="preg47" value="B" /> 2<br />
                    <input type="radio" name="preg47" value="C" /> 3<br />
                    <input type="radio" name="preg47" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg47" value="E" /> 5<br />
                    <input type="radio" name="preg47" value="F" /> 6<br />
                    <input type="radio" name="preg47" value="G" /> 7<br />
                    <input type="radio" name="preg47" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">48.- <br>
              <img src="../pagina/img/48.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg48" value="A" /> 1<br />
                    <input type="radio" name="preg48" value="B" /> 2<br />
                    <input type="radio" name="preg48" value="C" /> 3<br />
                    <input type="radio" name="preg48" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg48" value="E" /> 5<br />
                    <input type="radio" name="preg48" value="F" /> 6<br />
                    <input type="radio" name="preg48" value="G" /> 7<br />
                    <input type="radio" name="preg48" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">49.- <br>
              <img src="../pagina/img/49.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg49" value="A" /> 1<br />
                    <input type="radio" name="preg49" value="B" /> 2<br />
                    <input type="radio" name="preg49" value="C" /> 3<br />
                    <input type="radio" name="preg49" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg49" value="E" /> 5<br />
                    <input type="radio" name="preg49" value="F" /> 6<br />
                    <input type="radio" name="preg49" value="G" /> 7<br />
                    <input type="radio" name="preg49" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">50.- <br>
              <img src="../pagina/img/50.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg50" value="A" /> 1<br />
                    <input type="radio" name="preg50" value="B" /> 2<br />
                    <input type="radio" name="preg50" value="C" /> 3<br />
                    <input type="radio" name="preg50" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg50" value="E" /> 5<br />
                    <input type="radio" name="preg50" value="F" /> 6<br />
                    <input type="radio" name="preg50" value="G" /> 7<br />
                    <input type="radio" name="preg50" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">51.- <br>
              <img src="../pagina/img/51.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg51" value="A" /> 1<br />
                    <input type="radio" name="preg51" value="B" /> 2<br />
                    <input type="radio" name="preg51" value="C" /> 3<br />
                    <input type="radio" name="preg51" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg51" value="E" /> 5<br />
                    <input type="radio" name="preg51" value="F" /> 6<br />
                    <input type="radio" name="preg51" value="G" /> 7<br />
                    <input type="radio" name="preg51" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">52.- <br>
              <img src="../pagina/img/52.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg52" value="A" /> 1<br />
                    <input type="radio" name="preg52" value="B" /> 2<br />
                    <input type="radio" name="preg52" value="C" /> 3<br />
                    <input type="radio" name="preg52" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg52" value="E" /> 5<br />
                    <input type="radio" name="preg52" value="F" /> 6<br />
                    <input type="radio" name="preg52" value="G" /> 7<br />
                    <input type="radio" name="preg52" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">53.- <br>
              <img src="../pagina/img/53.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg53" value="A" /> 1<br />
                    <input type="radio" name="preg53" value="B" /> 2<br />
                    <input type="radio" name="preg53" value="C" /> 3<br />
                    <input type="radio" name="preg53" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg53" value="E" /> 5<br />
                    <input type="radio" name="preg53" value="F" /> 6<br />
                    <input type="radio" name="preg53" value="G" /> 7<br />
                    <input type="radio" name="preg53" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">54.- <br>
              <img src="../pagina/img/54.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg54" value="A" /> 1<br />
                    <input type="radio" name="preg54" value="B" /> 2<br />
                    <input type="radio" name="preg54" value="C" /> 3<br />
                    <input type="radio" name="preg54" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg54" value="E" /> 5<br />
                    <input type="radio" name="preg54" value="F" /> 6<br />
                    <input type="radio" name="preg54" value="G" /> 7<br />
                    <input type="radio" name="preg54" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">55.- <br>
              <img src="../pagina/img/55.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg55" value="A" /> 1<br />
                    <input type="radio" name="preg55" value="B" /> 2<br />
                    <input type="radio" name="preg55" value="C" /> 3<br />
                    <input type="radio" name="preg55" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg55" value="E" /> 5<br />
                    <input type="radio" name="preg55" value="F" /> 6<br />
                    <input type="radio" name="preg55" value="G" /> 7<br />
                    <input type="radio" name="preg55" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">56.- <br>
              <img src="../pagina/img/56.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg56" value="A" /> 1<br />
                    <input type="radio" name="preg56" value="B" /> 2<br />
                    <input type="radio" name="preg56" value="C" /> 3<br />
                    <input type="radio" name="preg56" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg56" value="E" /> 5<br />
                    <input type="radio" name="preg56" value="F" /> 6<br />
                    <input type="radio" name="preg56" value="G" /> 7<br />
                    <input type="radio" name="preg56" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">57.- <br>
              <img src="../pagina/img/57.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg57" value="A" /> 1<br />
                    <input type="radio" name="preg57" value="B" /> 2<br />
                    <input type="radio" name="preg57" value="C" /> 3<br />
                    <input type="radio" name="preg57" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg57" value="E" /> 5<br />
                    <input type="radio" name="preg57" value="F" /> 6<br />
                    <input type="radio" name="preg57" value="G" /> 7<br />
                    <input type="radio" name="preg57" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">58.- <br>
              <img src="../pagina/img/58.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg58" value="A" /> 1<br />
                    <input type="radio" name="preg58" value="B" /> 2<br />
                    <input type="radio" name="preg58" value="C" /> 3<br />
                    <input type="radio" name="preg58" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg58" value="E" /> 5<br />
                    <input type="radio" name="preg58" value="F" /> 6<br />
                    <input type="radio" name="preg58" value="G" /> 7<br />
                    <input type="radio" name="preg58" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">59.- <br>
              <img src="../pagina/img/59.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg59" value="A" /> 1<br />
                    <input type="radio" name="preg59" value="B" /> 2<br />
                    <input type="radio" name="preg59" value="C" /> 3<br />
                    <input type="radio" name="preg59" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg59" value="E" /> 5<br />
                    <input type="radio" name="preg59" value="F" /> 6<br />
                    <input type="radio" name="preg59" value="G" /> 7<br />
                    <input type="radio" name="preg59" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">60.- <br>
              <img src="../pagina/img/60.png" />
            </div>
            <div>
              <br>
              <div class="container text-left">
                <div class="row align-items-left">
                  <div class="col">
                    <input type="radio" name="preg60" value="A" /> 1<br />
                    <input type="radio" name="preg60" value="B" /> 2<br />
                    <input type="radio" name="preg60" value="C" /> 3<br />
                    <input type="radio" name="preg60" value="D" /> 4<br />
                  </div>
                  <div class="col">
                    <input type="radio" name="preg60" value="E" /> 5<br />
                    <input type="radio" name="preg60" value="F" /> 6<br />
                    <input type="radio" name="preg60" value="G" /> 7<br />
                    <input type="radio" name="preg60" value="H" /> 8<br />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div align="center"><br>
            <input class="btn btn-primary" name="btnfinalizar" type="submit" value="FINALIZAR TEST">
          </div>
        </div>
      </form>
    </div>
    
    {*Conexion de librerias de JavaScript y bootstrap*}                
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="../smarty/js/contador-raven.js"></script>
  </body>

</html>