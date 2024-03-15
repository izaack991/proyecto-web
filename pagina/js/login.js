window.onload = funcionInit = () => {
    Swal.fire({
        title: 'Error!',
        text: 'No puedes acceder sin seleccionar el tipo de usuario',
        icon: 'error'
    }).then(function() {
        window.location.href = "../templates/index.php";
    });
}