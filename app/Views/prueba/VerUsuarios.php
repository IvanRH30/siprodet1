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
    <div class="row d-flex justify-content-end">
        <div class="card card-body">
            <a class="btn btn-primary" onclick="agregarUsuario()"><i class="bi bi-file-person"></i> Agregar</a>
        </div>
    </div>
    <div class="row">
        <table id="tablaUsuarios" class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>1er Apellido</th>
                    <th>2do Apellido</th>

                    <th>Email</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>


<!-- MODAL PARA INSERTAR ACTUALIZAR USUARIO -->
<div id="modalFormularioUsuario" class="modal" tabindex="1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span id="textoAccionModalUsuario"></span> Usuario</h4>
            </div>
            <div class="modal-body">
                <form id="pruebaFormulario" role="form p2" method="POST" enctype="multipart/form-data">
                    <input hidden class="form-control" name="idUsuario" id="idUsuario" placeholder=" " type="text">
                    <div class="form-group">
                        <label class="control-label" for="nombre">Nombre:</label>
                        <input class="form-control" name="nombre" id="nombre" placeholder=" " type="text">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="apellido_paterno">Apellido Paterno:</label>
                        <input class="form-control" name="apellido_paterno" id="apellido_paterno" placeholder=" " type="text">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="apellido_materno">Apellido Materno:</label>
                        <input class="form-control" name="apellido_materno" id="apellido_materno" placeholder=" " type="text">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="nombre">Email:</label>
                        <input class="form-control" name="email" id="email" placeholder=" " type="text">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password1">Contraseña:</label>
                        <input class="form-control" name="password1" id="password1" placeholder=" " type="text">
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


<script type="text/javascript" src="<?= base_url(); ?>/assets/js/prueba.js"></script>
<?= $this->endSection(); ?>
<?= $this->section('FooterContent'); ?>
<?= $this->endSection(); ?>

<!-- Modal -->
