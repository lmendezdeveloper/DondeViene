<!-- Vista Principal-->
<div class="card-margin">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card card-color mb-3 col-md-10 h-100 d-inline-block">
                <div class="card-body">
                    <form method="post" id="form_ingresos">
                        <div class="form-row">
                            <div class="col-4">
                                <h3 class="card-title">Gestion Trayectos</h3>
                            </div>
                            <div class="col-8">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="list_recorrido">Recorrido</label>
                                    </div>
                                    <select class="custom-select yearselect" id="list_recorrido" name="list_recorrido">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="orden">Orden</span>
                                    </div>
                                    <input id="orden" name="orden" type="text" maxlength="9" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="latitud">Latitud</span>
                                    </div>
                                    <input id="latitud" name="latitud" type="text" maxlength="9" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="longitud">Longitud</span>
                                    </div>
                                    <input id="longitud" name="longitud" type="text" maxlength="9" class="form-control">
                                </div>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary btn-block" id="btn_add">Agregar</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-12" style="text-align:center;">
                        <output id="msg_nofify"></output>
                    </div>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Orden</th>
                                <th scope="col">Latitud</th>
                                <th scope="col">Longitud</th>
                                <!--<th scope="col"></th>-->
                            </tr>
                        </thead>
                        <tbody id="table_body">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/js/custom/trayecto.js" type="text/javascript"></script>