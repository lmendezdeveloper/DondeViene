// INICIAR FUNCIONES //
table_body();

// CARGAR TABLAS //

// table body //
function table_body() {
    var count = 0;
    $("#table_body").empty();
    try {
        var url = 'https://www.rendicionsostenedor.cl/list_usuario';
        $.getJSON(url, function (result) {
            $.each(result, function (i, o) {
                count++;
                var fil = "<tr>";
                fil += "<td style='display:none'>" + o.id_usuario + "</td>";
                fil += "<td>" + o.nombre.toUpperCase() + "</td>";
                fil += "<td>" + o.apellidos.toUpperCase() + "</td>";
                fil += "<td>" + o.mail.toUpperCase() + "</td>";
                fil += "<td>" + o.telefono + "</td>";
                fil += "<td>" + ((o.id_perfil=="1")?"DESARROLLADOR":((o.id_perfil=="2")?"CLIENTE":"PASAJERO"))+ "</td>";
                fil += "</td>";
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
    } catch (error) {
        console.log("error");
    }

}