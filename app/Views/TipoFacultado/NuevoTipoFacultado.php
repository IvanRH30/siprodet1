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
    <form id="tipoFacultadoFormulario" role="form p2" method="POST" enctype="multipart/form-data">
        <br>
        <h2>Resgistro de Tipo Facultado</h2>
        <input hidden class="form-control" name="idTipoFacultados" id="idTipoFacultados" placeholder=" " type="text" value="0">
        <div class="form-group">
            <label class="control-label" for="nombre_tipoFacultado">Nombre del tipo Facultado</label>
            <input class="form-control" name="nombre_tipoFacultado" id="nombre_tipoFacultado" placeholder=" " type="text">
        </div>
        
        <button class="btn btn-primary pull-right" type="submit">Registrar</button>
    </form>
</div>

<script type="text/javascript" src="<?= base_url(); ?>/assets/js/tipoFacultados.js"> </script>
<?= $this->endSection(); ?>
<?= $this->section('FooterContent'); ?>
<?= $this->endSection(); ?>