// INICIAR FUNCIONES //
table_body();

// FORMATO RUT //
$(function () {
    $("input#rut").rut({ formatOn: 'keyup' });
});

// CARGAR TABLAS //

// table body //
function table_body() {
    var count = 0;
    $("#table_body").empty();
    var url = 'list_choferes';
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            count++;
            var fil = "<tr>";
            fil += "<td style='display:none'>" + o.id_chofer + "</td>";
            fil += "<td>" + $.formatRut(o.rut) + "</td>";
            fil += "<td>" + o.nombre + "</td>";
            fil += "<td>" + o.apellidop + " " + o.apellidom + "</td>";
            fil += "<td>" + o.telefono + "</td>";
            fil += "<td>" + o.mail + "</td>";
            fil += "<td align='right'><div class='dropdown show'>";
            fil += "<a class='dropdown' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:grey;'><i class='fas fa-ellipsis-v'></i></a>";
            fil += "<div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>";
            fil += "<a id='btn_modal_editar_chofer' class='dropdown-item' data-toggle='modal' data-target='#modal_editar_chofer' href='#'>Editar</a>";
            fil += "<a id='btn_delete' class='dropdown-item' href='#'>Eliminar</a>";
            fil += "</div>";
            fil += "</div>";
            fil += "</td>";
            fil += "</tr>";
            $("#table_body").append(fil);
        });
        if (count == 0) {
            var fil = "<tr>";
            fil += "<td class='text-center' colspan='6' rowspan='2'>No hay registros</td>";
            fil += "</tr>";
            $("#table_body").append(fil);
        }
    });
}

// CARGAR MODALES //

// modal nuevo chofer //
$("#btn_modal_nuevo_chofer").on("click", function (e) {
    e.preventDefault();
    $("#rut").val("");
    $("#nombres").val("");
    $("#apellidop").val("");
    $("#apellidom").val("");
    $("#celular").val("");
    $("#correo").val("");
    $("#msg_nofify_add").val("");
    $("#msg_nofify_edit").val("");
    $("#msg_nofify").val("");
});

// modal editar chofer //
$("body").on("click", "#btn_modal_editar_chofer", function (e) {
    e.preventDefault();
    var id_chofer = $(this).parents("tr").find("td").html();

    var url = 'list_choferes';
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            if (o.id_chofer = id_chofer) {
                $("#id_chofer").val(id_chofer);
                $("#new_rut").val($.formatRut(o.rut));
                $("#new_nombres").val(o.nombre);
                $("#new_apellidop").val(o.apellidop);
                $("#new_apellidom").val(o.apellidom);
                $("#new_celular").val(o.telefono);
                $("#new_correo").val(o.mail);
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
    var rut = $("#rut").val().toUpperCase();
    var nombres = $("#nombres").val().toUpperCase();
    var apellidop = $("#apellidop").val().toUpperCase();
    var apellidom = $("#apellidom").val().toUpperCase();
    var celular = $("#celular").val().toUpperCase();
    var correo = $("#correo").val().toUpperCase();
    var paso = true;
    var paso2 = true;

    if (rut == "" || nombres == "" || apellidop == "" || apellidom == "" || celular == "" || correo == "") {
        $("#msg_nofify_add").css({ color: "red" });
        $("#msg_nofify_add").val("Debe completar todos los campos")
    } else if (celular.length != 9) {
        $("#msg_nofify_add").css({ color: "red" });
        $("#msg_nofify_add").val("Debe ingresar 9 digitos en celular")
    } else {
        if ($.validateRut(rut)) {
            $.validateRut(rut, function (r, dv) {
                var rut = (r + "-" + dv);
                var url = 'list_choferes';
                $.getJSON(url, function (result) {
                    $.each(result, function (i, u) {
                        if (u.rut == rut) {
                            paso = false;
                        }
                        if (u.mail == correo) {
                            paso2 = false;
                        }
                    });
                    if (paso == false) {
                        $("#msg_nofify_add").css({ color: "red" });
                        $("#msg_nofify_add").val("El rut se encuentra registrado")
                    } else {
                        if (paso2 == false) {
                            $("#msg_nofify_add").css({ color: "red" });
                            $("#msg_nofify_add").val("El correo se encuentra registrado")
                        } else {
                            $.ajax({
                                url: 'add_choferes',
                                type: 'post',
                                dataType: 'json',
                                data: { rut: rut, nombres: nombres, apellidop: apellidop, apellidom: apellidom, celular: celular, correo: correo },
                                success: function (o) {
                                    if (o.msg == "1") {
                                        table_body();
                                        $("#rut").val("");
                                        $("#nombres").val("");
                                        $("#apellidop").val("");
                                        $("#apellidom").val("");
                                        $("#celular").val("");
                                        $("#correo").val("");
                                        $("#msg_nofify_add").val("");
                                        $("#msg_nofify_edit").val("");
                                        $("#msg_nofify").val("");
                                        $('#modal_nuevo_chofer').modal('hide');
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
                    }
                });
            });
        } else {
            $("#msg_nofify_add").css({ color: "red" });
            $("#msg_nofify_add").val("Rut invalido");
        }
    }
});

// editar //
$("#btn_edit").on("click", function (e) {
    e.preventDefault();
    var id_chofer = $("#id_chofer").val();
    var nombres = $("#new_nombres").val().toUpperCase();
    var apellidop = $("#new_apellidop").val().toUpperCase();
    var apellidom = $("#new_apellidom").val().toUpperCase();
    var celular = $("#new_celular").val().toUpperCase();
    var correo = $("#new_correo").val().toUpperCase();
    var paso = true;
    var paso2 = true;

    if (nombres == "" || apellidop == "" || apellidom == "" || celular == "" || correo == "") {
        $("#msg_nofify_edit").css({ color: "red" });
        $("#msg_nofify_edit").val("Debe completar todos los campos")
    } else if (celular.length != 9) {
        $("#msg_nofify_edit").css({ color: "red" });
        $("#msg_nofify_edit").val("Debe ingresar 9 digitos en celular")
    } else {
        var url = 'list_choferes';
        $.getJSON(url, function (result) {
            $.each(result, function (i, u) {
                if (u.mail == correo && u.id_chofer != id_chofer) {
                    paso2 = false;
                }
            });
            if (paso == false) {
                $("#msg_nofify_edit").css({ color: "red" });
                $("#msg_nofify_edit").val("El rut se encuentra registrado")
            } else {
                if (paso2 == false) {
                    $("#msg_nofify_edit").css({ color: "red" });
                    $("#msg_nofify_edit").val("El correo se encuentra registrado")
                } else {
                    $.ajax({
                        url: 'edit_choferes',
                        type: 'post',
                        dataType: 'json',
                        data: { id_chofer: id_chofer, nombres: nombres, apellidop: apellidop, apellidom: apellidom, celular: celular, correo: correo },
                        success: function (o) {
                            if (o.msg == "1") {
                                table_body();
                                $("#new_rut").val("");
                                $("#new_nombres").val("");
                                $("#new_apellidop").val("");
                                $("#new_apellidom").val("");
                                $("#new_celular").val("");
                                $("#new_correo").val("");
                                $("#msg_nofify_add").val("");
                                $("#msg_nofify_edit").val("");
                                $("#msg_nofify").val("");
                                $('#modal_editar_chofer').modal('hide');
                            } else {
                                $("#msg_nofify_add").css({ color: "red" });
                                $("#msg_nofify_add").val("No se pudo editar, disculpe las molestias");
                            }
                        },
                        error: function (e) {
                            $("#msg_nofify_edit").css({ color: "red" });
                            $("#msg_nofify_edit").val("Error de conexión, disculpe las molestias");
                        }
                    });
                }
            }
        });
    }
});

// eliminar //
$("body").on("click", "#btn_delete", function (e) {
    e.preventDefault();
    var id_chofer = $(this).parents("tr").find("td").html();

    swal({
        title: "¿Esta Seguro?",
        text: "Se eliminará el chofer",
        icon: "warning",
        buttons: ["Cancelar", "Si"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: 'delete_choferes',
                    type: 'post',
                    dataType: 'json',
                    data: { id_chofer: id_chofer },
                    success: function (o) {
                        if (o.msg == "1") {
                            $("#msg_nofify").css({ color: "green" });
                            $("#msg_nofify").val("Chofer eliminado con exito");
                            table_body();
                        } else {
                            $("#msg_nofify").css({ color: "red" });
                            $("#msg_nofify").val("El chofer esta asociado a un microbus");
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