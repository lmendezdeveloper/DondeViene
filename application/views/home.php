<?php $user = $this->session->userdata("user");?>

<div class="card-margin">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="card card-opacity mb-3 h-100 d-inline-block">
                <div class="card-body text-center">
                    <img src="<?php echo base_url() ?>assets/img/Imagen1.png" alt="Smiley face" height="300" width="300">
                    <br><br>
                    <h1>Bienvenido <?php echo $user[0]->nombre;?> <?php echo $user[0]->apellidos;?></h1>
                </div>
            </div>
        </div>
    </div>
</div>