// INICIAR FUNCIONES //
table_body();
$('.yearselect').yearselect();

// FORMATO RUT //
$(function () {
    $("input#rut").rut({ formatOn: 'keyup' });
});

// FUNCION YEAR SELECT//
$('.yearselect').yearselect({
    start: 1970,
    end: 2018,
    order: 'desc'
});

// FORZAR NUMEROS EN INPUT NUMBER //

function forceNumeric() {
    var $input = $(this);
    $input.val($input.val().replace(/[^\d]+/g, ''));
    if (this.value.length > 11) {
        this.value = this.value.slice(0, 11);
    }
}
$('body').on('propertychange input', 'input[type="number"]', forceNumeric);

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

// CARGAR TABLAS //

// table body //
function table_body() {
    var count = 0;
    $("#table_body").empty();
    var url = 'https://www.rendicionsostenedor.cl/list_micros';
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            count++;
            var fil = "<tr>";
            fil += "<td style='display:none'>" + o.id_micros + "</td>";
            fil += "<td>" + o.marca + "</td>";
            fil += "<td>" + o.modelo + "</td>";
            fil += "<td>" + o.ano + "</td>";
            fil += "<td>" + o.patente + "</td>";
            fil += "<td>" + o.capacidad + "</td>";
            fil += "<td align='right'>" + dar_formato(o.kilometraje) + "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>";
            fil += "<td align='right'><div class='dropdown show'>";
            fil += "<a class='dropdown' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:grey;'><i class='fas fa-ellipsis-v'></i></a>";
            fil += "<div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>";
            fil += "<a id='btn_modal_editar_chofer' class='dropdown-item' data-toggle='modal' data-target='#modal_editar_micro' href='#'>Editar</a>";
            fil += "<a id='btn_delete' class='dropdown-item' href='#'>Eliminar</a>";
            fil += "</div>";
            fil += "</div>";
            fil += "</td>";
            fil += "</tr>";
            $("#table_body").append(fil);
        });
        if (count == 0) {
            var fil = "<tr>";
            fil += "<td class='text-center' colspan='7' rowspan='2'>No hay registros</td>";
            fil += "</tr>";
            $("#table_body").append(fil);
        }
    });
}

// CARGAR MODALES //

// modal nuevo chofer //
$("#btn_modal_nuevo_chofer").on("click", function (e) {
    e.preventDefault();
    $("#marca").val("");
    $("#modelo").val("");
    $('.yearselect').yearselect();
    $("#patente").val("");
    $("#capacidad").val("");
    $("#km").val("");
    $("#msg_nofify_add").val("");
    $("#msg_nofify_edit").val("");
    $("#msg_nofify").val("");
});

// modal editar chofer //
$("body").on("click", "#btn_modal_editar_chofer", function (e) {
    e.preventDefault();
    var id_micros = $(this).parents("tr").find("td").html();

    var url = 'https://www.rendicionsostenedor.cl/list_micros';
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            if (o.id_micros = id_micros) {
                $("#id_micro").val(id_micros);
                $("#new_marca").val(o.marca);
                $("#new_modelo").val(o.modelo);
                $('#new_list_ano').val(o.ano);
                $("#new_patente").val(o.patente);
                $("#new_capacidad").val(o.capacidad);
                $("#new_km").val(o.kilometraje);
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
    var marca = $("#marca").val().toUpperCase();
    var modelo = $("#modelo").val().toUpperCase();
    var ano = $("#list_ano").val();
    var patente = $("#patente").val().toUpperCase();
    var capacidad = $("#capacidad").val();
    var km = $("#km").val();
    var paso = true;

    if (marca == "" || modelo == "" || patente == "" || capacidad == "" || km == "") {
        $("#msg_nofify_add").css({ color: "red" });
        $("#msg_nofify_add").val("Debe completar todos los campos")
    } else if (km.length > 6) {
        $("#msg_nofify_add").css({ color: "red" });
        $("#msg_nofify_add").val("Kilometraje maximo 999.999")
    } else if (parseInt(capacidad) < 1 || parseInt(capacidad) > 50) {
        $("#msg_nofify_add").css({ color: "red" });
        $("#msg_nofify_add").val("La capacidad debe ser entre 1 y 50")
    } else {

        var url = 'https://www.rendicionsostenedor.cl/list_micros';
        $.getJSON(url, function (result) {
            $.each(result, function (i, m) {
                if (m.patente == patente) {
                    paso = false;
                }
            });
            if (paso == false) {
                $("#msg_nofify_add").css({ color: "red" });
                $("#msg_nofify_add").val("La patente se encuentra registrada")
            } else {
                $.ajax({
                    url: 'https://www.rendicionsostenedor.cl/add_micros',
                    type: 'post',
                    dataType: 'json',
                    data: { marca: marca, modelo: modelo, ano: ano, patente: patente, capacidad: capacidad, km: km },
                    success: function (o) {
                        if (o.msg == "1") {
                            table_body();
                            $("#marca").val("");
                            $("#modelo").val("");
                            $('.yearselect').yearselect();
                            $("#patente").val("");
                            $("#capacidad").val("");
                            $("#km").val("");
                            $("#msg_nofify_add").val("");
                            $("#msg_nofify_edit").val("");
                            $("#msg_nofify").val("");
                            $('#modal_nueva_micro').modal('hide');
                        } else {
                            $("#msg_nofify_add").css({ color: "red" });
                            $("#msg_nofify_add").val("No se pudo agregar, disculpe las molestias");
                        }
                    },
                    error: function (e) {
                        $("#msg_nofify_add").css({ color: "red" });
                        $("#msg_nofify_add").val("Error de conexión, disculpe las molestias");
                    }
                });
            }
        });
    }
});

// editar //
$("#btn_edit").on("click", function (e) {
    e.preventDefault();
    var id_micro = $("#id_micro").val();
    var marca = $("#new_marca").val().toUpperCase();
    var modelo = $("#new_modelo").val().toUpperCase();
    var ano = $("#new_list_ano").val();
    var patente = $("#new_patente").val().toUpperCase();
    var capacidad = $("#new_capacidad").val();
    var km = $("#new_km").val();
    var paso = true;

    if (marca == "" || modelo == "" || patente == "" || capacidad == "" || km == "") {
        $("#msg_nofify_edit").css({ color: "red" });
        $("#msg_nofify_edit").val("Debe completar todos los campos")
    } else if (km.length > 6) {
        $("#msg_nofify_edit").css({ color: "red" });
        $("#msg_nofify_edit").val("Kilometraje maximo 999.999")
    } else if (parseInt(capacidad) < 1 || parseInt(capacidad) > 50) {
        $("#msg_nofify_edit").css({ color: "red" });
        $("#msg_nofify_edit").val("La capacidad debe ser entre 1 y 50")
    } else {
        var url = 'https://www.rendicionsostenedor.cl/list_micros';
        $.getJSON(url, function (result) {
            $.each(result, function (i, m) {
                if (m.patente == patente && m.id_micros != id_micro) {
                    paso = false;
                }
            });
            if (paso == false) {
                $("#msg_nofify_edit").css({ color: "red" });
                $("#msg_nofify_edit").val("La patente se encuentra registrada")
            } else {
                $.ajax({
                    url: 'https://www.rendicionsostenedor.cl/edit_micros',
                    type: 'post',
                    dataType: 'json',
                    data: { id_micros: id_micro, marca: marca, modelo: modelo, ano: ano, patente: patente, capacidad: capacidad, km: km },
                    success: function (o) {
                        if (o.msg == "1") {
                            table_body();
                            $("#new_marca").val("");
                            $("#new_modelo").val("");
                            $('.yearselect').yearselect();
                            $("#new_patente").val("");
                            $("#new_capacidad").val("");
                            $("#new_km").val("");
                            $("#msg_nofify_add").val("");
                            $("#msg_nofify_edit").val("");
                            $("#msg_nofify").val("");
                            $('#modal_editar_micro').modal('hide');
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
    var id_micro = $(this).parents("tr").find("td").html();

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
                    url: 'https://www.rendicionsostenedor.cl/delete_micros',
                    type: 'post',
                    dataType: 'json',
                    data: { id_micro: id_micro },
                    success: function (o) {
                        if (o.msg == "1") {
                            $("#msg_nofify").css({ color: "green" });
                            $("#msg_nofify").val("Microbus eliminado con exito");
                            table_body();
                        } else {
                            $("#msg_nofify").css({ color: "red" });
                            $("#msg_nofify").val("El microbus esta asociado a un chofer");
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