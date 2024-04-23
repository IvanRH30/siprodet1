<?= $this->extend('Master/MasterAdmin'); ?>
<?= $this->section('Title') ?>Ver Usuario<?= $this->endSection() ?>
<?= $this->section('MainContent'); ?>
<style>
    div.containerGeneral {
        margin-top: 10rem;
        margin-bottom: 10rem;
    }
</style>
<div class="container containerGeneral">
    <h1 style="color: purple;">ESTE ES EL MODULO 3</h1>
</div>            

<script type="text/javascript" src="<?= base_url(); ?>/assets/js/prueba.js"></script>
<?= $this->endSection(); ?>
<?= $this->section('FooterContent'); ?>
<?= $this->endSection(); ?>