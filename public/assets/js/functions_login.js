$('#formLogin').submit(function () {
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: base_url + '/AuntetificaUsuario',
        type: 'POST',
        data: formData,
        dataType: 'JSON',
        beforeSend: function () { $("body").dynamicSpinner({ loadingText: "Comprobando...",} ); },
        success: function (response) {
            $("body").dynamicSpinnerDestroy({});
            if (response.estatus == true) {
                window.location.href = base_url + response.ruta;
            }else{
                Swal.fire(response.title,response.text,response.icon);
            }
        },
        error: function () {
            $("body").dynamicSpinnerDestroy({});
            Swal.fire('Error', 'No se ha podido procesar la solicitud', 'error');
        }
    });
});
$('#pruebaFormulario').submit(function (event) {
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: base_url + 'Prueba/RegistrarActualizarUsuario',
        data: formData,
        type: 'POST',
        dataType: 'JSON',
        success: function (response) {
            Swal.fire(response.title, response.text, response.icon);
            if (response.estatus == true) {
                limpiarFormulario();
                $('#idUsuario').val(0);
            }
        },
        error: function () {
            Swal.fire('Error', 'No se ha podido procesar la solicitud', 'error');
        }
    });
});
function limpiarFormulario() {
    $('#idUsuario').val('');
    $('#nombre').val('');
    $('#apellido_paterno').val('');
    $('#apellido_materno').val('');
    $('#email').val('');
    $('#password1').val('');
}