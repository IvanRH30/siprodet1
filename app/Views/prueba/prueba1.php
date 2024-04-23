<?= $this->extend('Master/MasterAdmin'); ?>
<?= $this->section('Title') ?>SIPRODET<?= $this->endSection() ?>
<?= $this->section('MainContent'); ?>
<style>
    div.containerGeneral{
        margin-top: 10rem;
        margin-bottom: 10rem;
    }
</style>
<div class="container containerGeneral">
    <form id="pruebaFormulario" role="form p2" method="POST" enctype="multipart/form-data">
        <input class="form-control" name="idUsuario" id="idUsuario" placeholder=" " type="text">
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
            <input class="form-control" name="password1" id="password1" placeholder=" " type="text">
        </div>
        <button class="btn btn-primary pull-right" type="submit">Guardar</button>
    </form>
</div>
<script type="text/javascript" src="<?= base_url(); ?>/assets/js/prueba.js"></script>
<?= $this->endSection(); ?>
<?= $this->section('FooterContent'); ?>
<?= $this->endSection(); ?>