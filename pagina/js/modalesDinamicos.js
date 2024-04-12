//dependiendo del valor del botton se muestra los mensajes 
ayuda = document.getElementById("btnAbrirModal");
var valor = ayuda.getAttribute('valor');
var inputs = document.querySelectorAll('[valor]');
for (var i = 0; i < inputs.length; i++) {
    //inputs[i].onclick = mostrarMensaje;
}

window.onload = function mostrarMensaje(event) {

    // Mensajes personalizados para cada valor
    var mensajes = {
        'FA1': 'Descripcion del puesto: Cargo ocupado en dicha empresa. Ejemplo: Programador.\] Nombre de la dicha Empresa.\] Periodo: Fecha salida de dicha empresa. Ejemplo (02/06/2001).',
        'FA2': 'Ubicacion: direccion de dicha Institucion. Ejemplo: Pais, Estado, Municipio, ciudad, entre calle y calle.\] Periodo: Fecha salida de dicha institucion. Ejemplo (02/06/2001).',
        'FA3': 'Ingrese actividades relacionadas con su profesion en las que tengan mas afinidad. Por ejemplo: Programacion en C#, Modelacion en 3D, etc. Esto nos ayudará a las Empresas a conocerte mejor.',
        'FA4': 'Ingrese datos que puedes resaltar, aspectos de tu personalidad, habilidades o intereses que no están directamente relacionados con tu experiencia laboral o educación, pero que podrían ser relevantes para el puesto al que estás aplicando. Ejemplos: \] Habilidades Personales: Excelente trabajo en equipo. \] Logros Relevantes: Ganador del torneo de Matematicas a nivel Estatal.'
    };
    var parrafos = mensajes[valor].split('\] ');

    // Obtener el mensaje correspondiente al valor
    //var mensajePersonalizado = mensajes[valor] || 'Mensaje predeterminado';

    // Mostrar el mensaje

// Crea un elemento div para la modal
var modal = document.createElement('div');
modal.classList.add('modal', 'fade');
modal.setAttribute('id', 'miModal');
modal.setAttribute('tabindex', '-1');
modal.setAttribute('aria-labelledby', 'miModalLabel');
modal.setAttribute('aria-hidden', 'true');

// Crea el diálogo de la modal
var modalDialog = document.createElement('div');
modalDialog.classList.add('modal-dialog');

// Crea el contenido de la modal
var modalContent = document.createElement('div');
modalContent.classList.add('modal-content');

// Crea el encabezado de la modal
var modalHeader = document.createElement('div');
modalHeader.classList.add('modal-header','bg-primary');

var modalTitle = document.createElement('h5');
modalTitle.classList.add('modal-title','text-white');
modalTitle.setAttribute('id', 'miModalLabel');
modalTitle.textContent = 'Ayuda';

// var closeButton = document.createElement('button');
// closeButton.setAttribute('type', 'button');
// closeButton.classList.add('btn-close');
// closeButton.setAttribute('data-bs-dismiss', 'modal');
// closeButton.setAttribute('aria-label', 'Close');

// Agrega el título y el botón de cierre al encabezado
modalHeader.appendChild(modalTitle);
// modalHeader.appendChild(closeButton);

// Crea el cuerpo de la modal
var modalBody = document.createElement('div');
modalBody.classList.add('modal-body');
var modalRow = document.createElement('div');
modalBody.appendChild(modalRow);
parrafos.forEach(function(parrafo) {
    var p = document.createElement('p');
    p.classList.add('row','text-justify','ml-3','mr-3');
    p.textContent = parrafo;
    modalRow.appendChild(p);
});

// Crea el pie de la modal
var modalFooter = document.createElement('div');
modalFooter.classList.add('modal-footer');

var closeButtonFooter = document.createElement('button');
closeButtonFooter.setAttribute('type', 'button');
closeButtonFooter.classList.add('btn', 'btn-secondary');
closeButtonFooter.setAttribute('data-bs-dismiss', 'modal');
closeButtonFooter.textContent = 'Cerrar';

// Agrega el botón de cierre al pie de la modal
modalFooter.appendChild(closeButtonFooter);

// Agrega el encabezado, el cuerpo y el pie a la modal
modalContent.appendChild(modalHeader);
modalContent.appendChild(modalBody);
modalContent.appendChild(modalFooter);

// Agrega el contenido a la modal
modalDialog.appendChild(modalContent);
modal.appendChild(modalDialog);

// Agrega la modal al cuerpo del documento
document.body.appendChild(modal);
$(document).ready(function(){
// Agrega un listener al botón para mostrar la modal cuando se haga clic
$('#btnAbrirModal').click(function(){
  $('#miModal').modal('show'); // Muestra la modal
});
});
}