<?= $this->extend('Master/MasterPage'); ?>
<?= $this->section('Title') ?>Iniciar sesión<?= $this->endSection() ?>
<?= $this->section('MainContent'); ?>
    <div class="container containerGeneral">
        <form id="pruebaFormulario" role="form p2" method="POST" enctype="multipart/form-data">
            <input class="form-control" value="<?= $idUsuario ?>" hidden name="idUsuario" id="idUsuario">
            <div class="form-group">
                <label class="control-label" for="nombre">Nombre:</label>
                <input class="form-control"  name="nombre" id="nombre" placeholder=" " type="text">
            </div>
            <div class="form-group">
                <label class="control-label" for="apellido_paterno">Apellido Paterno:</label>
                <input class="form-control"  name="apellido_paterno" id="apellido_paterno" placeholder=" " type="text">
            </div>
            <div class="form-group">
                <label class="control-label" for="apellido_materno">Apellido Materno:</label>
                <input class="form-control"  name="apellido_materno" id="apellido_materno" placeholder=" " type="text">
            </div>
            <div class="form-group">
                <label class="control-label" for="nombre">Email:</label>
                <input class="form-control" name="email" id="email" placeholder=" " type="text">
            </div>
            <div class="form-group">
                <label class="control-label" for="password1">Contraseña:</label>
                <input class="form-control" name="password1" id="password1" placeholder=" " type="password">
            </div>
            <div class="row d-flex justify-content-center">
                <button class="btn btn-primary pull-right" style="width: max-content;" type="submit">Guardar</button>
            </div>
                <p>Y tienes una cuenta? <a href="<?= base_url() ?>">Iniciar Sesión</a></p>
        </form>
    </div>
<script type="text/javascript" src="<?= base_url(); ?>/assets/js/functions_login.js"></script>
<?= $this->endSection(); ?>
<?= $this->section('FooterContent'); ?>
<?= $this->endSection(); ?>
