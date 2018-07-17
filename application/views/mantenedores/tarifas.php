<!-- Vista Principal-->
<div class="card-margin">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card card-color mb-3 col-md-10 h-100 d-inline-block">
                <div class="card-body">
                    <form method="post" id="form_ingresos">
                        <div class="form-row">
                            <div class="col-9">
                                <h3 class="card-title">Mantenedor Tarifas</h3>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary btn-block" data-toggle='modal' data-target='#modal_nueva_tarifa' id="btn_modal_nueva_tarifa">Registrar nuevo</button>
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
                                <th scope="col">Codigo</th>
                                <th scope="col">Tarifa</th>
                                <th scope="col">Vigencia</th>
                                <th scope="col">Observación</th>
                                <th scope="col">Estado</th>
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

<!-- Modal Nuevo Tarifa -->
<div class="modal fade bd-example-modal-lg" id="modal_nueva_tarifa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo tarifa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="codigo">Codigo&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                                </div>
                                <input id="codigo" name="codigo" type="text" maxlength="6" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="tarifa">Tarifa</span>
                                </div>
                                <input id="tarifa" name="tarifa" type="text" maxlength="6" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="list_estado">Estado&nbsp</label>
                                </div>
                                <select class="custom-select" id="list_estado" name="list_estado">
                                    <option value="1">ACTIVO</option>
                                    <option value="2">INACTIVO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="observacion">Observación</span>
                                </div>
                                <input id="observacion" name="observacion" type="text" maxlength="49" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="fecha_inicio">Fecha inicio&nbsp</span>
                                </div>
                                <input id="fecha_inicio" name="fecha_inicio" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="fecha_termino">Fecha termino</span>
                                </div>
                                <input id="fecha_termino" name="fecha_termino" type="date" class="form-control">
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

<!-- Modal Editar Tarifa -->
<div class="modal fade bd-example-modal-lg" id="modal_editar_tarifa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar tarifa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="new_codigo">Codigo&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                                    <output id="id_tarifa" style="display: none;"></output>
                                </div>
                                <input id="new_codigo" name="new_codigo" type="text" maxlength="6" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="new_tarifa">Tarifa</span>
                                </div>
                                <input id="new_tarifa" name="new_tarifa" type="number" maxlength="6" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="new_list_estado">Estado&nbsp</label>
                                </div>
                                <select class="custom-select" id="new_list_estado" name="new_list_estado">
                                    <option value="1">ACTIVO</option>
                                    <option value="2">INACTIVO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="new_observacion">Observación</span>
                                </div>
                                <input id="new_observacion" name="new_observacion" type="text" maxlength="49" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="new_fecha_inicio">Fecha inicio&nbsp</span>
                                </div>
                                <input id="new_fecha_inicio" name="new_fecha_inicio" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="new_fecha_termino">Fecha termino</span>
                                </div>
                                <input id="new_fecha_termino" name="new_fecha_termino" type="date" class="form-control">
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

<script src="<?php echo base_url() ?>assets/js/custom/tarifas.js" type="text/javascript"></script>