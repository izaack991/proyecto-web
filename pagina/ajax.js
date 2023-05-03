
$(document).ready(function () {
    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            var cardHtml = '';

            var card = $("#card-container");
for (var i = 0; i < data.length; i++) {
    var fila = "<div class='col'>";
    fila += "<div class='card border-primary mb-3' style='max-width: 20rem;'>";
    fila += "<div class='card-header'><h3 class='card-title'>" + data[i].pais + "</h3></div>";
    fila += "<div class='card-body'>";
    fila += "<h4 class='card-title'>Vacantes: "+data[i].vacantes+"</h4>";
    fila += "</div>";
    fila += "</div>";
    fila += "</div>";
    card.append(fila);
}
        },
        error: function (xhr, status, error) {
            console.log(error); 
        }
    });
});

function myFunction() {
    var miDiv = document.getElementById("card-container");
    miDiv.innerHTML = "";

    $(document).ready(function () {
        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                var cardHtml = '';
    
                var card = $("#card-container");
    for (var i = 0; i < data.length; i++) {
        var fila = "<div class='col'>";
        fila += "<div class='card border-primary mb-3' style='max-width: 20rem;'>";
        fila += "<div class='card-header'><h3 class='card-title'>" + data[i].nombrePais + "</h3></div>";
        fila += "<div class='card-body'>";
        fila += "<h4 class='card-title'>Sueldo: "+data[i].sueldo+"</h4>";
        fila += "<p class='card-text'>puesto: " + data[i].puesto + "</p>";
        fila += "</div>";
        fila += "</div>";
        fila += "</div>";
        card.append(fila);
    }
            },
            error: function (xhr, status, error) {
                console.log(error); 
            }
        });
    });
    
  }

  setInterval(myFunction, 20000);