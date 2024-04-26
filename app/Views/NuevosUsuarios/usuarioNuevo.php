<?= $this->extend('Master/MasterAdmin'); ?>
<?= $this->section('Title') ?>SIPRODET<?= $this->endSection() ?>
<?= $this->section('MainContent'); ?>
<style>
    div.containerGeneral{
        margin-top: 10rem;
        margin-bottom: 10rem;
    }
</style>

<div class="container containerGenereal"><br>
    <form id="usuarioNuevoFormulario" role="form p2" method="POST" enctype="multipart/form-data">
        <br><h2>Resgistro de Usuario</h2>
        <input class="form-control" name="idNuevo" id="idNuevo" placeholder=" " type="text">
        <div class="form-group">
            <label class="control-label" for="strFacultado">strFacultado: </label>
            <input class="form-control" name="strFacultado" id="strFacultado" placeholder=" " type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="numProcuraduria">Numero Procuraduria: </label>
            <input class="form-control" name="numProcuraduria" id="numProcuraduria" placeholder=" " type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="strNombre">Nombre: </label>
            <input class="form-control" name="strNombre" id="strNombre" placeholder=" " type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="strPaterno">Apelldio Paterno: </label>
            <input class="form-control" name="strPaterno" id="strPaterno" placeholder=" " type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="strMaterno">Apellido Materno: </label>
            <input class="form-control" name="strMaterno" id="strMaterno" placeholder=" " type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="strPassword">Password: </label>
            <input class="form-control" name="strPassword" id="strPassword" placeholder=" " type="text">
        </div>
        <!--<div class="form-group">
            <label class="control-label" for="strStatus">Estatus: </label>
            <input class="form-control" name="strStatus" id="strStatus" placeholder=" " type="text">
        </div>-->
        <div class="form-group">
            <label class="control-label" for="strPerfil">Numero Perfil: </label>
            <input class="form-control" name="strPerfil" id="strPerfil" placeholder=" " type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="strArea">Area: </label>
            <input class="form-control" name="strArea" id="strArea" placeholder=" " type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="strIniciales">Iniciales: </label>
            <input class="form-control" name="strIniciales" id="strIniciales" placeholder=" " type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="strTitulo">Titulo: </label>
            <input class="form-control" name="strTitulo" id="strTitulo" placeholder=" " type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="strNumTipoFacultado">Numero Tipo Facultado: </label>
            <input class="form-control" name="strNumTipoFacultado" id="strNumTipoFacultado" placeholder=" " type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="strFechaAlta">Fecha Alta: </label>
            <input class="form-control" name="strFechaAlta" id="strFechaAlta" placeholder=" " type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="strFechaCambio">Fecha Cambio: </label>
            <input class="form-control" name="strFechaCambio" id="strFechaCambio" placeholder=" " type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="strFechaBaja">Fecha Baja: </label>
            <input class="form-control" name="strFechaBaja" id="strFechaBaja" placeholder=" " type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="strFacultadoAutorizado">Facultado Autorizado: </label>
            <input class="form-control" name="strFacultadoAutorizado" id="strFacultadoAutorizado" placeholder=" " type="text">
        </div>

        <button class="btn btn-primary pull-right" type="submit">Registrar</button>
        
    </form>
</div>
<br>

<script type="text/javascript" src="<?= base_url(); ?>/assets/js/usuarios_nuevos.js"></script>
<?= $this->endSection(); ?>
<?= $this->section('FooterContent'); ?>
<?= $this->endSection(); ?>