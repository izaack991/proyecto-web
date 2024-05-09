<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test de moss</title>
    <link id="theme-style" rel="stylesheet" href="../../assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../../assets/css/theme-1.css">
    <link rel="icon" href="../../assets/images/WorkeleWB.ico" type="image/x-icon">
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

    {*Card del test de MOSS*}
    <div class="card border-primary shadow p-3 mb-5 bg-body rounded" style="max-width: 60rem; margin:auto; margin-top:30px;">
      <div class="card-header text-center">
        <h4 class="card-title">TEST DE MOSS</h4>
      </div>
      <center>
        <div class="card-body">
          <h5 style="color: #20c997;">Tiempo limite: <p class="tiempo" id="minuto" style="display: inline;"></p>
            <p style="display: inline;" class="tiempo"> : </p>
            <p class="tiempo" style="display: inline;" id="contador"></p>
          </h5><br>
          <p><b>INSTRUCCIONES:</b> Para cada uno de los problemas siguientes, se sugieren cuatro
            respuestas. Marque en la hoja de respuestas con una cruz el espacio que corresponda a
            la solución que usted considere más acertada. No marque más de una.</p>
        </div>
      </center>

      {*Formulario del test de MOSS*}
      <form action="test_moss.php" method="POST">
        <div align="left">
          <div class="pregresp">
            <div class="pregunta">1.- Se le ha asignado un puesto en una gran empresa. La mejor forma de establecer
              relaciones amistosas y cordiales con sus nuevos compañeros será:<br><br>
            </div>
            <div>
              <input type="radio" name="preg1" id="preg1" value="A" /> Evitando tomar nota de los errores en que
              incurran<br />
              <input type="radio" name="preg1" id="preg1" value="B" /> Hablando bien de ellos al jefe<br />
              <input type="radio" name="preg1" id="preg1" value="C" /> Mostrando interés en el trabajo de ellos<br />
              <input type="radio" name="preg1" id="preg1" value="D" /> Pidiendoles les permitan hacer los trabajos que
              usted
              puede hacer mejor<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">2.- Tiene usted un empleado muy eficiente pero que constantemente se queja del
              trabajo, sus quejas producen mal efecto en los demás empleados, lo mejor sería:<br><br>
            </div>
            <div>
              <input type="radio" name="preg2" id="preg2" value="A" /> Pedir a los demás empleados que no hagan caso<br />
              <input type="radio" name="preg2" id="preg2" value="B" /> Averiguar la causa de esa actitud y procurar su
              modificación<br />
              <input type="radio" name="preg2" id="preg2" value="C" /> Cambiarlo de departamento donde quede a cargo de
              otro
              jefe<br />
              <input type="radio" name="preg2" id="preg2" value="D" /> Permitirle planear lo más posible acerca de su
              trabajo<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">3.- Un empleado de 60 años de edad que ha sido leal a la empresa durante 25 años se
              queja del exceso de trabajo. Lo mejor sería:<br><br>
            </div>
            <div>
              <input type="radio" name="preg3" value="A" /> Decirle que vuelva a su trabajo porque si no será
              despedido<br />
              <input type="radio" name="preg3" value="B" /> Despedirlo, substituyendolo por alguien más
              joven<br />
              <input type="radio" name="preg3" value="C" /> Darle un aumento de sueldo que evite que continúe
              quejandose<br />
              <input type="radio" name="preg3" value="D" /> Aminorar su trabajo<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">4.- Uno de los socios, sin autoridad sobre usted le ordena haga algo en forma bien
              distinta de lo que planeaba. ¿Qué haría usted?<br><br>
            </div>
            <div>
              <input type="radio" name="preg4" value="A" /> Acatar la orden y no armar mayor revuelo<br />
              <input type="radio" name="preg4" value="B" /> Ignorar las indicaciones y hacerlo según había
              planeado<br />
              <input type="radio" name="preg4" value="C" /> Decirle que esto no es asunto que a usted le interesa
              y que usted hará las cosas a
              su modo<br />
              <input type="radio" name="preg4" value="D" /> Decirle que lo haga él mismo<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">5.- Usted visita a un amigo íntimo que ha estado enfermo por algún tiempo. Lo mejor
              sería:<br><br>
            </div>
            <div>
              <input type="radio" name="preg5" value="A" /> Platicarle sus diversiones recientes<br />
              <input type="radio" name="preg5" value="B" /> Platicarle nuevas cosas referentes a sus amigos
              mutuos<br />
              <input type="radio" name="preg5" value="C" /> Comentar su enfermedad<br />
              <input type="radio" name="preg5" value="D" /> Enfatizar lo mucho que le apena verle enfermo<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">6.- Trabaja usted en una industria y su jefe quiere que tome un curso relacionado con su
              carrera pero que sea compatible con el horario de su trabajo. Lo mejor sería:<br><br>
            </div>
            <div>
              <input type="radio" name="preg6" value="A" /> Continuar normalmente su carrera e informar al jefe
              sí pregunta<br />
              <input type="radio" name="preg6" value="B" /> Explicar la situación u obtener su opinión en cuanto
              a la importancia relativa de
              ambas situaciones<br />
              <input type="radio" name="preg6" value="C" /> Dejar la escuela en relación a los intereses del
              trabajo<br />
              <input type="radio" name="preg6" value="D" /> Asistir en forma alterna y no hacer comentarios<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">7.- Un agente viajero con 15 años de antigüedad decide, presionado por su familia
              sentar raíces. Se le cambia a las oficinas generales. Es de esperar que:<br><br>
            </div>
            <div>
              <input type="radio" name="preg7" value="A" /> Guste de los descansos del trabajo de oficina<br />
              <input type="radio" name="preg7" value="B" /> Se sienta inquieto por la rutina de la oficina<br />
              <input type="radio" name="preg7" value="C" /> Busque otro trabajo<br />
              <input type="radio" name="preg7" value="D" /> Resulte muy ineficiente en el trabajo de
              oficina<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">8.- Tiene dos invitados a cenar, el uno radical y el otro conservador. Surge una
              acalorada discusión respecto a la política. Lo mejor sería:<br><br>
            </div>
            <div>
              <input type="radio" name="preg8" value="A" /> Tomar partido<br />
              <input type="radio" name="preg8" value="B" /> Intentar cambiar de tema<br />
              <input type="radio" name="preg8" value="C" /> Intervenir dando los propios puntos de vista y
              mostrar donde ambos pecan de
              extremosos<br />
              <input type="radio" name="preg8" value="D" /> Pedir cambien de tema para evitar mayor
              discusión<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">9.- Un joven invita a una dama al teatro, al llegar se percata de que ha olvidado la
              cartera. Sería mejor:<br><br>
            </div>
            <div>
              <input type="radio" name="preg9" value="A" /> Tratar de obtener boletos dejando el reloj en
              prenda<br />
              <input type="radio" name="preg9" value="B" /> Buscar a algún amigo a quien pedir prestado<br />
              <input type="radio" name="preg9" value="C" /> Decidir de acuerdo con ella lo procedente<br />
              <input type="radio" name="preg9" value="D" /> Dar una excusa plausible para ir a casa por
              dinero<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">10.- Usted ha tenido experiencia como vendedor y acaba de conseguir de una tienda un
              empleo. La mejor forma de relacionarse con los empleados del departamento seria.<br><br>
            </div>
            <div>
              <input type="radio" name="preg10" value="A" /> Permitirle hacer la mayoría de las ventas por unos
              días en tanto observa sus
              métodos<br />
              <input type="radio" name="preg10" value="B" /> Tratar de instituir los métodos que anteriormente le
              fueron útiles<br />
              <input type="radio" name="preg10" value="C" /> Adaptarse mejor a las condiciones y aceptar consejos
              de sus compañeros<br />
              <input type="radio" name="preg10" value="D" /> Pedir al jefe todo el consejo necesario<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">11.- Es usted un joven empleado que va a comer con una maestra a quien conoce
              superficialmente. Lo mejor sería iniciar la conversación acerca de:<br><br>
            </div>
            <div>
              <input type="radio" name="preg11" value="A" /> Algún tópico de actualidad<br />
              <input type="radio" name="preg11" value="B" /> Algún aspecto interesante de su propio trabajo<br />
              <input type="radio" name="preg11" value="C" /> Las tendencias actuales en el terreno docente<br />
              <input type="radio" name="preg11" value="D" /> Las sociedades de padres de familia<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">12.- Una señora de especiales méritos que por largo tiempo ha dirigido trabajos
              benéficos dejando las labores de su casa a cargo de la servidumbre, se cambia a otra
              población. Es de esperarse que ella:<br><br>
            </div>
            <div>
              <input type="radio" name="preg12" value="A" /> Se sienta insatisfecha de su nuevo hogar<br />
              <input type="radio" name="preg12" value="B" /> Se interese más por los trabajos domésticos<br />
              <input type="radio" name="preg12" value="C" /> Intervenga poco a poco en la vida de la comunidad,
              continuando así sus intereses<br />
              <input type="radio" name="preg12" value="D" /> Adopte nuevos intereses en la nueva comunidad<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">13.- Quiere pedirle un favor a un conocido con quien tiene poca confianza. La mejor
              forma de lograrlo sería:<br><br>
            </div>
            <div>
              <input type="radio" name="preg13" value="A" /> Haciendole creer que será él quien se beneficie
              más<br />
              <input type="radio" name="preg13" value="B" /> Enfatice la importancia que para usted tiene que se
              le conceda<br />
              <input type="radio" name="preg13" value="C" /> Ofrecer algo de retribución<br />
              <input type="radio" name="preg13" value="D" /> Decir que lo que desea en forma breve indicando los
              motivos<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">14.- Un joven de 24 años gasta bastante tiempo y dinero en diversiones, solo ha hecho
              ver que así no logrará al éxito en el trabajo. Probablemente cambie sus costumbres. Si:<br><br>
            </div>
            <div>
              <input type="radio" name="preg14" value="A" /> Sus hábitos nocturnos lesionan su salud<br />
              <input type="radio" name="preg14" value="B" /> Sus amigos enfatizan el daño que se hace a sí
              mismo<br />
              <input type="radio" name="preg14" value="C" /> Su jefe se da cuenta y lo previene<br />
              <input type="radio" name="preg14" value="D" /> Se interesa en el desarrollo de alguna fase de su
              trabajo<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">15.- Tras de haber hecho un buen número de favores a un amigo, este empieza a dar por
              hecho que usted será quien le resuelva todas sus pequeñas dificultades. La mejor
              forma de readaptar la situación sin ofenderle sería:<br><br>
            </div>
            <div>
              <input type="radio" name="preg15" value="A" /> Explicar el daño que se está causando<br />
              <input type="radio" name="preg15" value="B" /> Pedir a un amigo mutuo que trate de arreglar las
              cosas<br />
              <input type="radio" name="preg15" value="C" /> Ayudarle una vez más pero de tal manera que sienta
              que mejor hubiera sido no
              haberlo solicitado<br />
              <input type="radio" name="preg15" value="D" /> Darle una excusa para no seguir ayudandole<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">16.- Una persona recién ascendida a un mejor puesto de autoridad lograría mejor sus
              metas y la buena voluntad de los empleados:<br><br>
            </div>
            <div>
              <input type="radio" name="preg16" value="A" /> Tratando de que cada empleado entienda qué es la
              verdadera eficiencia<br />
              <input type="radio" name="preg16" value="B" /> Ascendiendo cuanto antes a quienes considere lo
              merezcan<br />
              <input type="radio" name="preg16" value="C" /> Preguntando confidencialmente a cada empleado en
              cuanto a los cambios que
              estiman necesarios<br />
              <input type="radio" name="preg16" value="D" /> Seguir los sistemas del anterior jefe y gradualmente
              hacer los cambios necesarios<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">17.- Vive a 15 km. del centro y ha ofrecido llevar de regreso a un amigo a las 16:00
              p.m. él lo espera desde las 15:00 y a las 16:00 horas usted se entera que no podrá salir
              antes de las 17:30, sería mejor:<br><br>
            </div>
            <div>
              <input type="radio" name="preg17" value="A" /> Pedirle un taxi<br />
              <input type="radio" name="preg17" value="B" /> Explicarle y dejar que él decida<br />
              <input type="radio" name="preg17" value="C" /> Pedirle que espere hasta las 17:30 horas<br />
              <input type="radio" name="preg17" value="D" /> Proponerle que se lleve su auto<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">18.- Es usted un ejecutivo y dos de sus empleados se llevan mal, ambos son eficientes.
              Lo mejor sería:<br><br>
            </div>
            <div>
              <input type="radio" name="preg18" value="A" /> Despedir al menos eficiente<br />
              <input type="radio" name="preg18" value="B" /> Dar trabajo en común que a ambos interese<br />
              <input type="radio" name="preg18" value="C" /> Hacerles ver el daño que se hacen<br />
              <input type="radio" name="preg18" value="D" /> Darles trabajos distintos<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">19.- El señor González ha estado conservando su puesto subordinado por 10 años,
              desempeña su trabajo callado y confidencialmente y se le extrañará cuando se
              vaya. De obtener el trabajo en otra empresa, muy probablemente:<br><br>
            </div>
            <div>
              <input type="radio" name="preg19" value="A" /> Asuma fácilmente responsabilidad como
              supervisor<br />
              <input type="radio" name="preg19" value="B" /> Haga ver de inmediato su valor<br />
              <input type="radio" name="preg19" value="C" /> Sea lento para abrirse las necesarias
              oportunidades<br />
              <input type="radio" name="preg19" value="D" /> Renuncie ante la más ligera crítica de su
              trabajo<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">20.- Va usted a ser maestro de ceremonias, en una cena el próximo sábado día en que
              por la mañana, debido a enfermedad de su familia, se ve imposibilitado para asistir lo
              mejor sería:<br><br>
            </div>
            <div>
              <input type="radio" name="preg20" value="A" /> Cancelar la cena<br />
              <input type="radio" name="preg20" value="B" /> Encontrar quien lo sustituya<br />
              <input type="radio" name="preg20" value="C" /> Detallar los planes que tenía y evitarlos<br />
              <input type="radio" name="preg20" value="D" /> Enviar una nota explicando la causa de su
              ausencia<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">21.- En igualdad de circunstancias el empleado que mejor se adapta a un nuevo puesto
              es aquel que:<br><br>
            </div>
            <div>
              <input type="radio" name="preg21" value="A" /> Ha sido bueno en puestos anteriores<br />
              <input type="radio" name="preg21" value="B" /> Ha tenido éxito durante 10 años en su puesto<br />
              <input type="radio" name="preg21" value="C" /> Tiene sus propias ideas e invariablemente se rige
              por ellas<br />
              <input type="radio" name="preg21" value="D" /> Cuenta con una buena recomendación de su jefe
              anterior<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">22.- Un conocido le platica acerca de una afición que él tiene, su conversación le
              aburre.
              Lo mejor sería:<br><br>
            </div>
            <div>
              <input type="radio" name="preg22" value="A" /> Escuchar de manera cortés, pero aburrida<br />
              <input type="radio" name="preg22" value="B" /> Escuchar con fingido interés<br />
              <input type="radio" name="preg22" value="C" /> Decirle francamente que el tema no le interesa<br />
              <input type="radio" name="preg22" value="D" /> Mirar el reloj con impaciencia<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">23.- Es usted un empleado ordinario en una oficina grande. El jefe entra cuando usted
              lee en vez de trabajar. Lo mejor sería:<br><br>
            </div>
            <div>
              <input type="radio" name="preg23" value="A" /> Doblar el periódico y volver a trabajo<br />
              <input type="radio" name="preg23" value="B" /> Pretender que obtiene recortes necesarios al
              trabajo<br />
              <input type="radio" name="preg23" value="C" /> Tratar de interesar al jefe leyèndole un encabezado
              importante<br />
              <input type="radio" name="preg23" value="D" /> Seguir leyendo sin mostrar embarazo<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">24.- Es usted un maestro de primaria. Camino a la escuela tras de la primera nevada,
              algunos de sus alumnos lanzan bolas de nieve. Desde el punto de vista de la buena
              administración de la escolar, usted debería:<br><br>
            </div>
            <div>
              <input type="radio" name="preg24" value="A" /> Castigarle ahí mismo por su indisciplina<br />
              <input type="radio" name="preg24" value="B" /> Decirles que de volverlo a hacer los castigará<br />
              <input type="radio" name="preg24" value="C" /> Pasar la queja a sus padres<br />
              <input type="radio" name="preg24" value="D" /> Tomarlo como broma y no hacer caso al respecto<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">25.- Preside el Comité de Mejoras Materiales en su colonia; las últimas reuniones han
              sido de escasa asistencia. Se mejoraría la asistencia:<br><br>
            </div>
            <div>
              <input type="radio" name="preg25" value="A" /> Visitando vecinos prominentes explicandoles los
              problemas<br />
              <input type="radio" name="preg25" value="B" /> Avisar de un programa interesante para la
              reunión<br />
              <input type="radio" name="preg25" value="C" /> Poner avisos en los lugares públicos<br />
              <input type="radio" name="preg25" value="D" /> Enviar avisos personales<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">26.- Zaldìvar, eficiente, pero de esos que “todo lo saben”, critica a Montoya, el jefe
              opina que la idea de Montoya ahorra tiempo. Probablemente Zaldìvar:<br><br>
            </div>
            <div>
              <input type="radio" name="preg26" value="A" /> Pida otro trabajo al jefe<br />
              <input type="radio" name="preg26" value="B" /> Lo haga a su modo sin comentarios<br />
              <input type="radio" name="preg26" value="C" /> Lo haga con Montoya, pero siga criticandolo<br />
              <input type="radio" name="preg26" value="D" /> Lo haga con Montoya, pero mal a propósito<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">27.- Un hombre de 64 años tuvo algún éxito cuando joven como político, sus modos
              directos le han impedido descollar los últimos 20 años, lo más probable es que:<br><br>
            </div>
            <div>
              <input type="radio" name="preg27" value="A" /> Persista en su manera de ser<br />
              <input type="radio" name="preg27" value="B" /> Cambie para lograr éxito<br />
              <input type="radio" name="preg27" value="C" /> Forme un nuevo partido político<br />
              <input type="radio" name="preg27" value="D" /> Abandone la política por inmoral<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">28.- Es usted un joven que encuentra en la calle a una mujer de más edad a quien apenas
              conoce y que parece haber estado llorando. Lo mejor sería:<br><br>
            </div>
            <div>
              <input type="radio" name="preg28" value="A" /> Preguntarle por qué está triste<br />
              <input type="radio" name="preg28" value="B" /> Pasarle el brazo consolandolamente<br />
              <input type="radio" name="preg28" value="C" /> Simular no advertir su pena<br />
              <input type="radio" name="preg28" value="D" /> Simular no haberla visto<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">29.- Un compañero flojea de tal manera que usted le toca más de lo que le corresponde.
              La mejor forma de conservar las relaciones sería:<br><br>
            </div>
            <div>
              <input type="radio" name="preg29" value="A" /> Explicar el caso al jefe cortésmente<br />
              <input type="radio" name="preg29" value="B" /> Cortésmente indicarle que debe hacer lo que le
              corresponde o que usted se quejara
              con el jefe<br />
              <input type="radio" name="preg29" value="C" /> Hacer tanto como pueda eficientemente y no decir
              nada del caso al jefe<br />
              <input type="radio" name="preg29" value="D" /> Hacer lo suyo y dejar pendiente lo que el compañero
              no haga<br />
            </div>
          </div>
          <div class="pregresp">
            <div class="pregunta">30.- Se le ha asignado un puesto ejecutivo, en una organización. Para ganar el respeto y
              la admiración de sus subordinados, sin perjuicio de sus planes, habría que:<br><br>
            </div>
            <div>
              <input type="radio" name="preg30" value="A" /> Ceder en todos los pequeños puntos posibles<br />
              <input type="radio" name="preg30" value="B" /> Tratar de convencerlos de todas sus ideas<br />
              <input type="radio" name="preg30" value="C" /> Ceder parcialmente en todas las cuestiones
              importantes<br />
              <input type="radio" name="preg30" value="D" /> Abogar por muchas reformas<br />
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
    <script src="../smarty/js/contador-moss.js"></script>
  </body>

</html>