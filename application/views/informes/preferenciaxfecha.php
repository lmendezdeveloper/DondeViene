<!-- Vista Principal-->
<div class="card-margin">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card card-color mb-3 col-md-12 h-100 d-inline-block">
                <div class="card-body">
                    <form method="post" id="form_ingresos">
                        <div class="form-row">
                            <div class="col-12">
                                <h3 class="card-title">Reporte Concurrencia por linea</h3>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                        </div>
                    </form>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Linea 1</th>
                                <th scope="col">Linea 2</th>
                                <th scope="col">Linea 3</th>
                                <th scope="col">Linea 3B</th>
                                <th scope="col">Linea 4</th>
                                <th scope="col">Linea 5</th>
                                <th scope="col">Linea 6</th>
                                <th scope="col">Linea 7</th>
                                <th scope="col">Linea A</th>
                                <th scope="col">Linea B</th>
                                <th scope="col">Linea C</th>
                                <th scope="col">Linea D</th>
                                <th scope="col">Total Pasajeros</th>
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

<script src="<?php echo base_url() ?>assets/js/custom/preferenciasxfecha.js" type="text/javascript"></script>