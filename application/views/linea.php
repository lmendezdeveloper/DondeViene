<div class="row">
    <div class="col s12">
        <div class="card-panel">
            <p>
                <div class="col s6">
                    <h4>Lineas</h4>
                </div>
            </p>
            <form method="post" class="row">
                <div id="div_head" class="col s12">
                    <div class="input-field col s4">
                        <input id="nombre" type="text" name="nombre" maxlength="15"/>
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="input-field col s2">
                        <a class="btn" id="btn_agregar"><i class="material-icons left">add</i>Agregar</a>
                    </div>
                </div>
            </form> 
            <table class="striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
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
                fil += "<td nowrap class='right-align'><a id='editar_chofer' class='btn-flat'><i class='material-icons icon-cog' style='color:blue'>mode_edit</i></a>";
                fil += "<a id='eliminar_chofer' class='btn-flat'><i class='material-icons icon-cog' style='color:red'>delete</i></a></td>";
                fil += "</tr>";
                $("#table_body").append(fil);
            });
        });
    }
</script>
