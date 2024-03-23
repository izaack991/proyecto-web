// Obtener el script que contiene el atributo de datos
var script = document.currentScript;

// Leer el atributo de datos
var error = script.getAttribute('data-error');

// Lógica basada en el valor de 'error'
if (error === '1') {
    // Ejecutar la función correspondiente
    noRol();
} else if (error === '2') {
    isLogged1();
} else if (error === '3') {
    isLogged2();
} else if (error === '4') {
    userPermitionError();
} else if (error === '5') {
    empresaPermitionError();
} else if (error === '6') {
    empresaPermitionError2();
} else if (error === '7') {
    userPermitionError2();
}

function noRol() {
    Swal.fire({
        title: 'Error!',
        text: 'No puedes acceder sin seleccionar el tipo de usuario',
        icon: 'error'
    }).then(function () {
        window.location.href = "../templates/index.php";
    });
}

function isLogged1() {
    Swal.fire({
        title: 'Precaución!',
        text: 'Ya tienes una sesión activa',
        icon: 'warning'
    }).then(function () {
        window.location.href = "../templates/indexEmpresa.php";
    });
}

function isLogged2() {
    Swal.fire({
        title: 'Precaución!',
        text: 'Ya tienes una sesión activa',
        icon: 'warning'
    }).then(function () {
        window.location.href = "../templates/indexPrincipal.php";
    });
}

function userPermitionError() {
    Swal.fire({
        title: 'Precaución!',
        text: 'No tienes permitido visualizar esta ventana',
        icon: 'warning'
    }).then(function () {
        window.location.href = "../templates/indexPrincipal.php";
    });
}

function empresaPermitionError() {
    Swal.fire({
        title: 'Precaución!',
        text: 'No tienes permitido visualizar esta ventana',
        icon: 'warning'
    }).then(function () {
        window.location.href = "../templates/indexEmpresa.php";
    });
}

function userPermitionError2() {
    Swal.fire({
        title: 'Precaución!',
        text: 'No tienes permitido visualizar esta ventana',
        icon: 'warning'
    }).then(function () {
        window.location.href = "../templates/indexPrincipal.php";
    });
}

function empresaPermitionError2() {
    Swal.fire({
        title: 'Precaución!',
        text: 'No tienes permitido visualizar esta ventana',
        icon: 'warning'
    }).then(function () {
        window.location.href = "../templates/indexEmpresa.php";
    });
}
