// INICIAR FUNCIONES //
table_body();
list_linea();
list_horario();
list_tarifa();

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
function list_linea() {
    var mySelect = $('#list_linea');
    var url = 'https://www.rendicionsostenedor.cl/list_lineas';
    $.getJSON(url, function (result) {
        mySelect.empty();
        $.each(result, function (i, o) {
            mySelect.append(new Option(o.codigo + " - " + o.nombre.toUpperCase(), o.id_linea));
        });
    });
}

// select horario //
function list_horario() {
    var mySelect = $('#list_horario');
    var url = 'https://www.rendicionsostenedor.cl/list_horarios';
    $.getJSON(url, function (result) {
        mySelect.empty();
        $.each(result, function (i, o) {
            mySelect.append(new Option(o.codigo + " - " + o.observacion.toUpperCase() + " (" + o.hora_inicio + " - " + o.hora_termino + ")", o.id_horario));
        });
    });
}

// select tarifa //
function list_tarifa() {
    var mySelect = $('#list_tarifa');
    var url = 'https://www.rendicionsostenedor.cl/list_tarifas';
    $.getJSON(url, function (result) {
        mySelect.empty();
        $.each(result, function (i, o) {
            mySelect.append(new Option(o.codigo + " - " + o.observacion.toUpperCase() + " ($" + o.tarifa + ")", o.id_tarifa));
        });
    });
}


// CARGAR TABLAS //

// table body //
function table_body() {
    var count = 0;
    $("#table_body").empty();
    var url = 'https://www.rendicionsostenedor.cl/list_recorrido';
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            count++;
            var fil = "<tr>";
            fil += "<td style='display:none'>" + o.id_linea + "</td>";
            fil += "<td>" + o.codigo + "</td>";
            fil += "<td>" + o.nombre + "</td>";
            fil += "<td>" + o.hora_inicio + " a las " + o.hora_termino + "</td>";
            fil += "<td>$" + o.tarifa + "</td>";
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
    var codigo = $("#codigo").val().toUpperCase();
    var observacion = $("#observacion").val().toUpperCase();
    var list_linea = $("#list_linea").val();
    var list_tarifa = $("#list_tarifa").val();
    var list_horario = $("#list_horario").val();
    var paso = true;

    console.log(codigo + " | " + observacion + " | " + list_linea + " | " + list_tarifa + " | " + list_horario)

    if (codigo == "" || observacion == "") {
        $("#msg_nofify_add").css({ color: "red" });
        $("#msg_nofify_add").val("Debe completar todos los campos")
    } else {
        var url = 'https://www.rendicionsostenedor.cl/list_recorrido';
        $.getJSON(url, function (result) {
            $.each(result, function (i, r) {
                if (r.codigo == codigo) {
                    paso = false;
                }
            });
            if (paso == false) {
                $("#msg_nofify").css({ color: "red" });
                $("#msg_nofify").val("El codigo ya se encuentra registrado")
            } else {
                $.ajax({
                    url: 'https://www.rendicionsostenedor.cl/add_recorrido',
                    type: 'post',
                    dataType: 'json',
                    data: { codigo: codigo, observacion: observacion, list_linea: list_linea, list_horario: list_horario, list_tarifa: list_tarifa},
                    success: function (o) {
                        if (o.msg == "1") {
                            table_body();
                            $("#codigo").val("");
                            $("#observacion").val("");
                            $("#list_linea").val(1);
                            $('#list_tarifa').val(1);
                            $('#list_horario').val(1);
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