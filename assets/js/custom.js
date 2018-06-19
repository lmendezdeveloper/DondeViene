$(document).ready(function() {
    
    var base_url = 'http://localhost/DondeViene/';
    
    $("#btn_login").on("click",function(e){
        e.preventDefault();
        var mail = $("#mail").val();
        var pass = $("#pass").val();
        
        $.ajax({
            url: 'signin',
            type:'post',
            dataType:'json',
            data:{mail:mail, pass:pass},
            success:function(o){
                if (o.msg == "1") {
                    window.location.href = base_url+"home";
                    Materialize.toast("Usuario Valido","4000");
                } else {
                    Materialize.toast("Datos Incorrectos","4000");
                }
            },
            error:function(){
                Materialize.toast("Acceso Denegado","4000");
            }
        });
    });

    $("#item_chofer").on("click",function(e){
        e.preventDefault();
        $("main").load(base_url+"chofer");
        $("a").removeClass("active-page");
        $("#item_home").addClass("active-page");
    });

    $("#item_microbus").on("click",function(e){
        e.preventDefault();
        $("main").load(base_url+"microbus");
        $("a").removeClass("active-page");
        $("#item_home").addClass("active-page");
    });

    $("#item_linea").on("click",function(e){
        e.preventDefault();
        $("main").load(base_url+"linea");
        $("a").removeClass("active-page");
        $("#item_home").addClass("active-page");
    });

    $("#item_tarifa").on("click",function(e){
        e.preventDefault();
        $("main").load(base_url+"tarifa");
        $("a").removeClass("active-page");
        $("#item_home").addClass("active-page");
    });

    $("#item_horario").on("click",function(e){
        e.preventDefault();
        $("main").load(base_url+"horario");
        $("a").removeClass("active-page");
        $("#item_home").addClass("active-page");
    });

});
