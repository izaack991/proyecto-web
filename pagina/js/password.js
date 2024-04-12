function verificarContrasenas() {
  var password = $('#txt_PASSWORD').val();
  var confirmPassword = $('#txt_PASSWORD2').val();
  var uppercase = password.match(/[A-Z]/);
  var number = password.match(/[0-9]/);

  if (password == confirmPassword && password != '') {
    $('.password_match').removeClass('incomplete');
    $('.password_match').addClass('complete');
  } else {
    $('.password_match').removeClass('complete');
    $('.password_match').addClass('incomplete');
  }

  if (password.length < 8) {
    $('.password_length').removeClass('complete');
    $('.password_length').addClass('incomplete');
  } else {
    $('.password_length').removeClass('incomplete');
    $('.password_length').addClass('complete');
  }

  if (uppercase) {
    $('.password_uppercase').removeClass('incomplete');
    $('.password_uppercase').addClass('complete');
  } else {
    $('.password_uppercase').removeClass('complete');
    $('.password_uppercase').addClass('incomplete');
  }

  if (number) {
    $('.password_number').removeClass('incomplete');
    $('.password_number').addClass('complete');
  } else {
    $('.password_number').removeClass('complete');
    $('.password_number').addClass('incomplete');
  }
}

function display_passwordrules() {
  document.getElementById('password_rules').style.display="block";
  $('#password_div').removeClass('mb-3');
}

document.getElementById('txt_PASSWORD').addEventListener("blur", function() {
  var password = document.getElementById('txt_PASSWORD').value;
  var passwordConf = document.getElementById('txt_PASSWORD2').value;

  if (password == '' && passwordConf == '') {
  document.getElementById('password_rules').style.display="none";
  $('#password_div').addClass('mb-3');
  }
});

document.getElementById('txt_PASSWORD2').addEventListener("blur", function() {
  var password = document.getElementById('txt_PASSWORD').value;
  var passwordConf = document.getElementById('txt_PASSWORD2').value;

  if (password == '' && passwordConf == '') {
    document.getElementById('password_rules').style.display="none";
    $('#password_div').addClass('mb-3');
  }
});

const passwordField = document.getElementById("txt_PASSWORD");
const passwordConf = document.getElementById("txt_PASSWORD2");
const togglePassword = document.querySelector(".password-toggle-icon i");

togglePassword.addEventListener("click", function () {
  if (passwordField.type === "password") {
    passwordField.type = "text";
    passwordConf.type = "text";
    togglePassword.classList.remove("fa-eye");
    togglePassword.classList.add("fa-eye-slash");
  } else {
    passwordField.type = "password";
    passwordConf.type = "password";
    togglePassword.classList.remove("fa-eye-slash");
    togglePassword.classList.add("fa-eye");
  }
});

// function verificarContrasenas() {
//     var password = $('#txt_PASSWORD').val();
//     var confirmPassword = $('#txt_PASSWORD2').val();

//     // Hacer la solicitud AJAX
//     $.ajax({
//       url: '../php/verificar_contraseñas.php',
//       type: 'POST',
//       data: {
//         password: password,
//         confirmPassword: confirmPassword
//       },
//       success: function (response) {
//         // Manejar la respuesta del servidor
//         if (response === "coinciden") {
//           $('#passwordMatchMessage').html('Las contraseñas coinciden.').css('color', 'green');
//           $('#passwordMatchMessage2').html('Las contraseñas coinciden.').css('color', 'green');
//         } else {
//           $('#passwordMatchMessage').html('Las contraseñas no coinciden.').css('color', 'red');
//           $('#passwordMatchMessage2').html('Las contraseñas no coinciden.').css('color', 'red');
//         }
//       }
//     });
//   }