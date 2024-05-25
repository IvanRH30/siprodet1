<?= $this->extend('Master/MasterAdmin'); ?>
<?= $this->section('Title') ?>SIPRODET<?= $this->endSection() ?>
<?= $this->section('MainContent'); ?>
<style>
    div.containerGeneral {
        margin-top: 10rem;
        margin-bottom: 10rem;
    }
</style>

<div class="container containerGeneral">
    <form id="perfilesFormulario" role="form p2" method="POST" enctype="multipart/form-data">
        <br>
        <h2>Resgistro de Perfiles</h2>
        <input hidden class="form-control" name="idPerfiles" id="idPerfiles" placeholder=" " type="text" value="0">
        <div class="form-group">
            <label class="control-label" for="nombre_perfil">Nombre del Perfil</label>
            <input class="form-control" name="nombre_perfil" id="nombre_perfil" placeholder=" " type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="nivel_seguridad">Nivel de Seguridad</label>
            <input class="form-control" name="nivel_seguridad" id="nivel_seguridad" placeholder=" " type="text">
        </div>
        
        <button class="btn btn-primary pull-right" type="submit">Registrar</button>

    </form>
</div>



<script type="text/javascript" src="<?= base_url(); ?>/assets/js/perfiles.js"> </script>
<?= $this->endSection(); ?>
<?= $this->section('FooterContent'); ?>
<?= $this->endSection(); ?>