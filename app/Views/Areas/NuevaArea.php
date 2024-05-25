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
        <div class="form-group">
            <label class="control-label" for="clave_areas">Clave del Area</label>
            <input class="form-control" name="clave_areas" id="clave_areas" placeholder=" " type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="tel_jefe">Telefono del Jefe</label>
            <input class="form-control" name="tel_jefe" id="tel_jefe" placeholder=" " type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="tel_subjefe">Telefono del Subjefe</label>
            <input class="form-control" name="tel_subjefe" id="tel_subjefe" placeholder=" " type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="tel_secret">Telefono del secretari(@)</label>
            <input class="form-control" name="tel_secret" id="tel_secret" placeholder=" " type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="tel_fax">Telefono Fax</label>
            <input class="form-control" name="tel_fax" id="tel_fax" placeholder=" " type="text">
        </div>
        <button class="btn btn-primary pull-right" type="submit">Registrar</button>
    </form>
</div>

<script type="text/javascript" src="<?= base_url(); ?>/assets/js/areas.js"> </script>
<?= $this->endSection(); ?>
<?= $this->section('FooterContent'); ?>
<?= $this->endSection(); ?>