<!-- Vista Principal-->
<div class="card-margin">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card card-color mb-3 col-md-10 h-100 d-inline-block">
                <div class="card-body">
                    <form method="post" id="form_ingresos">
                        <div class="form-row">
                            <div class="col-12">
                                <h3 class="card-title">Reporte de Preferencias</h3>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                        </div>
                    </form>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Usuario</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Linea</th>
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

<script src="<?php echo base_url() ?>assets/js/custom/preferencias.js" type="text/javascript"></script>