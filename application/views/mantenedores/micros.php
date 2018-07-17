<!-- Vista Principal-->
<div class="card-margin">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card card-color mb-3 col-md-10 h-100 d-inline-block">
                <div class="card-body">
                    <form method="post" id="form_ingresos">
                        <div class="form-row">
                            <div class="col-9">
                                <h3 class="card-title">Mantenedor Microbus</h3>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary btn-block" data-toggle='modal' data-target='#modal_nueva_micro' id="btn_modal_nuevo_chofer">Registrar nuevo</button>
                            </div>
                        </div>
                        <br>
                    </form>
                    <div class="col-12" style="text-align:center;">
                        <output id="msg_nofify"></output>
                    </div>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Año</th>
                                <th scope="col">Petente</th>
                                <th scope="col">Capacidad</th>
                                <th class="text-center" scope="col">Kilometraje</th>
                                <th></th>
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

<!-- Modal Nuevo Chofer -->
<div class="modal fade bd-example-modal-lg" id="modal_nueva_micro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo microbus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="marca">Marca&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                                </div>
                                <input id="marca" name="marca" type="text" maxlength="49" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="modelo">Modelo&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                                </div>
                                <input id="modelo" name="modelo" type="text" maxlength="49" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="list_ano">Año&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                </div>
                                <select class="custom-select yearselect" id="list_ano" name="list_ano">
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="patente">Patente&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                                </div>
                                <input id="patente" name="patente" type="text" maxlength="6" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="capacidad">Capacidad&nbsp</span>
                                </div>
                                <input id="capacidad" name="capacidad" type="number" min="1" max="50" maxlength="2" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="km">Kilometraje</span>
                                </div>
                                <input id="km" name="km" type="number" min="0" max="999999" maxlength="6" class="form-control">
                            </div>
                        </div>
                        <div class="col-9">
                        </div>
                        <div class="col-3">
                            <button class="btn btn-primary btn-block" id="btn_add">Guardar</button>
                        </div>
                        <div class="col-12" style="text-align:right;">
                            <output id="msg_nofify_add"></output>&nbsp&nbsp
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Chofer -->
<div class="modal fade bd-example-modal-lg" id="modal_editar_micro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar microbus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="new_marca">Marca&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                                    <output id="id_micro" style="display: none;"></output>
                                </div>
                                <input id="new_marca" name="new_marca" type="text" maxlength="49" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="new_modelo">Modelo&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                                </div>
                                <input id="new_modelo" name="new_modelo" type="text" maxlength="49" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="new_list_ano">Año&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                </div>
                                <select class="custom-select yearselect" id="new_list_ano" name="new_list_ano">
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="new_patente">Patente&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                                </div>
                                <input id="new_patente" name="new_patente" type="text" maxlength="6" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="new_capacidad">Capacidad&nbsp</span>
                                </div>
                                <input id="new_capacidad" name="new_capacidad" type="number" min="1" max="50" maxlength="2" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="new_km">Kilometraje</span>
                                </div>
                                <input id="new_km" name="new_km" type="number" min="0" max="999999" maxlength="6" class="form-control">
                            </div>
                        </div>
                        <div class="col-9">
                        </div>
                        <div class="col-3">
                            <button class="btn btn-primary btn-block" id="btn_edit">Actualizar</button>
                        </div>
                        <div class="col-12" style="text-align:right;">
                            <output id="msg_nofify_edit"></output>&nbsp&nbsp
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/js/custom/micros.js" type="text/javascript"></script>