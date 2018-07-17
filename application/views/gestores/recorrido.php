<!-- Vista Principal-->
<div class="card-margin">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card card-color mb-3 col-md-10 h-100 d-inline-block">
                <div class="card-body">
                    <form method="post" id="form_ingresos">
                        <div class="form-row">
                            <div class="col-12">
                                <h3 class="card-title">Gestion Recorridos</h3>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="codigo">Codigo</span>
                                    </div>
                                    <input id="codigo" name="codigo" type="text" maxlength="9" class="form-control">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" for="observacion">Observación</span>
                                    </div>
                                    <input id="observacion" name="observacion" type="text" maxlength="49" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="list_linea">Linea&nbsp&nbsp&nbsp</label>
                                    </div>
                                    <select class="custom-select yearselect" id="list_linea" name="list_linea">
                                    </select>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="list_tarifa">Tarifa&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                    </div>
                                    <select class="custom-select yearselect" id="list_tarifa" name="list_tarifa">
                                    </select>
                                </div>
                            </div>
                            <div class="col-9">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="list_horario">Horario</label>
                                        </div>
                                        <select class="custom-select yearselect" id="list_horario" name="list_horario">
                                        </select>
                                    </div>
                                </div>
                            <div class="col-3">
                                <button class="btn btn-primary btn-block" id="btn_add">Guardar</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-12" style="text-align:center;">
                        <output id="msg_nofify"></output>
                    </div>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Cod</th>
                                <th scope="col">Linea</th>
                                <th scope="col">Horario</th>
                                <th scope="col">Tarifa</th>
                                <th scope="col">Observación</th>
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

<!-- Modal Editar Chofer -->
<div class="modal fade bd-example-modal-lg" id="modal_editar_chofer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar chofer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-5">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="new_codigo">codigo&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                                    <output id="id_chofer" style="display: none;"></output>
                                </div>
                                <input id="new_codigo" name="new_codigo" type="text" disabled="disabled" class="form-control">
                            </div>
                        </div>
                        <div class="col-7">

                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="new_nombres">Nombres&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                                </div>
                                <input id="new_nombres" name="new_nombres" type="text" maxlength="99" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="new_apellidop">Apellido Paterno&nbsp</span>
                                </div>
                                <input id="new_apellidop" name="new_apellidop" type="text" maxlength="49" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="new_apellidom">Apellido Materno</span>
                                </div>
                                <input id="new_apellidom" name="new_apellidom" type="text" maxlength="49" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="new_observacion">observacion&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                                </div>
                                <input id="new_observacion" name="new_observacion" type="text" minlength="9" maxlength="9" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="new_correo">Correo&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                                </div>
                                <input id="new_correo" name="new_correo" type="text" class="form-control">
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

<script src="<?php echo base_url() ?>assets/js/custom/recorrido.js" type="text/javascript"></script>