<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test de SJT</title>
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../proyecto-web/assets/css/theme-1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
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

    {*Card del test de SJT*}
    <div class="card border-primary shadow p-3 mb-5 bg-body rounded" style="max-width: 60rem; margin:auto; margin-top:30px;">
      <div class="card-header text-center">
        <h4 class="card-title">TEST SJT</h4>
      </div>
      <center>
        <div class="card-body">
          <h5 style="color: #20c997;">Tiempo limite: <p class="tiempo" id="minuto" style="display: inline;"></p>
            <p style="display: inline;" class="tiempo"> : </p>
            <p class="tiempo" style="display: inline;" id="contador"></p>
          </h5><br>
          </table><br>
          <p><b>INSTRUCCIONES:</b> Para cada uno de los problemas siguientes, se sugieren tres
            respuestas. Marque en la hoja de respuestas con una cruz el espacio que corresponda a
            la solución que usted considere más acertada. No marque más de una.</p>
        </div>
      </center>
      {*Formulario del test de SJT*}
      <form action="test_sjt.php" method="POST">
        <div align="left">
          <div class="pregresp">
            <div class="pregunta">
              1.-La entidad donde usted trabaja está interesada en realizar cambios en los sistemas de comunicación
              interna.
              Para esto, adquiere un aplicativo electrónico que permite enviar mensajes entre funcionarios,
              programar videollamadas y hacer grupos entre los compañeros de trabajo.
              El proveedor indica que el software tiene muchas más funcionalidades y que en la medida en que se presenten
              necesidades de comunicación,
              se pueden ir explorando las diferentes herramientas disponibles. Su superior inmediato le informa que le ha
              asignado tareas a través del aplicativo,
              sin que a la fecha usted las haya realizado.
              <br><br>
            </div>
            <div class="pregunta">
              Frente a la observación de su superior y para evitar que esto vuelva a ocurrir, usted:
            </div>
            <br><br>


            <div>
              <input type="radio" name="preg1" value="A" /> A. Coloca la queja ante las directivas, ya que la utilidad del
              aplicativo no es su
              responsabilidad.
              <br />
              <input type="radio" name="preg1" value="B" /> B. Le atribuye la responsabilidad de esta situación a la falta
              de capacitación por
              parte del proveedor.
              <br />
              <input type="radio" name="preg1" value="C" />C. Explora las utilidades del aplicativo hasta cuando descubre
              cómo debe ver y
              responder los memos.
              <br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">2.-Durante su hora de almuerzo en la cafetería, un compañero de trabajo que está
              atragantado,
              y tosiendo intensamente, pide su ayuda. A los dos minutos de estar atendiendo la situación usted se percata
              que su compañero
              expulsa por la boca un hueso pequeño. Durante la situación le asiste y posteriormente le explica qué pudo
              haber pasado en caso
              de no lograr una expulsión a tiempo.<br><br>
            </div>
            <div class="pregunta">En la asistencia que brinda a su compañero, usted decide:<br><br>
            </div>

            <div>
              <input type="radio" name="preg2" value="A" /> A. Acostarlo y realizarle una serie de compresiones
              torácicas.<br />
              <input type="radio" name="preg2" value="B" /> B. Ponerlo de pie y animarlo a que continúe tosiendo.<br />
              <input type="radio" name="preg2" value="C" /> C. Iniciarle masaje toráxico y activar cadena de
              socorro.<br />
            </div>

          </div>
          <div class="pregresp">
            <div class="pregunta">3.-En la oficina donde usted trabaja se ve obligado a compartir el espacio en donde
              desarrolla
              sus labores cotidianas con el resto de sus compañeros. Los puestos son abiertos y no cuentan con
              separaciones,
              por lo que todos se ven y tienen que compartir la mesa de trabajo, el teléfono,
              la fotocopiadora y el baño. Esta situación ha generado dificultades en el clima laboral y conflictos
              ocasionados por
              las diferencias en los hábitos de trabajo. Uno de sus compañeros escucha música a alto volumen mientras
              labora,
              recibe llamadas personales y las responde con gritos, y adicionalmente deja basura en el piso y en los
              alrededores de su puesto de trabajo.
              Sus compañeros lo designan a usted para retroalimentar la situación e informar a su compañero sobre la
              molestia que provoca su proceder.<br><br>
            </div>
            <div class="pregunta">Cuando se dispone a hablar con su compañero e informarle acerca de la molestia que está
              percibiendo todo el equipo de trabajo, usted:<br><br>
            </div>
            <div>
              <input type="radio" name="preg3" value="A" />A. Le comenta cómo es percibido en la oficina y le invita a
              pensar cómo actuaría frente a circunstancias similares.<br />
              <input type="radio" name="preg3" value="B" />B. Se muestra molesto y justifica su sentir afirmando que su
              conducta evidencia falta de respeto y displicencia.<br />
              <input type="radio" name="preg3" value="C" />C. Le informa que va a pasar un reporte de su conducta y que lo
              enviará a todas las personas y entes competentes.<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">4.-En la entidad en la que usted labora, se está llevando a cabo la unificación de
              criterios de la imagen institucional en cuanto a documentos y presentaciones. Por lo anterior, su superior
              inmediato le envía un correo electrónico en el que le solicita lo siguiente:
              En aras de llevar a buen término la unificación de criterios frente a la imagen institucional, es
              fundamental que trabaje juntamente con los diseñadores gráficos para definir la imagen, logo y colores
              institucionales para las piezas gráficas. Sin otro particular, El jefe.
              <br><br>
            </div>
            <div class="pregunta">
              En el texto del correo, el término "aras" se refiere:
            </div>
            <div>
              <input type="radio" name="preg4" value="A" />A. al interés de alcanzar el objetivo propuesto.<br />
              <input type="radio" name="preg4" value="B" /> B. a la obligación de llevar a cabo el objetivo.<br />
              <input type="radio" name="preg4" value="C" />C. a determinar cómo lograr el objetivo.<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">5.-En la entidad en la cual usted trabaja se allega la solicitud de una comunidad
              indígena pidiendo que construya un centro médico en la zona donde habita, dado que se encuentra afectada por
              la carencia absoluta en la prestación del servicio público de salud. <br><br>
            </div>

            <div class="pregunta">Para determinar la viabilidad legal de la solicitud, usted manifiesta al director de la
              entidad que: <br><br>
            </div>
            <div>
              <input type="radio" name="preg5" value="A" /> A. es posible materializar el requerimiento a través del
              principio de la separación de los poderes públicos.<br />
              <input type="radio" name="preg5" value="B" /> B. es factible atender la necesidad aplicando el principio de
              la distinción entre Estado unitario y Estado federal.<br />
              <input type="radio" name="preg5" value="C" /> C. la petición puede ser suplida con base en el principio de
              la centralización política y descentralización administrativa.<br />

            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">6.-En su dependencia le están solicitando que haga firmar a cada uno de los
              coordinadores de las áreas involucradas el informe ejecutivo de un proyecto ejecutado en la entidad. Usted
              inicia por la firma del coordinador del área de contabilidad; sin embargo, él le dice que sólo firmará el
              documento una vez lo haga el coordinador del área jurídica, quien en ese momento está ausente y quien, a su
              vez, dejó la razón de que lo firmaría siempre y cuando estuviera firmado por la persona responsable del
              proyecto.<br><br>
            </div>
            <div class="pregunta">Teniendo en cuenta la condición impuesta por el coordinador del área de contabilidad,
              usted:<br><br>
            </div>
            <div>
              <input type="radio" name="preg6" value="A" />A. solicita la firma al responsable del proyecto, por cuanto es
              un funcionario distinto al coordinador del área de contabilidad.<br />
              <input type="radio" name="preg6" value="B" />B. espera a que el coordinador del área jurídica regrese a la
              entidad, para luego continuar con la recolección de las demás firmas.<br />
              <input type="radio" name="preg6" value="C" />C. informa a su jefe la dificultad de la tarea, porque
              comprende que en el proyecto están involucradas sólo esas dos áreas.<br />

            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">7.-Con el objetivo de valorar la percepción del servicio de la entidad, usted debe
              realizar actividades conjuntas que mejoren el índice de percepción de calidad en el servicio prestado por su
              entidad. La primera propuesta de distribución de actividades genera incomodidad en algunos compañeros,
              porque les implica trabajar en forma grupal más que individual, y expresan que se sienten más cómodos
              haciendo las cosas de manera independiente.<br><br>
            </div>
            <div class="pregunta">A usted le delegan realizar una nueva distribución de actividades y pese a que acepta el
              reto, le genera susto porque dicha labor le corresponde a otro compañero, por lo cual usted decide:<br><br>
            </div>
            <div>
              <input type="radio" name="preg7" value="A" />A. persuadir a su compañero con el que tiene más confianza para
              que realice la labor por usted.<br />
              <input type="radio" name="preg7" value="B" />B. asignar actividades teniendo en cuenta los gustos personales
              de cada uno de los compañeros.<br />
              <input type="radio" name="preg7" value="C" />C. solicitar a los compañeros ideas y propuestas para concertar
              las actividades a realizar.<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">8.-En el área en la que usted labora, se ha identificado que las personas nuevas tardan
              mucho tiempo en adaptarse a los diferentes procesos y temas que internamente allí se trabajan. En muchas
              ocasiones, se han llegado a cometer errores por desconocimiento de los protocolos y procedimientos. Esa
              situación ha venido afectando las metas propuestas para dicha área.<br><br>
            </div>
            <div class="pregunta">Ante la situación de que los funcionarios nuevos presentan mayores inconvenientes con el
              sistema de información del área, usted opta por:<br><br>
            </div>
            <div>
              <input type="radio" name="preg8" value="A" /> A. entregar todos los manuales de uso, y esperar que haya una
              reunión dónde se planteen las posibles dudas de los funcionarios nuevos.<br />
              <input type="radio" name="preg8" value="B" /> B. compartir la presentación del proceso en cuestión e indicar
              que estudien los aspectos más complejos relacionados con su uso.<br />
              <input type="radio" name="preg8" value="C" /> C. integrarse con sus nuevos compañeros para comprender de
              mejor manera la forma de hacer más eficiente su labor.<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">9.-Luego de realizarse una auditoría interna al área de Talento Humano de la entidad en
              la que usted labora, se encontró que en algunas historias laborales hay documentos deteriorados- Usted como
              encargado del archivo, se encuentra preocupado con esta situación, dado que próximamente se realizará una
              auditoría externa. <br><br>
            </div>
            <div class="pregunta">El plan de mejoramiento que usted propone sobre el estado de los documentos de las
              historias laborales debe contemplar: <br><br>
            </div>
            <div>
              <input type="radio" name="preg9" value="A" /> A. eliminar los documentos que están deteriorados y foliar
              nuevamente toda la carpeta.<br />
              <input type="radio" name="preg9" value="B" /> B. realizar una copia de los deteriorados y realizar un
              proceso de transferencia de información.<br />
              <input type="radio" name="preg9" value="C" /> C. separar los documentos deteriorados y de buen uso,
              generando carpetas para cada grupo.<br />

            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">10.- La entidad en la que usted labora se encuentra implementando un proceso de
              reestructuración administrativa, por lo que se ha decidido modificar la naturaleza de algunos empleos
              pasando de carrera administrativa a libre nombramiento y remoción. Ante esta decisión, algunos funcionarios
              que desempeñan sus labores en los cargos en cuestión manifiestan su preocupación dado que ellos gozan de
              derechos de carrera.<br><br>
            </div>
            <div class="pregunta">Para salvaguardar los derechos de los funcionarios y aclarar su confusión, usted les
              debe indicar que:<br><br>
            </div>
            <div>
              <input type="radio" name="preg10" value="A" /> A. identificarán los funcionarios que puedan ser trasladados
              a cargos de carrera con funciones afines, sin que se disminuya su remuneración económica.<br />
              <input type="radio" name="preg10" value="B" /> B. trasladarán los funcionarios a cargos de carrera con
              funciones diferentes, garantizando las respectivas recategorizaciones de los niveles jerárquicos.<br />
              <input type="radio" name="preg10" value="C" /> C. propondrá a la entidad que los empleos de carrera que
              fueron declarados como de libre nombramiento y remoción, sean eliminados de la planta de para evitar
              consecuencias legales para los funcionarios.<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">11.-En la entidad territorial para la cual usted trabaja se elaboró un análisis del
              sector salud, en el cual se encontraron barreras para acceder a la atención en salud, identificando que el
              40 % de la población presenta morbilidad sentida y no han recibido atención en el último año; por lo tanto,
              se decide diseñar e implementar estrategias y con el fin de garantizar salud para todos. Usted debe asesorar
              la formulación de la estrategia y plasmarla en el modelo de atención.<br><br>
            </div>
            <div class="pregunta">Para orientar la estrategia en el modelo de atención, usted debe:<br><br>
            </div>
            <div>
              <input type="radio" name="preg11" value="A" /> A. verificar que se garantice la salud desde la prevención y
              promoción hasta el tratamiento y rehabilitación.<br />
              <input type="radio" name="preg11" value="B" /> B. desarrollar los programas, las actividades y metas para el
              tratamiento de las patologías sin resolver.<br />
              <input type="radio" name="preg11" value="C" /> C. suministrar los recursos necesarios y asegurar la atención
              de las actividades de diagnóstico.<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">12.-En la entidad territorial en la cual usted labora como Asesor se observa que ha
              aumentado el número de casos, especialmente en menores de edad, por afectaciones de salud, relacionados con
              la indebida disposición de residuos en la localidad. Los líderes de la le piden a la entidad solucionar de
              raíz esta problemática. Su jefe le encarga atender esta situación proponiendo alternativas de
              solución.<br><br>
            </div>
            <div class="pregunta">Para proponer una alternativa de solución efectiva a esta problemática, usted debería
              tener en cuenta:<br><br>
            </div>
            <div>
              <input type="radio" name="preg12" value="A" /> A. La información disponible sobre políticas públicas para el
              manejo de residuos en las entidades territoriales.<br />
              <input type="radio" name="preg12" value="B" /> B. Los protocolos de la Secretaría Local de Salud para
              atender los casos de salud por contaminación con residuos.<br />
              <input type="radio" name="preg12" value="C" /> C. Los efectos en la calidad de vida de la población que la
              contaminación ambiental generada por esa indebida disposición de residuos genera.<br />
            </div>
          </div>
        </div>
        <div align="center"><br>
          <input class="btn btn-primary" name="btnfinalizar" id="btnfinalizar" type="submit" value="FINALIZAR TEST">
        </div>
      </form>
    </div>

    {*Conexion de librerias de JavaScript y bootstrap*}                
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="../smarty/js/contador-sjt.js"></script>
  </body>
</html>