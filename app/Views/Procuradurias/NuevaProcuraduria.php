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
    <form id="procuraduriasFormulario" role="form p2" method="POST" enctype="multipart/form-data">
        <br>
        <h2>Resgistro de Procuradurias</h2>
        <input hidden  class="form-control" name="idProcuradurias" id="idProcuradurias" placeholder=" " type="text" value="0">
        <div class="form-group">
            <label class="control-label" for="nombre_procuraduria">Nombre de la Procuraduria</label>
            <input class="form-control" name="nombre_procuraduria" id="nombre_procuraduria" placeholder=" " type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="numero_entidad">Entidad</label>
            <input class="form-control" name="numero_entidad" id="numero_entidad" placeholder=" " type="text">
        </div>
       
        <button class="btn btn-primary pull-right" type="submit">Registrar</button>
    </form>
</div>

<script type="text/javascript" src="<?= base_url(); ?>/assets/js/procuradurias.js"> </script>
<?= $this->endSection(); ?>
<?= $this->section('FooterContent'); ?>
<?= $this->endSection(); ?>