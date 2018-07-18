$(document).ready(function () {

    var base_url = 'http://localhost/DondeViene/';

    $("#btn_login").on("click", function (e) {
        e.preventDefault();
        var mail = $("#mail").val();
        var pass = $("#pass").val();

        $.ajax({
            url: 'signin',
            type: 'post',
            dataType: 'json',
            data: { mail: mail, pass: pass },
            success: function (o) {
                if (o.msg == "1") {
                    window.location.href = base_url;
                } else {
                    alert("Datos Incorrecto");
                }
            },
            error: function () {
                alert("Acceso Denegado");
            }
        });
    });

    $("#item_inicio").on("click", function (e) {
        e.preventDefault();
        $("main").load(base_url + "home");
    });

    $("#item_usuarios").on("click", function (e) {
        e.preventDefault();
        $("main").load(base_url + "modulo_usuarios");
    });

    $("#item_choferes").on("click", function (e) {
        e.preventDefault();
        $("main").load(base_url + "modulo_choferes");
    });

    $("#item_micros").on("click", function (e) {
        e.preventDefault();
        $("main").load(base_url + "modulo_micros");
    });

    $("#item_lineas").on("click", function (e) {
        e.preventDefault();
        $("main").load(base_url + "modulo_lineas");
    });

    $("#item_horarios").on("click", function (e) {
        e.preventDefault();
        $("main").load(base_url + "modulo_horarios");
    });

    $("#item_tarifas").on("click", function (e) {
        e.preventDefault();
        $("main").load(base_url + "modulo_tarifas");
    });
    
    $("#item_recorrido").on("click", function (e) {
        e.preventDefault();
        $("main").load(base_url + "modulo_recorrido");
    });

    $("#item_trayecto").on("click", function (e) {
        e.preventDefault();
        $("main").load(base_url + "modulo_trayecto");
    });

    $("#item_preferencias").on("click", function (e) {
        e.preventDefault();
        $("main").load(base_url + "modulo_preferencia");
    });

    $("#item_comentarios").on("click", function (e) {
        e.preventDefault();
        $("main").load(base_url + "modulo_comentario");
    });

    $("#item_preferenciasxfecha").on("click", function (e) {
        e.preventDefault();
        $("main").load(base_url + "modulo_preferenciaxfecha");
    });

});