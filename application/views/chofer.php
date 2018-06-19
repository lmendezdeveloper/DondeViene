<div class="row">
    <div class="col s12">
        <div class="card-panel">
            <p>
                <div class="col s6">
                    <h4>Choferes</h4>
                </div>
            </p>
            <form method="post" class="row" id="form_chofer">
                <div id="div_head" class="col s12">
                    <div class="input-field col s2">
                            <input id="rut" type="text" name="rut" maxlength="15"/>
                            <label for="rut">Rut</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="nombre" type="text" name="nombre" maxlength="100"/>
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="apellidos" type="text" name="apellidos" maxlength="100"/>
                        <label for="apellidos">Apellidos</label>
                    </div>
                    <div class="input-field col s2">
                        <a id="btn_agregar" class="btn-floating waves-effect waves-light"><i class="material-icons">add</i></a>
                    </div>
                </div>
            </form> 
            <table class="striped">
                <thead>
                <tr>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>

                <tbody id="table_body">
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal editar -->
<div id="modal_1" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Editar Chofer</h4>
        <p>
        <form method="post">
            <input type="hidden" id="id_chofer"/>
            <input type="text" id="nombre_chofer" placeholder="Nombre del Chofer"/>
            <input type="text" id="apellidos_chofer" placeholder="Apellidos del Chofer"/>
            <button class="btn blue accent-1" id="editar_chofer">Actualizar</button>
        </form>
        </p>
    </div>
</div>

<script>
    table_body();

    function table_body(){
        var url = 'lista_choferes';
        $.getJSON(url, function(result){
            $("#table_body").empty();
            $.each(result, function (i,o){
                var fil = "<tr>";
                fil += "<td>"+o.RUT+"</td>";
                fil += "<td>"+o.NOMBRE+"</td>";
                fil += "<td>"+o.APELLIDOS+"</td>";
                fil += "<td style='display:none'>"+o.ID_CHOFER+"</td>";
                fil += "<td class='center-align'> <a id='modal_edit' href='#' class='btn-floating btn blue'><i class='large material-icons'>mode_edit</i></a></td>";
                fil += "<td class='center-align'> <a id='eliminar_chofer' href='#' class='btn-floating btn red'><i class='large material-icons'>delete</i></a></td>";
                fil += "</tr>";
                $("#table_body").append(fil);
            });
        });
    }

    $("#btn_agregar").click(function(e) {
        e.preventDefault();
        var form = $("#form_chofer")[0];
        var data = new FormData(form);

        $.ajax({
            url: 'agregar_chofer',
            type: 'post',
            dataType: 'json',
            data: data,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (o) {
                Materialize.toast(o.msg, "4000");
                $("#rut").val('');
                $("#nombre").val('');
                $("#apellidos").val('');
                table_body();
            },
            error: function () {
                Materialize.toast("Error 500", "4000");
            }
        });
    });

    $("body").on("click","#modal_edit",function(){
        var rut = $(this).parent().parent().children()[1];
        var nombre = $(this).parent().parent().children()[2];
        var id_chofer = $(this).parent().parent().children()[3];
        $("#nombre_chofer").val($(rut).text());
        $("#apellidos_chofer").val($(nombre).text());
        $("#id_chofer").val($(id_chofer).text());
        $("#modal_1").openModal();
    });

    $("#editar_chofer").on("click",function(e){
        e.preventDefault();
        var id_chofer = $("#id_chofer").val();
        var nombre = $("#nombre_chofer").val();
        var apellidos = $("#apellidos_chofer").val();
        
        $.ajax({
            url:base_url+'editar_chofer',
            type:'post',
            dataType:'json',
            data:{id_chofer:id_chofer, nombre:nombre, apellidos:apellidos},
            success:function(o){
                Materialize.toast(o.msg,"4000");
                table_body();
                $("#modal_1").closeModal();
            },
            error:function(){
                Materialize.toast("500","4000");
            }
        });
    });
    
    $("body").on("click","#eliminar_chofer",function(e){
        e.preventDefault();
        var id_chofer = $($(this).parent().parent().children()[3]).text();

        $.ajax({
            url:base_url+'eliminar_chofer',
            type:'post',
            dataType:'json',
            data:{id_chofer:id_chofer},
            success:function(o){
                Materialize.toast(o.msg,"4000");
                table_body();
            },
            error:function(){
                Materialize.toast("500","4000");
            }
        });
    });
</script>
