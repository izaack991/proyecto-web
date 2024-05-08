<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test de merril</title>
    <link id="theme-style" rel="stylesheet" href="../assets/css/devresume.css">
    <link id="theme-style" rel="stylesheet" href="../assets/css/theme-1.css">
    <link rel="icon" href="../../assets/images/WorkeleWB.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {*<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> *}

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

  <body>

    {*Modal...*}
    <div id="modal" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Modal body text goes here.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

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

    {*Card del test de Merril*}
    <div class="card-header text-center">
      <h4 class="card-title">TEST DE TERMAN MERRIL</h4>
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
      <p>tienes una hora para terminar el test merril</p>
      <p id="contador"></p>
    </center>

    {*Formulario del test de merril*}
    <form action="test_merril.php" method="POST">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#tab1">Serie 1 </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " data-toggle="tab" href="#tab2">Serie 2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " data-toggle="tab" href="#tab3">Serie 3</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " data-toggle="tab" href="#tab4">Serie 4</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " data-toggle="tab" href="#tab5">Serie 5</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " data-toggle="tab" href="#tab6">Serie 6</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " data-toggle="tab" href="#tab7">Serie 7</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " data-toggle="tab" href="#tab8">Serie 8</a>
        </li>

        </li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane active" id="tab1" role="tabpane">
          <h6>INSTRUCCIONES :
            Ponga en la hoja de respuestas la letra correspondiente a la palabra que complete
            correctamente la oración</h6>
          <div class='pregresp'>
            <div class='pregunta'>la gasolina se extrae de:</div><select id='pregunta_1' class='form-select 1'
              aria-label='Default select example'>
              <div>
                <option value=''>granos </option>
                <option value='1'>petroleo</option>
                <option value=''>trementina</option>
                <option value=''>semilla</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>una tonelada tiene:</div><select id='pregunta_2' class='form-select 1'
              aria-label='Default select example'>
              <div>
                <option value='1'>1000</option>
                <option value=''>2000</option>
                <option value=''>3000</option>
                <option value=''>4000</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>la mayoria de nuestras exportaxiones salen por:</div><select id='pregunta_3'
              class='form-select 1' aria-label='Default select example'>
              <div>
                <option value=''>Mazatlán</option>
                <option value='1'>veracruz</option>
                <option value=''>Progreso</option>
                <option value=''>acapulco</option>

              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>el nervio optico sirve para:</div><select id='pregunta_4' class='form-select 1'
              aria-label='Default select example'>
              <div>
                <option value='1'>ver </option>
                <option value=''>oir</option>
                <option value=''>probar </option>
                <option value=''>sentir </option>

              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>el café es una especie de </div><select id='pregunta_5' class='form-select 1'
              aria-label='Default select example'>
              <div>
                <option value=''>Corteza</option>
                <option value='1'>Fruto</option>
                <option value=''>hojas</option>
                <option value=''>raiz</option>

              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>6. El jamón es carne de:</div><select id='pregunta_6' class='form-select 1'
              aria-label='Default select example'>
              <div>
                <option value=''>Carnero</option>
                <option value=''>Vaca</option>
                <option value=''>Gallina</option>
                <option value='1'>Cerdo</option>

              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>7. La laringe está en:</div><select id='pregunta_7' class='form-select 1'
              aria-label='Default select example'>
              <div>
                <option value=''>Abdomen</option>
                <option value=''>Cabeza</option>
                <option value='1'>Garganta</option>
                <option value=''>Espalda</option>

              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>8. La guillotina causa:</div><select id='pregunta_8' class='form-select 1'
              aria-label='Default select example'>
              <div>
                <option value='1'>Muerte</option>
                <option value=''>Enfermedad</option>
                <option value=''>Fiebre</option>
                <option value=''>Malestar</option>

              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>9. La grúa se usa para:</div><select id='pregunta_9' class='form-select 1'
              aria-label='Default select example'>
              <div>
                <option value=''>Perforar</option>
                <option value=''>Cortar</option>
                <option value='1'>Levantar</option>
                <option value=''>Exprimir</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>10. Una figura de seis lados se llama:</div><select id='pregunta_10'
              class='form-select 1' aria-label='Default select example'>
              <div>
                <option value=''>Pentágono</option>
                <option value=''>Paralelogramo</option>
                <option value='1'>Hexágono</option>
                <option value=''>Trapecio</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>11. El Kiloatt mide:</div><select id='pregunta_11' class='form-select 1'
              aria-label='Default select example'>
              <div>
                <option value=''>Lluvia</option>
                <option value=''>Viento</option>
                <option value='1'>Electricidad</option>
                <option value=''>Presión</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>12. La pauta se usa en:</div><select id='pregunta_12' class='form-select 1'
              aria-label='Default select example'>
              <div>
                <option value=''>Agricultura</option>
                <option value='1'>Música</option>
                <option value=''>Fotografía</option>
                <option value=''>Estenografía</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>13. La esmeraldas son:</div><select id='pregunta_13' class='form-select 1'
              aria-label='Default select example'>
              <div>
                <option value=''>Azules</option>
                <option value='1'>Verdes</option>
                <option value=''>Rojas</option>
                <option value=''>Amarillas</option>

              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>14. El metro es aproximadamente igual a :</div><select id='pregunta_14'
              class='form-select 1' aria-label='Default select example'>
              <div>
                <option value=''>Pie</option>
                <option value=''>Pulgada</option>
                <option value='1'>Yarda</option>
                <option value=''>Milla</option>

              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>15. Las esponjas se obtienen de:</div><select id='pregunta_15' class='form-select 1'
              aria-label='Default select example'>
              <div>
                <option value=''>Animales</option>
                <option value='1'>Hierbas</option>
                <option value=''>Bosques</option>
                <option value=''>Minas</option>

              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>16. Fraude es término usado en</div><select id='pregunta_16' class='form-select 1'
              aria-label='Default select example'>
              <div>
                <option value=''>Medicina</option>
                <option value=''>Teología</option>
                <option value='1'>Leyes</option>
                <option value=''>Pedagogía</option>
              </div>
            </select>
          </div>

        </div>
        <div class="tab-pane" id="tab2" role="tabpane">
          <h6>INSTRUCCIONES:
            Ponga en la hoja de respuestas la letra correspondiente a la palabra que complete
            correctamente la oración</h6>
          <div class='pregresp'>
            <div class='pregunta'>1. Si la tierra estuviera más cerca del sol:</div><select id='pregunta_17'
              class='form-select 2' aria-label='Default select example'>
              <div>
                <option value=''>a) Las estrellas desaparecerían</option>
                <option value=''>b) los meses serían más largos</option>
                <option value='1'>b) La tierra estaría más caliente</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>2. Los rayos de una rueda están frecuentemente hechos de nogal porque :</div><select
              id='pregunta_18' class='form-select 2' aria-label='Default select example'>
              <div>
                <option value='1'>a) El nogal es fuerte</option>
                <option value=''>b) Se corta fácilmente</option>
                <option value=''>c) Sus frenos no son buenos</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>3. Un tren se detiene con más dificultad que un automóvil porque:</div><select
              id='pregunta_19' class='form-select 2' aria-label='Default select example'>
              <div>
                <option value=''>a) Tiene más ruedas</option>
                <option value='1'>b) Es más pesado</option>
                <option value=''>c) Sus frenos no son buenos</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>4. El dicho “a golpecitos se derriba un roble” quiere decir:</div><select
              id='pregunta_20' class='form-select 2' aria-label='Default select example'>
              <div>
                <option value=''>a) Tiene más ruedas</option>
                <option value=''>b) Es más pesado</option>
                <option value='1'>c) Sus frenos no son buenos</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>5. El dicho “Una olla vigilada nunca hierve” quiere decir:</div><select id='pregunta_21'
              class='form-select 2' aria-label='Default select example'>
              <div>
                <option value=''>a) Que no debemos vigilarla cuando está en el fuego</option>
                <option value=''>b) Que tarda en hervir</option>
                <option value='1'>c) Que el tiempo se alarga cuando esperamos algo</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>6. El dicho “Siembra pasto mientras haya sol” quiere decir:</div><select
              id='pregunta_22' class='form-select 2' aria-label='Default select example'>
              <div>
                <option value=''>a) Que el pasto se siembra en verano</option>
                <option value='1'>b) Que debemos aprovechar nuestras oportunidades</option>
                <option value=''>c) Que el pasto no debe cortarse en la noche</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>7. El dicho “Zapatero a tus zapatos” quiere decir:</div><select id='pregunta_23'
              class='form-select 2' aria-label='Default select example'>
              <div>
                <option value=''>a) Que el zapatero no debe abandonar sus zapatos</option>
                <option value=''>b) Que los zapateros no deben estar ociosos</option>
                <option value='1'>c) Que debemos trabajar en lo que podamos hacer mejor</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>8. El dicho “La cuña para que apriete tiene que ser del mismo palo” quiere decir:</div>
            <select id='pregunta_24' class='form-select 2' aria-label='Default select example'>
              <div>
                <option value=''>a) Que el palo sirve para apretar</option>
                <option value=''>b) Que las cuñas siempre son de madera</option>
                <option value='1'>c) Nos exigen más las personas que nos conocen</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>9. Un acorazado de acero flota porque:</div><select id='pregunta_25'
              class='form-select 2' aria-label='Default select example'>
              <div>
                <option value=''>a) La maquina lo hace flotar</option>
                <option value='1'>b) Porque tiene grandes espacios huecos</option>
                <option value=''>c) Contiene algo de madera</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>10. Las plumas de las alas ayudan al pájaro a volar porque:</div><select
              id='pregunta_26' class='form-select 2' aria-label='Default select example'>
              <div>
                <option value='1'>a) Las alas ofrecen una amplia superficie ligera</option>
                <option value=''>b) Mantienen el aire afuera del cuerpo</option>
                <option value=''>c) Disminuye su peso</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>11. El dicho “Una golondrina no hace el verano” quiere decir:</div><select
              id='pregunta_27' class='form-select 2' aria-label='Default select example'>
              <div>
                <option value=''>a) Que las golondrinas regresan</option>
                <option value='1'>b) Que un simple dato no es suficiente</option>
                <option value=''>c) Que los pájaros se agregan a nuestros placeres del verano</option>
              </div>
            </select>
          </div>
        </div>
        <div class="tab-pane" id="tab3" role="tabpane">
          <h6>INSTRUCCIONES:
            Cuando las dos palabras signifiquen lo mismo, ponga el numero ( 1 ) de igual ; cuando
            signifiquen lo opuesto, ponga el numero ( 0 ) : </h6>
          <div class='pregresp'>
            <div class='pregunta'>1. salado – dulce </div><select id='pregunta_28' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='1'>0</option>
                <option value='0'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>2. alegrarse – regocijarse </div><select id='pregunta_29' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='0'>0</option>
                <option value='1'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>3. mayor – menor </div><select id='pregunta_30' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='1'>0</option>
                <option value='0'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>4. sentarse – pararse </div><select id='pregunta_31' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='1'>0</option>
                <option value='0'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>5. desperdiciar – aprovechar </div><select id='pregunta_32' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='1'>0</option>
                <option value='0'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>1. conceder – negar </div><select id='pregunta_33' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='1'>0</option>
                <option value='0'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>6. tónico – estimulante </div><select id='pregunta_34' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='1'>0</option>
                <option value='0'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>7. rebajar – denigrar </div><select id='pregunta_35' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='0'>0</option>
                <option value='1'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>8. prohibir – permitir </div><select id='pregunta_36' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='1'>0</option>
                <option value='0'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>9. osado – audaz </div><select id='pregunta_37' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='0'>0</option>
                <option value='1'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>1. arrebatado – prudente </div><select id='pregunta_38' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='1'>0</option>
                <option value='0'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>10. obtuso – agudo </div><select id='pregunta_39' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='1'>0</option>
                <option value='0'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>11. inepto – experto </div><select id='pregunta_40' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='1'>0</option>
                <option value='0'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>12. esquivar – huir </div><select id='pregunta_41' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='0'>0</option>
                <option value='1'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>13. rebelarse – someterse </div><select id='pregunta_42' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='1'>0</option>
                <option value='0'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>1. monotonía – variedad </div><select id='pregunta_43' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='1'>0</option>
                <option value='0'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>14. confortar – consolar </div><select id='pregunta_44' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='0'>0</option>
                <option value='1'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>15. expeler – retener </div><select id='pregunta_45' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='1'>0</option>
                <option value='0'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>16. dócil – sumiso </div><select id='pregunta_46' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='0'>0</option>
                <option value='1'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>17. transitorio – permanente </div><select id='pregunta_47' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='1'>0</option>
                <option value='0'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>1. seguridad – riesgo </div><select id='pregunta_48' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='1'>0</option>
                <option value='0'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>18. aprobar – objetar </div><select id='pregunta_49' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='1'>0</option>
                <option value='0'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>19. expeler – arrojar </div><select id='pregunta_50' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='0'>0</option>
                <option value='1'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>20. engaño – impostura </div><select id='pregunta_51' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='0'>0</option>
                <option value='1'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>21. mitigar – apaciguar </div><select id='pregunta_52' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='0'>0</option>
                <option value='1'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>1. iniciar – aplacar </div><select id='pregunta_53' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='1'>0</option>
                <option value='0'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>22. reverencia – veneración </div><select id='pregunta_54' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='0'>0</option>
                <option value='1'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>23. sobriedad – frugalidad </div><select id='pregunta_55' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='0'>0</option>
                <option value='1'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>24. aumentar – menguar </div><select id='pregunta_56' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='1'>0</option>
                <option value='0'>1</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>25. incitar – instigar </div><select id='pregunta_57' class='form-select 3'
              aria-label='Default select example'>
              <div>
                <option value='0'>0</option>
                <option value='1'>1</option>
              </div>
            </select>
          </div>

        </div>
        <div class="tab-pane" id="tab4" role="tabpane">
          <h6>INSTRUCCIONES :
            Anote en la hoja de respuestas las letras correspondientes a las dos palabras que indican
            algo que SIEMPRE TIENE EL SUJETO. </h6>
          <div class='pregresp'>
            <div class='pregunta'>1. Un hombre tiene siempre:</div><select id='pregunta_58' class='form-select 4'
              aria-label='Default select example'>
              <div>
                <option value=''>|a) Cuerpo</option>
                <option value='1'>|b) Circunferencia </option>
                <option value=''>|c) Latitud</option>
                <option value=''>|d) Longitud</option>
                <option value='1'>|e) Radio</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>2. Un PÁJARO tiene siempre:</div><select id='pregunta_59' class='form-select 4'
              aria-label='Default select example'>
              <div>
                <option value='1'>|a) Huesos</option>
                <option value=''>|b) Huevos</option>
                <option value='1'>|c) Pico</option>
                <option value=''>|d) Nido</option>
                <option value=''>|e) Canto</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>3. La MÚSICA tiene siempre:</div><select id='pregunta_60' class='form-select 4'
              aria-label='Default select example'>
              <div>
                <option value=''>|a) Oyente</option>
                <option value=''>|b) Piano</option>
                <option value='1'>|c) Ritmo</option>
                <option value='1'>|d) Sonido</option>
                <option value=''>|e) Violín</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>4. Un BANQUETE tiene siempre.</div><select id='pregunta_61' class='form-select 4'
              aria-label='Default select example'>
              <div>
                <option value='1'>|a) Alimentos</option>
                <option value=''>|b) Música</option>
                <option value=''>|c) Personas</option>
                <option value=''>|d) Discursos</option>
                <option value='1'>|e) Anfitrión</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>5. Un CABALLO tiene siempre:</div><select id='pregunta_62' class='form-select 4'
              aria-label='Default select example'>
              <div>
                <option value=''>|a) Arnés</option>
                <option value='1'>|b) Casco</option>
                <option value=''>|c) Herradura</option>
                <option value=''>|d) Establo</option>
                <option value='1'>|e) Cola</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>6. Un JUEGO tiene siempre:</div><select id='pregunta_63' class='form-select 4'
              aria-label='Default select example'>
              <div>
                <option value=''>|a) Cartas</option>
                <option value=''>|b) Multas</option>
                <option value='1'>|c) Jugadores</option>
                <option value=''>|d) Castigos</option>
                <option value='1'>|e) Reglas</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>7. Un OBJETO tiene siempre:</div><select id='pregunta_64' class='form-select 4'
              aria-label='Default select example'>
              <div>
                <option value=''>|a) Calor</option>
                <option value='1'>|b) Tamaño</option>
                <option value=''>|c) Sabor</option>
                <option value=''>|d) Valor</option>
                <option value='1'>|e) Peso</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>8. Una CONVERSACIÓN tiene siempre:</div><select id='pregunta_65' class='form-select 4'
              aria-label='Default select example'>
              <div>
                <option value=''>|a) Acuerdos</option>
                <option value='1'>|b) Personas</option>
                <option value=''>|c) Preguntas</option>
                <option value=''>|d) Ingenio</option>
                <option value='1'>|e) Palabras</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>9. Una DEUDA implica siempre:</div><select id='pregunta_66' class='form-select 4'
              aria-label='Default select example'>
              <div>
                <option value='1'>|a) Acreedor</option>
                <option value='1'>|b) Deudor</option>
                <option value=''>|c) Interés</option>
                <option value=''>|d) Hipoteca</option>
                <option value=''>e) Pago</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>10. Un CIUDADANO tiene siempre:</div><select id='pregunta_67' class='form-select 4'
              aria-label='Default select example'>
              <div>
                <option value='1'>|a) País</option>
                <option value=''>|b) Ocupación</option>
                <option value='1'>|c) Derechos</option>
                <option value=''>|d) Propiedad</option>
                <option value=''>|e) Voto</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>11. Un MUSEO tiene siempre:</div><select id='pregunta_68' class='form-select 4'
              aria-label='Default select example'>
              <div>
                <option value=''>|a) Animales</option>
                <option value='1'>|b) Orden</option>
                <option value='1'>|c) Colecciones</option>
                <option value=''>|d) Minerales</option>
                <option value=''>|e) Visitantes</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>12. Un COMPROMISO implica siempre:</div><select id='pregunta_69' class='form-select 4'
              aria-label='Default select example'>
              <div>
                <option value='1'>|a) Obligación</option>
                <option value='1'>|b) Acuerdo</option>
                <option value=''>|c) Amistad</option>
                <option value=''>|d) Respeto</option>
                <option value=''>|e) Satisfacción</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>13. Un BOSQUE tiene siempre:</div><select id='pregunta_70' class='form-select 4'
              aria-label='Default select example'>
              <div>
                <option value='1'>|a) Animales</option>
                <option value=''>|b) Flores</option>
                <option value=''>|c) Sombras</option>
                <option value=''>|d) Maleza</option>
                <option value='1'>|e) Árboles</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>14. Los OBSTÁCULOS tienen siempre:</div><select id='pregunta_71' class='form-select 4'
              aria-label='Default select example'>
              <div>
                <option value='1'>|a) Dificultad</option>
                <option value=''>|b) Desaliento</option>
                <option value=''>|c) Fracaso</option>
                <option value='1'>|d) Impedimento</option>
                <option value=''>e) Estímulo</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>15. El ABORRECIMIENTO tiene siempre:</div><select id='pregunta_72' class='form-select 4'
              aria-label='Default select example'>
              <div>
                <option value='1'>|a) Aversión</option>
                <option value='1'>|b) Desagrado</option>
                <option value=''>|c) Temor</option>
                <option value=''>|d) Ira</option>
                <option value=''>|e) Timidez</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>16. Una REVISTA tiene siempre:</div><select id='pregunta_73' class='form-select 4'
              aria-label='Default select example'>
              <div>
                <option value=''>|a) Anuncios</option>
                <option value='1'>|b) Papel</option>
                <option value=''>|c) Fotografías</option>
                <option value=''>|d) Grabados</option>
                <option value='1'>|e) Impresión</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>17. La CONTROVERSIA implica siempre:</div><select id='pregunta_74' class='form-select 4'
              aria-label='Default select example'>
              <div>
                <option value='1'>|a) Argumentos</option>
                <option value='1'>|b) Desacuerdos</option>
                <option value=''>|c) Aversión</option>
                <option value=''>|d) Público</option>
                <option value=''>|e) Resumen</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>18. Un BARCO tiene siempre:</div><select id='pregunta_75' class='form-select 4'
              aria-label='Default select example'>
              <div>
                <option value='1'>|a) Maquinaria</option>
                <option value=''>|b) Cañones</option>
                <option value='1'>|c) Quilla</option>
                <option value=''>|d) Timón</option>
                <option value=''>|e) Velas</option>
              </div>
            </select>
          </div>

        </div>
        <div class="tab-pane" id="tab5" role="tabpane">
          <h6>INSTRUCCIONES:
            Encuentre las respuestas lo más pronto posible. Escríbalas en la hoja de respuesta. </h6>
          <div class='pregresp'>
            <div class='pregunta'>1. A 2 por 5 pesos, ¿Cuántos lápices puede comprarse con 50 pesos?</div><select
              id='pregunta_76' class='form-select 5' aria-label='Default select example'>
              <div>
                <option value=''>32 lapices</option>
                <option value='1'>20 lapices</option>
                <option value=''>15 lapices</option>
                <option value=''>18 lapices</option>
                <option value=''>12 lapices</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>2. ¿Cuántas horas tardaría un automóvil en recorrer 660 kilómetros a la velocidad de 60
              kilómetros por hora ?</div><select id='pregunta_77' class='form-select 5'
              aria-label='Default select example'>
              <div>
                <option value=''>12</option>
                <option value=''>14</option>
                <option value='1'>11 horas</option>
                <option value=''>15</option>
                <option value=''>16</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>3. Si un hombre gana $200.00 diarios y gasta $140.00 ¿cuantos días tardaría en ahorrar
              $3,000.00?</div><select id='pregunta_78' class='form-select 5' aria-label='Default select example'>
              <div>
                <option value=''>60 dias</option>
                <option value=''>70 dias</option>
                <option value='1'>50 días</option>
                <option value=''>80 dias</option>
                <option value=''>40 dias</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>4. Si dos pasteles cuestan $600.00 ¿Cuantos pesos cuesta la sexta parte de un pastel ?
            </div><select id='pregunta_79' class='form-select 5' aria-label='Default select example'>
              <div>
                <option value=''>40 pesos</option>
                <option value=''>60 pesos</option>
                <option value='1'>50 pesos</option>
                <option value=''>70 pesos</option>
                <option value=''>30 pesos</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>5. ¿Cuantas veces más es 2 x 3 x 4 x 6, que 3 x 4 ?</div><select id='pregunta_80'
              class='form-select 5' aria-label='Default select example'>
              <div>
                <option value=''>11</option>
                <option value=''>13</option>
                <option value=''>15</option>
                <option value=''>24</option>
                <option value='1'>12</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>6. ¿Cuanto es el 15% de 120.00 ?</div><select id='pregunta_81' class='form-select 5'
              aria-label='Default select example'>
              <div>
                <option value=''>12</option>
                <option value=''>15</option>
                <option value=''>20</option>
                <option value='1'>18</option>
                <option value=''>24</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>7. El cuatro por ciento de $1,000.00 es igual al ocho por ciento ¿de qué cantidad?</div>
            <select id='pregunta_82' class='form-select 5' aria-label='Default select example'>
              <div>
                <option value=''>400</option>
                <option value=''>550</option>
                <option value=''>600</option>
                <option value='1'>500</option>
                <option value=''>450</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>8. La capacidad de un refrigerador rectangular es de 48 metros cúbicos. Si tiene seis
              metros de largo por cuatro de ancho ¿Cual es su altura?</div><select id='pregunta_83' class='form-select 5'
              aria-label='Default select example'>
              <div>
                <option value=''>4 metros</option>
                <option value=''>6 metros</option>
                <option value='1'>2 metros</option>
                <option value=''>3 metros</option>
                <option value=''>10 metros</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>9. Si 7 hombres hacen un pozo de 40 metros en 2 dias, ¿Cuantos hombres se necesitan para
              hacerlo en medio día?</div><select id='pregunta_84' class='form-select 5'
              aria-label='Default select example'>
              <div>
                <option value=''>14 hombres</option>
                <option value='1'>28 hombres</option>
                <option value=''>12 hombres</option>
                <option value=''>30 hombres</option>
                <option value=''>32 hombres</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>10. A tiene $180.00; B tiene 2/3 de lo que tiene A, y C ½ de lo que tiene B, ¿Cuanto
              tienen todos juntos?</div><select id='pregunta_85' class='form-select 5'
              aria-label='Default select example'>
              <div>
                <option value=''>450</option>
                <option value=''>500</option>
                <option value='1'>360</option>
                <option value=''>180</option>
                <option value=''>90</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>11. Si un hombre corre 100 mts en 10 segundos, ¿Cuantos metros correrá como promedio en
              1/5 de segundo?</div><select id='pregunta_86' class='form-select 5' aria-label='Default select example'>
              <div>
                <option value='1'>2 metros</option>
                <option value=''>5 metros</option>
                <option value=''>7 metros</option>
                <option value=''>4 metros</option>
                <option value=''>1 metro</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>12. Un hombre gasta ¼ de su sueldo en casa y alimentos y 4/8 en otros gastos ¿Que tanto
              por ciento de su sueldo ahorra?</div><select id='pregunta_87' class='form-select 5'
              aria-label='Default select example'>
              <div>
                <option value=''>15% de su sueldo</option>
                <option value=''>35% de su sueldo</option>
                <option value=''>75% de su sueldo</option>
                <option value=''>50% de su sueldo</option>
                <option value='1'>25% de su sueldo</option>
              </div>
            </select>
          </div>

        </div>
        <div class="tab-pane" id="tab6" role="tabpane">
          <h6>INSTRUCCIONES :
            Anote la contestación correcta</h6>
          <div class='pregresp'>
            <div class='pregunta'>1. La higiene es esencial para la salud</div><select id='pregunta_88'
              class='form-select 6' aria-label='Default select example'>
              <div>
                <option value='1'>Si</option>
                <option value=''>no</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>2. Los taquígrafos usan microscopio</div><select id='pregunta_89' class='form-select 6'
              aria-label='Default select example'>
              <div>
                <option value=''>Si</option>
                <option value='1'>no</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>3. Los tiranos son justos con sus inferiores</div><select id='pregunta_90'
              class='form-select 6' aria-label='Default select example'>
              <div>
                <option value=''>Si</option>
                <option value='1'>no</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>4. Las personas desamparadas están sujetas con frecuencia a la caridad</div><select
              id='pregunta_91' class='form-select 6' aria-label='Default select example'>
              <div>
                <option value='1'>Si</option>
                <option value=''>no</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>5. Las personas venerables son por lo común respetadas</div><select id='pregunta_92'
              class='form-select 6' aria-label='Default select example'>
              <div>
                <option value='1'>Si</option>
                <option value=''>no</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>6. Es el escorbuto un medicamento</div><select id='pregunta_93' class='form-select 6'
              aria-label='Default select example'>
              <div>
                <option value=''>Si</option>
                <option value='1'>no</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>7. Es la amonestación una clase de instrumento musical</div><select id='pregunta_94'
              class='form-select 6' aria-label='Default select example'>
              <div>
                <option value=''>Si</option>
                <option value='1'>no</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>8. Son los colores opacos preferidos para las banderas nacionales</div><select
              id='pregunta_95' class='form-select 6' aria-label='Default select example'>
              <div>
                <option value=''>Si</option>
                <option value='1'>no</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>9. Las cosas misteriosas son a veces pavorosas</div><select id='pregunta_96'
              class='form-select 6' aria-label='Default select example'>
              <div>
                <option value='1'>Si</option>
                <option value=''>no</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>10. Personas conscientes cometen alguna vez errores</div><select id='pregunta_97'
              class='form-select 6' aria-label='Default select example'>
              <div>
                <option value='1'>Si</option>
                <option value=''>no</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>11. Son carnívoros los carneros</div><select id='pregunta_98' class='form-select 6'
              aria-label='Default select example'>
              <div>
                <option value=''>Si</option>
                <option value='1'>no</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>12. Se dan asignaturas a los caballos</div><select id='pregunta_99'
              class='form-select 6' aria-label='Default select example'>
              <div>
                <option value=''>Si</option>
                <option value='1'>no</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>13. Las cartas anónimas llevan alguna vez firma de quien las escribe</div><select
              id='pregunta_100' class='form-select 6' aria-label='Default select example'>
              <div>
                <option value=''>Si</option>
                <option value='1'>no</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>14. Son discontinuos los sonidos intermitentes</div><select id='pregunta_101'
              class='form-select 6' aria-label='Default select example'>
              <div>
                <option value='1'>Si</option>
                <option value=''>no</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>15. Las enfermedades estimulan el buen juicio</div><select id='pregunta_102'
              class='form-select 6' aria-label='Default select example'>
              <div>
                <option value=''>Si</option>
                <option value='1'>no</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>16. Son siempre perversos los hechos premeditados</div><select id='pregunta_103'
              class='form-select 6' aria-label='Default select example'>
              <div>
                <option value=''>Si</option>
                <option value='1'>no</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>17. El contacto social tiende a reducir la timidez</div><select id='pregunta_104'
              class='form-select 6' aria-label='Default select example'>
              <div>
                <option value='1'>Si</option>
                <option value=''>no</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>18. Son enfermas las personas que tienen mal carácter</div><select id='pregunta_105'
              class='form-select 6' aria-label='Default select example'>
              <div>
                <option value=''>Si</option>
                <option value='1'>no</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>19. Se caracteriza generalmente el rencor por la persistencia</div><select
              id='pregunta_106' class='form-select 6' aria-label='Default select example'>
              <div>
                <option value=''>Si</option>
                <option value='1'>no</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>20. Meticuloso quiere decir lo mismo que cuidadoso</div><select id='pregunta_107'
              class='form-select 6' aria-label='Default select example'>
              <div>
                <option value='1'>Si</option>
                <option value=''>no</option>
              </div>
            </select>
          </div>

        </div>
        <div class="tab-pane" id="tab7" role="tabpane">
          <h6>INSTRUCCIONES: Seleccione el inciso correcto</h6>
          <div class='pregresp'>
            <div class='pregunta'>1. ABRIGO es a USAR como PAN es a :</div><select id='pregunta_110' class='form-select 7'
              aria-label='Default select example'>
              <div>
                <option value='1'>a) comer</option>
                <option value=''>b) hambre</option>
                <option value=''>b) agua</option>
                <option value=''>c) cocinar</option>
                <option value=''></option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>2. SEMANA es a MES como MES es a :</div><select id='pregunta_111' class='form-select 7'
              aria-label='Default select example'>
              <div>
                <option value='1'>a) año</option>
                <option value=''>b) hora</option>
                <option value=''> c) minuto</option>
                <option value=''> d) siglo</option>
                <option value=''></option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>3. LEON es a ANIMAL como ROSA es a :</div><select id='pregunta_112'
              class='form-select 7' aria-label='Default select example'>
              <div>
                <option value=''>a) olor</option>
                <option value=''>b) hoja</option>
                <option value='1'>c) planta</option>
                <option value=''>d) espina</option>
                <option value=''></option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>4. LIBERTAD es a INDEPENDENCIA como CAUTIVERIO es a :</div><select id='pregunta_113'
              class='form-select 7' aria-label='Default select example'>
              <div>
                <option value=''>a) negro</option>
                <option value='1'>b) esclavitud</option>
                <option value=''>c) libre</option>
                <option value=''>d) sufrir</option>
                <option value=''></option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>5. DECIR es a DIJO como ESTAR es a :</div><select id='pregunta_114'
              class='form-select 7' aria-label='Default select example'>
              <div>
                <option value=''>a) cantar</option>
                <option value='1'>b) estuvo</option>
                <option value=''>c) hablando</option>
                <option value=''>d) cantó</option>
                <option value=''></option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>6. LUNES es a MARTES como VIERNES es a :</div><select id='pregunta_115'
              class='form-select 7' aria-label='Default select example'>
              <div>
                <option value=''>a) semana</option>
                <option value=''>b) jueves</option>
                <option value=''>c) día</option>
                <option value='1'>d) sábado</option>
                <option value=''></option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>7. PLOMO es a PESADO como CORCHO es a :</div><select id='pregunta_116'
              class='form-select 7' aria-label='Default select example'>
              <div>
                <option value=''>a) botella</option>
                <option value=''>b) peso</option>
                <option value='1'>c) ligero</option>
                <option value=''>d) flotar</option>
                <option value=''></option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>8. ÉXITO es a ALEGRÍA como FRACASO es a :</div><select id='pregunta_117'
              class='form-select 7' aria-label='Default select example'>
              <div>
                <option value='1'>a) tristeza</option>
                <option value=''>b) suerte</option>
                <option value=''>c) fracasar</option>
                <option value=''>d) trabajo</option>
                <option value=''></option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>9. GATO es a tigre como PERRO es a :</div><select id='pregunta_118'
              class='form-select 7' aria-label='Default select example'>
              <div>
                <option value='1'>a) lobo</option>
                <option value=''>b) ladrido</option>
                <option value=''>c) mordida</option>
                <option value=''>d) agarrar</option>
                <option value=''></option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>10. 4 es a 16 como 5 es a :</div><select id='pregunta_119' class='form-select 7'
              aria-label='Default select example'>
              <div>
                <option value=''>a) 7</option>
                <option value=''>b) 45</option>
                <option value=''>c) 35</option>
                <option value='1'>d) 25</option>
                <option value=''></option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>11. LLORAR es REÍR como TRISTE es a :</div><select id='pregunta_120'
              class='form-select 7' aria-label='Default select example'>
              <div>
                <option value=''>a) muerte</option>
                <option value='1'>b) alegre</option>
                <option value=''>c) mortaja</option>
                <option value=''>d) doctor</option>
                <option value=''></option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>12. VENENO es a MUERTE como ALIMENTO es a :</div><select id='pregunta_121'
              class='form-select 7' aria-label='Default select example'>
              <div>
                <option value=''>a) comer</option>
                <option value=''>b) pájaro</option>
                <option value='1'>c) vida</option>
                <option value=''>d) malo</option>
                <option value=''></option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>13. 1 es a 3 como 9 es a :</div><select id='pregunta_122' class='form-select 7'
              aria-label='Default select example'>
              <div>
                <option value=''>a) 18</option>
                <option value='1'>b) 27</option>
                <option value=''>c) 36</option>
                <option value=''>d) 45</option>
                <option value=''></option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>14. ALIMENTO es a HAMBRE como AGUA es a :</div><select id='pregunta_123'
              class='form-select 7' aria-label='Default select example'>
              <div>
                <option value=''>a) beber</option>
                <option value=''>b) claro</option>
                <option value='1'>c) sed</option>
                <option value=''>d) puro</option>
                <option value=''></option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>15. AQUÍ es a ALLÍ como ESTE es a :</div><select id='pregunta_124' class='form-select 7'
              aria-label='Default select example'>
              <div>
                <option value=''>a) estos</option>
                <option value='1'>b) aquel</option>
                <option value=''>c) ese</option>
                <option value=''>d) entonces</option>
                <option value=''></option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>16. TIGRE es a PELO como TRUCHA es a :</div><select id='pregunta_125'
              class='form-select 7' aria-label='Default select example'>
              <div>
                <option value=''>a) agua</option>
                <option value=''>b) pez</option>
                <option value='1'>c) escama</option>
                <option value=''>d) nadar</option>
                <option value=''></option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>17. PERVERTIDO es a DEPRAVADO como INCORRUPTO es a :</div><select id='pregunta_126'
              class='form-select 7' aria-label='Default select example'>
              <div>
                <option value=''>a) patria</option>
                <option value='1'>b) honrado</option>
                <option value=''>c) canción</option>
                <option value=''>d) estudio</option>
                <option value=''></option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>18. B es a D como SEGUNDO es a :</div><select id='pregunta_127' class='form-select 7'
              aria-label='Default select example'>
              <div>
                <option value=''>a) tercero</option>
                <option value=''>b) último</option>
                <option value='1'>c) cuarto</option>
                <option value=''>d) posterior</option>
                <option value=''></option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>19. ESTADO es a GOBERNADOR como EJERCITO es a :</div><select id='pregunta_128'
              class='form-select 7' aria-label='Default select example'>
              <div>
                <option value=''>a) marina</option>
                <option value=''>soldado</option>
                <option value='1'>c) general</option>
                <option value=''>d) sargento</option>
                <option value=''></option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>20. SUJETO es a PREDICADOR como NOMBRE es a :</div><select id='pregunta_129'
              class='form-select 7' aria-label='Default select example'>
              <div>
                <option value=''>a) pronombre</option>
                <option value='1'>b) adverbio</option>
                <option value=''>c) verbo</option>
                <option value=''>d) adjetivo</option>
                <option value=''></option>
              </div>
            </select>
          </div>
        </div>
        <div class="tab-pane" id="tab8" role="tabpane">
          <h6>INSTRUCCIONES:
            Las palabras de cada una de las siguientes oraciones están mezcladas. Ordene cada una de
            ellas. Si el significado de la oración es VERDADERO anote la letra V, si el significado de la oración es
            FALSO anote la letra F </h6>
          <div class='pregresp'>
            <div class='pregunta'>1. Con crecen los niños edad la</div><select id='pregunta_130' class='form-select 8'
              aria-label='Default select example'>
              <div>
                <option value='1'>V</option>
                <option value=''>F</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>2. Buena mar beber el agua de es</div><select id='pregunta_131' class='form-select 8'
              aria-label='Default select example'>
              <div>
                <option value=''>V</option>
                <option value='1'>F</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>3. Lo es paz la guerra opuesto la a</div><select id='pregunta_132' class='form-select 8'
              aria-label='Default select example'>
              <div>
                <option value='1'>V</option>
                <option value=''>F</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>4. Caballos automóvil un que camina los despacio más</div><select id='pregunta_133'
              class='form-select 8' aria-label='Default select example'>
              <div>
                <option value='1'>V</option>
                <option value=''>F</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>5. Consejo a veces es buen seguir un difícil</div><select id='pregunta_134'
              class='form-select 8' aria-label='Default select example'>
              <div>
                <option value='1'>V</option>
                <option value=''>F</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>6. Cuatrocientas todas páginas contienen libros los</div><select id='pregunta_135'
              class='form-select 8' aria-label='Default select example'>
              <div>
                <option value=''>V</option>
                <option value='1'>F</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>7. Crecen las que fresas el más roble</div><select id='pregunta_136'
              class='form-select 8' aria-label='Default select example'>
              <div>
                <option value=''>V</option>
                <option value='1'>F</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>8. Verdadera comparada no puede amistad ser</div><select id='pregunta_137'
              class='form-select 8' aria-label='Default select example'>
              <div>
                <option value='1'>V</option>
                <option value=''>F</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>9. Envidia la perjudiciales gula son y la</div><select id='pregunta_138'
              class='form-select 8' aria-label='Default select example'>
              <div>
                <option value='1'>V</option>
                <option value=''>F</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>10. Nunca acciones premiadas las deben buenas ser</div><select id='pregunta_139'
              class='form-select 8' aria-label='Default select example'>
              <div>
                <option value=''>V</option>
                <option value='1'>F</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>11. Exteriores engañan nunca apariencias las nos</div><select id='pregunta_140'
              class='form-select 8' aria-label='Default select example'>
              <div>
                <option value=''>V</option>
                <option value='1'>F</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>12. Nunca es hombre las que acciones demuestran un lo</div><select id='pregunta_141'
              class='form-select 8' aria-label='Default select example'>
              <div>
                <option value=''>V</option>
                <option value='1'>F</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>13. Ciertas siempre muerte de causan clases enfermedades </div><select id='pregunta_142'
              class='form-select 8' aria-label='Default select example'>
              <div>
                <option value='1'>V</option>
                <option value=''>F</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>14. Odio indeseables aversión sentimientos el son y la</div><select id='pregunta_143'
              class='form-select 8' aria-label='Default select example'>
              <div>
                <option value='1'>V</option>
                <option value=''>F</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>15. Frecuentemente por juzgar podemos acciones hombres nosotros sus a los </div><select
              id='pregunta_144' class='form-select 8' aria-label='Default select example'>
              <div>
                <option value='1'>V</option>
                <option value=''>F</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>16. una es sábana sarapes tan nunca los caliente como</div><select id='pregunta_145'
              class='form-select 8' aria-label='Default select example'>
              <div>
                <option value=''>V</option>
                <option value='1'>F</option>
              </div>
            </select>
          </div>
          <div class='pregresp'>
            <div class='pregunta'>17. Nunca que descuidados los tropiezan son</div><select id='pregunta_146'
              class='form-select 8' aria-label='Default select example'>
              <div>
                <option value=''>V</option>
                <option value='1'>F</option>
              </div>
            </select>
          </div>
        </div>
      </div>
      <input type="hidden" id="resultado1" name="resultado1">
      <input type="hidden" id="resultado2" name="resultado2">
      <input type="hidden" id="resultado3" name="resultado3">
      <input type="hidden" id="resultado4" name="resultado4">
      <input type="hidden" id="resultado5" name="resultado5">
      <input type="hidden" id="resultado6" name="resultado6">
      <input type="hidden" id="resultado7" name="resultado7">
      <input type="hidden" id="resultado8" name="resultado8">
      <br><input onclick="finish()" style="margin-left: 50%;" name="btn-finalizar" id="btn-finalizar" type="submit"
        value="finalizar">
      <br>
    </form>

    {*Conexion de librerias de JavaScript y bootstrap*}                
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="../smarty/js/test_merril.js"></script>
    <script src="../smarty/js/contador.js"></script>

  </body>

</html>