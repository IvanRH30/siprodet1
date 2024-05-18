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
    <form id="areasFormulario" role="form p2" method="POST" enctype="multipart/form-data">
        <br>
        <h2>Resgistro de Areas</h2>
        <input hidden class="form-control" name="idAreas" id="idAreas" placeholder=" " type="text" value="0">
        <div class="form-group">
            <label class="control-label" for="nombre_area">Nombre del Area</label>
            <input class="form-control" name="nombre_area" id="nombre_area" placeholder=" " type="text">
        </div>
        <button class="btn btn-primary pull-right" type="submit">Registrar</button>
    </form>
</div>

<script type="text/javascript" src="<?= base_url(); ?>/assets/js/areas.js"> </script>
<?= $this->endSection(); ?>
<?= $this->section('FooterContent'); ?>
<?= $this->endSection(); ?>