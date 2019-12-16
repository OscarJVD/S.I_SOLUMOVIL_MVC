window.onload = function() {
    consultaCliente("");

}

$(document).ready(function() {

    var cliente = $("#nombre_cliente");

    cliente.keyup(function() {
        var valor = cliente.val();
        consultaCliente(valor);

    });

    var resp_cliente = $("#resp_cliente");
    resp_cliente.click(function() {

        if (resp_cliente.val() != "") {

            var val = resp_cliente.val();
            datosCliente(val);
        }

    });


});


function datosCliente(id) {
    $.ajax({
        url: "?c=sale&m=datos_cliente&id=" + id,
        type: "GET",
        success: function(datos) {
            var datos = JSON.parse(datos);
            $("#tel").val(datos.telefono_cliente);
            $("#mail").val(datos.correo_cliente);
            $("#id_cliente").val(datos.id_cliente_PK);

        },
        error: function() {
            $("#resp_cliente").html("Hubo un error inesperado..");


        }
    });
    console.log(id);
}


function consultaCliente(cliente) {
    $.ajax({
        url: "?c=sale&m=buscar_cliente&t=" + cliente,
        type: "GET",
        success: function(data) {
            var datos = JSON.parse(data);
            var mostrar = '';
            mostrar = "<option value=\"\" selected>-- Selecciona un cliente --</option>";
            for (let i of datos) {
                mostrar += "<option value=" + i.id_cliente_PK + ">" + i.nombre_cliente + " " + i.apellido_cliente + "</option><br>";
            }
            $("#resp_cliente").html(mostrar);
        },
        error: function() {
            $("#resp_cliente").html("Cliente No encontrado");


        }
    });
    console.log(cliente);
}