<div class="row">
    <div class="col s12">
        <div class="card-panel">
            <p>
                <div class="col s6">
                    <h4>Tarifas</h4>
                </div>
            </p>
            <form method="post" class="row">
                <div id="div_head" class="col s12">
                    <div class="input-field col s2">
                            <input id="rut" type="text" name="rut" maxlength="15"/>
                            <label for="rut">Rut</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="nombre" type="text" name="nombre" maxlength="15"/>
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="nombre" type="text" name="nombre" maxlength="15"/>
                        <label for="nombre">Apellidos</label>
                    </div>
                    <div class="input-field col s2">
                    <a class="btn" id="btn_agregar"><i class="material-icons left">add</i>Agregar</a>
                    </div>
                </div>
            </form> 
            <table class="striped">
                <thead>
                <tr>
                    <th>Monto</th>
                    <th>Vigencia</th>
                    <th>Estado</th>
                    <th>ID TRAYECTO</th>
                    <th></th>
                </tr>
                </thead>

                <tbody id="table_body">
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    table_body();

    function table_body(){
        var url = 'lista_tarifas';
        $.getJSON(url, function(result){
            $("#table_body").empty();
            $.each(result, function (i,o){
                var fil = "<tr>";
                fil += "<td>"+o.MONTO+"</td>";
                fil += "<td>"+o.VIGENCIA+"</td>";
                fil += "<td>ACTIVO</td>";
                fil += "<td>"+o.NOMBRE+"</td>";
                fil += "<td style='display:none'>"+o.ID_TARIFA+"</td>"
                fil += "<td class='center-align'> <a id='modal_edit' href='#' class='btn-floating btn blue'><i class='large material-icons'>mode_edit</i></a></td>";
                fil += "<td class='center-align'> <a id='eliminar_tarifa' href='#' class='btn-floating btn red'><i class='large material-icons'>delete</i></a></td>";
                fil += "</tr>";
                $("#table_body").append(fil);
            });
        });
    }
</script>
