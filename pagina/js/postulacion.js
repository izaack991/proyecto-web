$(document).ready(function(){
    $.ajax({
        url: '../php/postulacion.php',
        type: 'GET',
        dataType: 'json',
        success: function(response){
            // Llenar la tabla con los datos obtenidos
            var tabla = $('#tabla_datos');
            $.each(response, function(index, data){
                // Crear una nueva fila
                var fila = $('<tr class="table-light"></tr>');

                // Crear los botones en los dos primeros campos
                var botonVer = $('<form action="seleccionar_postulacion.php" method="POST"><input type="hidden" name="txt_id_postulacion" value="' + data.id_postulacion + '"><input type="hidden" name="txt_id_usuario" value="' + data.id_usuario + '"><td class="text-center"><center><input type="submit" value="Ver" class="btn btn-info"></center></td></form>');
                var botonCerrar = $('<form action="postulacion.php" method="POST"><input type="hidden" name="btn_cerrar" value="0"><input type="hidden" name="txt_id_postulacion" value="' + data.id_postulacion + '"><td class="text-center"><right><input type="button" value="Cerrar" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2"></right></td></form>');

                // Crear el resto de las celdas de la fila
                var celda1 = $('<td>' + data.nombreUsuario + '</td>');
                var celda2 = $('<td>' + data.correo + '</td>');
                var celda3 = $('<td>' + data.puesto + '</td>');

                // Agregar los botones y celdas a la fila
                fila.append(celda1, celda2, celda3);
                fila.find('td:first').append(botonVer);
                fila.find('td:eq(1)').append(botonCerrar);

                // Agregar la fila a la tabla
                tabla.append(fila);
            });
        },
        error: function(xhr, status, error){
            console.error(xhr.responseText);
        }
    });
});