<div class="row">
    <div class="col s12">
        <div class="card-panel">
            <p>
                <div class="col s6">
                    <h4>Lineas</h4>
                </div>
            </p>
            <form method="post" class="row" id="form_linea">
                <div id="div_head" class="col s12">
                    <div class="input-field col s4">
                        <input id="nombre" type="text" name="nombre" maxlength="15"/>
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="input-field col s2">
                    <a id="btn_agregar" class="btn-floating waves-effect waves-light"><i class="material-icons">add</i></a>
                    </div>
                </div>
            </form> 
            <table class="striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>

                <tbody id="table_body">
                </tbody>
            </table>
            <br>
        </div>
    </div>
</div>

<!-- modal editar -->
<div id="modal_1" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Editar Linea</h4>
        <p>
        <form method="post">
            <input type="hidden" id="id_linea"/>
            <input type="text" id="nombre_linea" placeholder="Nombre de la linea"/>
            <button class="btn blue accent-1" id="editar_chofer">Actualizar</button>
        </form>
        </p>
    </div>
</div>

<script>
    table_body();

    function table_body(){
        var url = 'lista_lineas';
        $.getJSON(url, function(result){
            $("#table_body").empty();
            $.each(result, function (i,o){
                var fil = "<tr>";
                fil += "<td>"+o.ID_LINEA+"</td>";
                fil += "<td>"+o.NOMBRE+"</td>";
                fil += "<td class='center-align'> <a id='modal_edit' href='#' class='btn-floating btn blue'><i class='large material-icons'>mode_edit</i></a></td>";
                fil += "<td class='center-align'> <a id='eliminar_linea' href='#' class='btn-floating btn red'><i class='large material-icons'>delete</i></a></td>";
                fil += "</tr>";
                $("#table_body").append(fil);
            });
        });
    }

    $("#btn_agregar").click(function(e) {
        e.preventDefault();
        var form = $("#form_linea")[0];
        var data = new FormData(form);

        $.ajax({
            url: 'agregar_linea',
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
                $("#nombre").val('');
                table_body();
            },
            error: function () {
                Materialize.toast("Error 500", "4000");
            }
        });
    });

    $("body").on("click","#modal_edit",function(){
        var id_linea = $(this).parent().parent().children()[0];
        var nombre = $(this).parent().parent().children()[1];
        $("#nombre_linea").val($(nombre).text());
        $("#id_linea").val($(id_linea).text());
        $("#modal_1").openModal();
    });

    $("#editar_chofer").on("click",function(e){
        e.preventDefault();
        var id_linea = $("#id_linea").val();
        var nombre = $("#nombre_linea").val();

        $.ajax({
            url:'editar_linea',
            type:'post',
            dataType:'json',
            data:{id_linea:id_linea, nombre:nombre},
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

    $("body").on("click","#eliminar_linea",function(e){
        e.preventDefault();
        var id_linea = $($(this).parent().parent().children()[0]).text();

        $.ajax({
            url:'eliminar_linea',
            type:'post',
            dataType:'json',
            data:{id_linea:id_linea},
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
