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
    <div class="row d-flex justify-content-end">
        <div class="card card-body">
            <a class="btn btn-primary" onclick="RegistrarUsuario()"><i class="bi bi-file-person"></i> Registrar</a>
        </div>
    </div>
    <div class="row">
        <table id="tablaNuevosUsuarios" class="table table-bordered">
            <thead>
                <tr>
                    <th>Facultado</th>
                    <th>Num. de Procuraduria</th>
                    <th>Nombre</th>
                    <th>1er Apellido</th>
                    <th>2do Apellido</th>
                    <th>Password</th>
                    <th>Estatus</th>
                    <th>Num. de Perfil</th>
                    <th>Area</th>
                    <th>Iniciales</th>
                    <th>Titulo</th>
                    <th>Num. Tipo Facultado</th>
                    <th>Fecha Alta</th>
                    <th>Fecha Cambio</th>
                    <th>Fecha Baja</th>
                    <th>Num. Autorizado</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>  


<br>
<script type="text/javascript" src="<?= base_url(); ?>/assets/js/usuarios_nuevos.js"></script>
<?= $this->endSection(); ?>
<?= $this->section('FooterContent'); ?>
<?= $this->endSection(); ?>