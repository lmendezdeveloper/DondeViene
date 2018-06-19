<div class="row">
    <div class="col s12">
        <div class="card-panel">
            <p>
                <div class="col s6">
                    <h4>Microbus</h4>
                </div>
            </p>
            <form method="post" class="row" id="form_microbus">
                <div id="div_head" class="col s12">
                    <div class="input-field col s5">
                            <input id="marca" type="text" name="marca" maxlength="15"/>
                            <label for="marca">MARCA</label>
                    </div>
                    <div class="input-field col s3">
                        <input id="patente" type="text" name="patente" maxlength="15"/>
                        <label for="patente">PATENTE</label>
                    </div>
                    <div class="input-field col s3">
                        <select id="lista_choferes" name="lista_choferes">
                        
                        </select>
                        <label>Chofer</label>
                    </div>
                    <div class="input-field col s1">
                        <a id="btn_agregar" class="btn-floating waves-effect waves-light"><i class="material-icons">add</i></a>
                    </div>
                </div>
            </form> 
            <table class="striped">
                <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Patente</th>
                        <th>Chofer</th>
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
        <h4 class="center-align">Editar Microbus</h4>
        <p>
        <form method="post">
            <input type="hidden" id="id_microbus"/>
            <input type="text" id="marca_microbus" placeholder="Marca de Microbus"/>
            <input type="text" id="patente_microbus" placeholder="Patente de Microbus"/>
            <!--
            <select id="lista_choferes" name="lista_choferes">            
            </select>
            <label>Chofer</label>
            -->
            <button class="btn blue accent-1" id="editar_chofer">Actualizar</button>
        </form>
        </p>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("select").material_select();
    });

    table_body();
    lista_choferes();

    function table_body(){
        var url = 'lista_microbus';
        $.getJSON(url, function(result){
            $("#table_body").empty();
            $.each(result, function (i,o){
                var fil = "<tr>";
                fil += "<td>"+o.MARCA+"</td>";
                fil += "<td>"+o.PATENTE+"</td>";
                fil += "<td>"+o.NOMBRE+" "+o.APELLIDOS+"</td>";
                fil += "<td style='display:none'>"+o.ID_MICROBUS+"</td>"
                fil += "<td class='center-align'> <a id='modal_edit' href='#' class='btn-floating btn blue'><i class='large material-icons'>mode_edit</i></a></td>";
                fil += "<td class='center-align'> <a id='eliminar_microbus' href='#' class='btn-floating btn red'><i class='large material-icons'>delete</i></a></td>";
                fil += "</tr>";
                $("#table_body").append(fil);
            });
        });
    }

    function lista_choferes() {
        $("#lista_choferes").empty();
        var url = 'lista_choferes';
        $.getJSON(url, function (result) {
            $.each(result, function (i, o) {
                $("#lista_choferes").append(new Option(o.NOMBRE + " " + o.APELLIDOS, o.ID_CHOFER));
                $("select").material_select();
            });
        });
    }

    $("#btn_agregar").click(function(e) {
        e.preventDefault();
        var form = $("#form_microbus")[0];
        var data = new FormData(form);

        $.ajax({
            url: 'agregar_microbus',
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
        var marca = $(this).parent().parent().children()[0];
        var patente = $(this).parent().parent().children()[1];
        var id_microbus = $(this).parent().parent().children()[3];
        $("#marca_microbus").val($(marca).text());
        $("#patente_microbus").val($(patente).text());
        $("#id_microbus").val($(id_microbus).text());
        $("#modal_1").openModal();
    });

    $("#editar_chofer").on("click",function(e){
        e.preventDefault();
        var id_microbus = $("#id_microbus").val();
        var marca = $("#marca_microbus").val();
        var patente = $("#patente_microbus").val();
        
        $.ajax({
            url:base_url+'editar_microbus',
            type:'post',
            dataType:'json',
            data:{id_microbus:id_microbus, marca:marca, patente:patente},
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

    $("body").on("click","#eliminar_microbus",function(e){
        e.preventDefault();
        var id_microbus = $($(this).parent().parent().children()[3]).text();

        $.ajax({
            url:base_url+'eliminar_microbus',
            type:'post',
            dataType:'json',
            data:{id_microbus:id_microbus},
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
