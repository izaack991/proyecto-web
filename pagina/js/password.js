function verificarContrasenas() {
    var password = $('#txt_PASSWORD').val();
    var confirmPassword = $('#txt_PASSWORD2').val();
  
    // Hacer la solicitud AJAX
    $.ajax({
      url: '../php/verificar_contraseñas.php',
      type: 'POST',
      data: {
        password: password,
        confirmPassword: confirmPassword
      },
      success: function (response) {
        // Manejar la respuesta del servidor
        if (response === "coinciden") {
          $('#passwordMatchMessage').html('Las contraseñas coinciden.').css('color', 'green');
          $('#passwordMatchMessage2').html('Las contraseñas coinciden.').css('color', 'green');
        } else {
          $('#passwordMatchMessage').html('Las contraseñas no coinciden.').css('color', 'red');
          $('#passwordMatchMessage2').html('Las contraseñas no coinciden.').css('color', 'red');
        }
      }
    });
  }