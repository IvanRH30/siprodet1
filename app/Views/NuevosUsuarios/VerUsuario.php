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
    <div class="row d-flex justify-content-end">
        <div class="card card-body">
            <a class="btn btn-primary" onclick="RegistrarUsuario()"><i class="bi bi-file-person"></i> Registrar</a>
        </div>
    </div>
</div>
<div class="row" width= "10%">
    
        <table id="tablaNuevosUsuarios" class="table table-bordered">
            <thead>
                <tr>
                    <th>Facultado</th>
                    <th>Numero <br>Procuraduria</th>
                    <th>Nombre</th>
                    <th>Ape. <br>Paterno</th>
                    <th>Ape. <br>Materno</th>
                    <!--<th>Password</th>-->
                    <th>Estatus</th>
                    <th>Numero<br>Perfil</th>
                    <th>Area</th>
                    <th>Iniciales</th>
                    <th>Titulo</th>
                    <th>Numero<br>Facultado</th>
                    <th>Fecha Alta</th>
                    <th>Fecha Cambio</th>
                    <th>Fecha Baja</th>
                    <th>Num. Autorizado</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    
</div>

//modal
<div id="modalFormularioUsuario" class="modal" tabindex="1">
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title"><span id="textoAccionModalUsuario"></span> Usuario</h6>
            </div>
            <div class="modal-body" style="overflow-y: auto;">
           
                
            <form id="usuarioNuevoFormulario" role="form p2" method="POST" enctype="multipart/form-data">
        
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

        <a class="btn btn-secondary" onclick="cierraModal('modalFormularioUsuario')">Cerrar</a>
        <button type="submit" class="btn btn-primary"><span id="btnAccionModalUsuario"></button>
        
    </form>
            </div>
            <div class="modal-footer">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<br>
<script type="text/javascript" src="<?= base_url(); ?>/assets/js/usuarios_nuevos.js"></script>
<?= $this->endSection(); ?>
<?= $this->section('FooterContent'); ?>
<?= $this->endSection(); ?>