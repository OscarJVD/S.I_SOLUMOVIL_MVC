window.onload = function() {
    consultaCliente("");

}

var datos_venta = null;
var descuento = 0;
var total = 0;
var listado_DV = [];




$(document).ready(function() {

    var cliente = $("#nombre_cliente");
    cliente.keyup(function() {
        var valor = cliente.val();
        consultaCliente(valor);
    });


    var resp_cliente = $("#resp_cliente");
    resp_cliente.click(function() {
        if (resp_cliente.val() != "") {
            $("#seleccion_venta").css({ "display": "" });
            var val = resp_cliente.val();
            datosCliente(val);
        }
    });


    // busqueda de productos detalle de venta
    $("#buscar_producto").keyup(function() {

        var valor = $(this).val();
        consultaProductoDV(valor);

    });

    // busqueda de servicios detalle de venta
    $("#buscar_servicio").keyup(function() {

        var valor = $(this).val();
        consultaServicioDV(valor);

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
    // console.log(id);
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
    // console.log(cliente);
}



function consultaProductoDV(value) {
    $.ajax({
        url: "?c=sale&m=producto_DV&value=" + value,
        type: "GET",
        success: function(data) {

            if (data == "") {

                var error = '<div class="alert alert-danger mt-3" role="alert">';
                error += "No se ha encontrado ningun producto.";
                error += "</div>";
                $("#detalle_venta").html(error);

            } else {
                var datos = JSON.parse(data);
                mostrar = '<div class="table-responsive mt-3">';
                mostrar += '<table class="table">';
                mostrar += "<tr class='table-info '>";
                mostrar += "<td>Codigo</td>";
                mostrar += "<td>Descripcion</td>";
                mostrar += "<td>Stock</td>";
                mostrar += "<td>Cantidad</td>";
                mostrar += "<td>Precio</td>";
                mostrar += "<td>Añadir</td>";
                mostrar += "<tr>";
                for (let i of datos) {
                    mostrar += "<tr>";
                    mostrar += "<td>" + i.codigo_producto_PK + "</td>";
                    mostrar += "<td>" + i.nombre_categoria_producto + " " + i.descripcion_marca_producto + " " + i.referencia_producto + "</td>";
                    mostrar += "<td>" + i.stock_producto + "</td>";
                    mostrar += "<td class='float-right'><input type='text' id='cantidad" + i.id_producto_PK + "' class='form-control' style=\"width:50%\" value=" + 1 + "></td>";
                    mostrar += "<td><input type='text' id='precio" + i.id_producto_PK + "' class='form-control' width=3 value=" + i.precio_producto + "></td>";
                    mostrar += "<td><button type='button' class='btn border' onclick=\"añadir_detalle(" + i.id_producto_PK + "," + "'" + i.codigo_producto_PK + "'" + "," + 1 + ")\"><i class='fas fa-cart-plus'></i></button></td>";
                    mostrar += "</tr>";
                }

                mostrar += "</table>";
                mostrar += "</div>";


                $("#detalle_venta").html(mostrar);
            }
        },
        error: function() {
            $("#detalle_venta").html("No hay productos");


        }
    });
    // console.log(value);
}

function consultaServicioDV(value) {
    $.ajax({
        url: "?c=sale&m=servicio_DV&value=" + value,
        type: "GET",
        success: function(data) {

            if (data == "") {

                var error = '<div class="alert alert-danger mt-3" role="alert">';
                error += "No se ha encontrado ningun Servicio.";
                error += "</div>";
                $("#detalle_venta_s").html(error);

            } else {
                var datos = JSON.parse(data);
                mostrar = '<div class="table-responsive mt-3">';
                mostrar += '<table class="table">';
                mostrar += "<tr class='table-info '>";
                mostrar += "<td>Codigo</td>";
                mostrar += "<td>Categoria</td>";
                mostrar += "<td>Descripcion</td>";
                mostrar += "<td>Precio</td>";
                mostrar += "<td>Añadir</td>";
                mostrar += "<tr>";
                for (let i of datos) {
                    mostrar += "<tr>";
                    mostrar += "<td>" + i.id_servicio_PK + "</td>";
                    mostrar += "<td>" + i.nombre_categoria_servicio + "</td>";
                    mostrar += "<td>" + i.descripcion_servicio + "</td>";
                    mostrar += "<td><input type='text' id='precio" + i.id_servicio_PK + "' class='form-control' width=3 value=" + i.precio_servicio + "></td>";
                    mostrar += "<td><button type='button' class='btn border' onclick=\"añadir_detalle(" + i.id_servicio_PK + "," + "'" + i.id_servicio_PK + "'" + "," + 2 + ")\"><i class='fas fa-cart-plus'></i></td>";
                    mostrar += "</tr>";
                }

                mostrar += "</table>";
                mostrar += "</div>";


                $("#detalle_venta_s").html(mostrar);
            }
        },
        error: function() {
            $("#detalle_venta").html("No hay productos");


        }
    });
    // console.log(value);
}


function añadir_detalle(id, cod, type) {

    if (type == 1) {
        var url_DV = "?c=sale&m=producto_getone_DV&id=" + id;
        var name = "Producto";
    } else {
        var name = "Servicio";
        var url_DV = "?c=sale&m=servicio_getone_DV&id=" + id;

    }
    $.ajax({
        url: url_DV,
        type: "GET",
        success: function(data) {
            var datos = JSON.parse(data);
            $("#registrar_venta").removeAttr("disabled");
            $("#t_detalle_venta").css("display", "");
            if (type == 1) {

                var retorno = listado_DV.push({
                    tipo: type,
                    id: datos.id_producto_PK,
                    codigo: datos.codigo_producto_PK,
                    categoria: datos.nombre_categoria_producto,
                    marca: datos.descripcion_marca_producto,
                    referencia: datos.referencia_producto,
                    cantidad: $("#cantidad" + id).val(),
                    precio: $("#precio" + id).val()
                });
            } else {
                // solo para este caso la propiedad de marca funcionara cono la descripcion
                var retorno = listado_DV.push({
                    tipo: type,
                    id: datos.id_servicio_PK,
                    codigo: "",
                    categoria: datos.nombre_categoria_servicio,
                    marca: datos.descripcion_servicio,
                    referencia: "",
                    cantidad: 1,
                    precio: $("#precio" + id).val()
                });
            }

            if (retorno) {
                var success = '<div class="alert alert-primary mt-3" role="alert">';
                success += "El " + name + " de codigo: " + cod + " ha sido agregado correctamente.";
                success += "</div>";
                if (type == 1) {
                    $("#cart_detalle_venta").html(success);
                } else {
                    $("#cart_detalle_venta_s").html(success);
                }

                detalleVentaComponent();

            } else {
                var error = '<div class="alert alert-primary mt-3" role="alert">';
                error += "No se pudo agregar el producto";
                error += "</div>";
                $("#cart_detalle_venta").html(error);

            }
        },
        error: function() {
            $("#cart_detalle_venta").html("Error");


        }
    });

    // console.log(listado_DV);
}


function eliminar_detalle(index) {

    listado_DV.splice(index, 1);

    detalleVentaComponent();

}



function detalleVentaComponent() {

    var mostrar_t = "";
    var subtotal = null;
    var index = 0;
    for (let i of listado_DV) {

        subtotal = Number(subtotal) + Number(i.precio * i.cantidad);
        if (i.tipo == 1) {
            mostrar_t += "<tr>";
            mostrar_t += "<td>" + i.codigo + "</td>";
            mostrar_t += "<td class='text-primary'>" + (i.tipo == 1 ? 'Producto' : 'Servicio'); + "</td>";
            mostrar_t += "<td>" + i.cantidad + "</td>";
            mostrar_t += "<td>" + i.categoria + " " + i.marca + " " + i.referencia + "</td>";
            mostrar_t += "<td>" + number_format(i.precio, 2) + "</td>";
            mostrar_t += "<td>" + number_format(i.cantidad * i.precio, 2) + " <button  type='button' class='btn border float-right' onclick=\"eliminar_detalle(" + index + ")\"><i class='far fa-trash-alt'></i></button></td>";
            mostrar_t += "</tr>";
        } else {
            mostrar_t += "<tr>";
            mostrar_t += "<td>" + i.id + "</td>";
            mostrar_t += "<td class='text-info'>" + (i.tipo == 1 ? 'Producto' : 'Servicio'); + "</td>";
            mostrar_t += "<td>" + i.cantidad + "</td>";
            mostrar_t += "<td>" + i.categoria + "</td>";
            mostrar_t += "<td>" + number_format(i.precio, 2) + "</td>";
            mostrar_t += "<td>" + number_format(i.cantidad * i.precio, 2) + " <button  type='button' class='btn border float-right' onclick=\"eliminar_detalle(" + index + ")\"><i class='far fa-trash-alt'></i></button></td>";

            mostrar_t += "</tr>";

        }

        index++;
    }


    mostrar_t += '<tr>';
    mostrar_t += '<th class="text-right mr-3" colspan="5"> <span id="venta_res_1" class="mr-md-3" > SUBTOTAL $</span></th>';
    mostrar_t += '<td>' + number_format(subtotal, 2) + '</td>';
    mostrar_t += '</tr>';
    mostrar_t += '<tr>';
    mostrar_t += '<th class="text-right mr-3" colspan="5"> <span id="venta_res_2" class="mr-md-3" > DESCUENTO $</span></th>';
    mostrar_t += '<td><span id="value_D">0.00</span>';
    mostrar_t += '<span style="display:none" id="descuento"><input type="text" id="valor_descuento" style="width:auto" class="form-control float-left" value=0 ></span>';
    mostrar_t += '<button  type="button" id="descuento_btn" class="btn border float-right"><i class="fas fa-pencil-alt"></i></button>';
    mostrar_t += '<button  style="display:none" type="button" id="check_btn" class="btn border float-right"><i class="fas fa-check-square"></i></button>';

    mostrar_t += '</td>';
    mostrar_t += '</tr>';
    mostrar_t += '<tr>';
    mostrar_t += '<th class="text-right mr-3" colspan="5"> <span id="venta_res_3" class="mr-md-3" > TOTAL $</span></th>';
    mostrar_t += '<td><span id="total">' + number_format(subtotal, 2) + '</span></td>';
    mostrar_t += '</tr>';

    $("#mostrar_DV").html(mostrar_t);



    // agragr descuento
    $("#descuento_btn").click(function() {

        $("#descuento_btn").css({ "display": "none" });
        $("#value_D").css({ "display": "none" });
        $("#check_btn").css({ "display": "" });
        $("#descuento").css({ "display": "" });

    });

    total = (parseInt(subtotal) - parseInt(descuento));

    datos_venta = {
        subtotal: subtotal,
        descuento: descuento,
        total: total
    };

    $("#check_btn").click(function() {

        descuento = $("#valor_descuento").val();
        total = (parseInt(subtotal) - parseInt(descuento));
        $("#descuento_btn").css({ "display": "" });
        $("#value_D").css({ "display": "" }).html(number_format(descuento, 2));
        $("#check_btn").css({ "display": "none" });
        $("#descuento").css({ "display": "none" });
        $("#total").html(number_format(total, 2));

        datos_venta = {
            subtotal: subtotal,
            descuento: descuento,
            total: total
        };
    });



}
//  formatear numeros
function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0)
        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
}

// REGISTRO DE LA VENTA

$(document).ready(function() {
    $("#registrar_venta").click(function() {

        var id_cliente = $("#id_cliente").val();
        var id_usuario = $("#id_user").val();
        var estado = $("#estado").val();
        var detalle_venta = [];

        for (let row of listado_DV) {
            detalle_venta.push({
                tipo: row.tipo,
                id: row.id,
                cantidad: row.cantidad,
                precio: row.precio
            });
        }
        var venta = {
            id: null,
            cliente: id_cliente,
            usuario: id_usuario,
            estado: estado,
            subtotal: datos_venta.subtotal,
            descuento: datos_venta.descuento,
            total: datos_venta.total,
            detalleventa: detalle_venta
        };

        $.ajax({
            url: "?c=sale&m=nueva_venta",
            type: "POST",
            data: "data=" + JSON.stringify(venta),
            success: function(data) {

                var resp = '<div class="alert alert-success" role="alert">';
                resp += 'Factura creada exitosamente!'
                resp += '</div>';

                $("#resp_venta").html(resp);
                $("#registrar_venta").attr("disabled", "");
                $("#btn_new").html('<a href="?c=sale&m=create" class="btn btn-warning">Nueva Factura</a>');


            },
            error: function() {
                alert("mal");

            }
        });


    });
});