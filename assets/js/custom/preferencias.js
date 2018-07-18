// INICIAR FUNCIONES //
table_body(1);
list_recorrido();

// FORMATO A NUMEROS //
function dar_formato(num) {
    var cadena = ""; var aux;
    var cont = 1, m, k;
    if (num < 0) aux = 1; else aux = 0;
    num = num.toString();
    for (m = num.length - 1; m >= 0; m--) {
        cadena = num.charAt(m) + cadena;
        if (cont % 3 == 0 && m > aux) cadena = "." + cadena; else cadena = cadena;
        if (cont == 3) cont = 1; else cont++;
    }
    cadena = cadena.replace(/.,/, ",");
    return cadena;
}

// CARGAR SELECT //

// select linea //
function list_recorrido() {
    var mySelect = $('#list_recorrido');
    var url = 'https://www.rendicionsostenedor.cl/list_recorrido';
    $.getJSON(url, function (result) {
        mySelect.empty();
        $.each(result, function (i, o) {
            mySelect.append(new Option(o.codigo + " - " + o.observacion.toUpperCase(), o.id_recorrido));
        });
    });
}

// CARGAR TABLAS //

// table body //
function table_body() {
    var count = 0;
    $("#table_body").empty();
    var url = 'https://www.rendicionsostenedor.cl/list_preferencias';
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
                count++;
                var fil = "<tr>";
                fil += "<td style='display:none'>" + o.id_trayecto + "</td>";
                fil += "<td>" + o.nombre + " " +o.apellidos+"</td>";
                fil += "<td>" + o.fecha.substring(8, 10) + "-" + o.fecha.substring(5, 7) + "-" + o.fecha.substring(0, 4) + "</td>";
                fil += "<td>" + o.hora + "</td>";
                fil += "<td>" + o.observacion + "</td>";
                /*
                fil += "<td align='right'><div class='dropdown show'>";
                fil += "<a class='dropdown' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:grey;'><i class='fas fa-ellipsis-v'></i></a>";
                fil += "<div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>";
                fil += "<a id='btn_modal_editar_linea' class='dropdown-item' data-toggle='modal' data-target='#modal_editar_linea' href='#'>Editar</a>";
                fil += "<a id='btn_delete' class='dropdown-item' href='#'>Eliminar</a>";
                fil += "</div>";
                fil += "</div>";
                fil += "</td>";
                */
                fil += "</tr>";
                $("#table_body").append(fil);
        });
        if (count == 0) {
            var fil = "<tr>";
            fil += "<td class='text-center' colspan='5' rowspan='2'>No hay registros</td>";
            fil += "</tr>";
            $("#table_body").append(fil);
        }
    });
}

// FUNCIONES ON CHANGE //

// on change mes //
$('select#list_recorrido').on('change', function () {
    var recorrido = $(this).val();
    console.log(recorrido);
    // cargar tabla //
    table_body(recorrido);
});
// CARGAR MODALES //

// modal editar linea //
$("body").on("click", "#btn_modal_editar_linea", function (e) {
    e.preventDefault();
    var id_linea = $(this).parents("tr").find("td").html();

    var url = 'https://www.rendicionsostenedor.cl/list_recorrido';
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            if (o.id_linea = id_linea) {
                $("#id_linea").val(id_linea);
                $("#new_codigo").val(o.codigo);
                $("#new_nombre").val(o.nombre);
                $('#new_list_estado').val(o.estado);
                $("#new_observacion").val(o.observacion);
            }
        });
    });
    $("#msg_nofify_add").val("");
    $("#msg_nofify_edit").val("");
    $("#msg_nofify").val("");
});

// BOTONES //

// agregar //
$("#btn_add").on("click", function (e) {
    e.preventDefault();
    var list_recorrido = $("#list_recorrido").val().toUpperCase();
    var orden = $("#orden").val();
    var latitud = $("#latitud").val();
    var longitud = $("#longitud").val();
    var paso = true;

    if (orden == "" || latitud == "" || longitud == "") {
        $("#msg_nofify_add").css({ color: "red" });
        $("#msg_nofify_add").val("Debe completar todos los campos")
    } else {
        var url = 'https://www.rendicionsostenedor.cl/list_trayecto';
        $.getJSON(url, function (result) {
            $.each(result, function (i, t) {
                if (t.orden == orden && t.id_recorrido == list_recorrido) {
                    paso = false;
                }
            });
            if (paso == false) {
                $("#msg_nofify").css({ color: "red" });
                $("#msg_nofify").val("El orden ya se encuentra registrado")
            } else {
                $.ajax({
                    url: 'https://www.rendicionsostenedor.cl/add_trayecto',
                    type: 'post',
                    dataType: 'json',
                    data: { list_recorrido: list_recorrido, orden: orden, latitud: latitud, longitud: longitud },
                    success: function (o) {
                        if (o.msg == "1") {
                            table_body(list_recorrido);
                            $("#orden").val("");
                            $("#latitud").val("");
                            $("#longitud").val("");
                            $("#msg_nofify_edit").val("");
                            $("#msg_nofify").css({ color: "green" });
                            $("#msg_nofify").val("Agregado con exito");
                        } else {
                            $("#msg_nofify").css({ color: "red" });
                            $("#msg_nofify").val("No se pudo agregar, disculpe las molestias");
                        }
                    },
                    error: function (e) {
                        $("#msg_nofify").css({ color: "red" });
                        $("#msg_nofify").val("Error de conexión, disculpe las molestias");
                    }
                });
            }
        });
    }
});

// editar //
$("#btn_edit").on("click", function (e) {
    e.preventDefault();
    var id_linea = $("#id_linea").val();
    var codigo = $("#new_codigo").val().toUpperCase();
    var nombre = $("#new_nombre").val().toUpperCase();
    var list_estado = $("#new_list_estado").val();
    var observacion = $("#new_observacion").val().toUpperCase();
    var paso = true;

    if (codigo == "" || nombre == "" || observacion == "") {
        $("#msg_nofify_edit").css({ color: "red" });
        $("#msg_nofify_edit").val("Debe completar todos los campos")
    } else {
        var url = 'https://www.rendicionsostenedor.cl/list_recorrido';
        $.getJSON(url, function (result) {
            $.each(result, function (i, l) {
                if (l.codigo == codigo && l.id_linea != id_linea) {
                    paso = false;
                }
            });
            if (paso == false) {
                $("#msg_nofify_edit").css({ color: "red" });
                $("#msg_nofify_edit").val("El codigo ya se encuentra registrado")
            } else {
                $.ajax({
                    url: 'https://www.rendicionsostenedor.cl/edit_lineas',
                    type: 'post',
                    dataType: 'json',
                    data: { id_linea: id_linea, codigo: codigo, nombre: nombre, list_estado: list_estado, observacion: observacion },
                    success: function (o) {
                        if (o.msg == "1") {
                            table_body();
                            $("#new_codigo").val("");
                            $("#new_nombre").val("");
                            $('#new_list_estado').val(1);
                            $("#new_observacion").val("");
                            $("#msg_nofify_add").val("");
                            $("#msg_nofify_edit").val("");
                            $("#msg_nofify").val("");
                            $('#modal_editar_linea').modal('hide');
                        } else {
                            $("#msg_nofify_edit").css({ color: "red" });
                            $("#msg_nofify_edit").val("No se pudo editar, disculpe las molestias");
                        }
                    },
                    error: function (e) {
                        $("#msg_nofify_edit").css({ color: "red" });
                        $("#msg_nofify_edit").val("Error de conexión, disculpe las molestias");
                    }
                });
            }
        });
    }
});

// eliminar //
$("body").on("click", "#btn_delete", function (e) {
    e.preventDefault();
    var id_linea = $(this).parents("tr").find("td").html();

    swal({
        title: "¿Esta Seguro?",
        text: "Se eliminará la micro",
        icon: "warning",
        buttons: ["Cancelar", "Si"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: 'https://www.rendicionsostenedor.cl/delete_lineas',
                    type: 'post',
                    dataType: 'json',
                    data: { id_linea: id_linea },
                    success: function (o) {
                        if (o.msg == "1") {
                            $("#msg_nofify").css({ color: "green" });
                            $("#msg_nofify").val("Linea eliminada con exito");
                            table_body();
                        } else {
                            $("#msg_nofify").css({ color: "red" });
                            $("#msg_nofify").val("La linea esta siendo usada actualmente");
                        }
                    },
                    error: function () {
                        $("#msg_nofify").css({ color: "red" });
                        $("#msg_nofify").val("Error de conexión, disculpe las molestias");
                    }
                });
            }
        });
});