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
            <a class="btn btn-primary" onclick="AgregarPerfiles()"> <i class="bi bi-file-person"></i>Agregar </a>
        </div>
    </div>
    <div class="row">
        <table id="tablaPerfiles" class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre del Perfil</th>
                    <th>Nivel de Seguridad</th>
                    <th>Fecha Alta</th>
                    <th>Fceha Cambio</th>
                    <th>Fecha Baja</th>
                    <th>Estatus</th>
                    <th>Facultado que modifico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

</div>


<div id="modalFormularioPerfiles" class="modal" tabindex="1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span id="textoAccionModalPerfiles"></span> Perfiles</h4>
            </div>
            <div class="modal-body" style="overflow-y: auto;">
                <form id="perfilesFormulario" role="form p2" method="POST" enctype="multipart/form-data">
                    <input hidden class="form-control" name="idPerfiles" id="idPerfiles" placeholder=" " type="text">
                    <div class="form-group">
                        <label class="control-label" for="nombre_perfil">Nombre del Perfil</label>
                        <input class="form-control" name="nombre_perfil" id="nombre_perfil" placeholder=" " type="text">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="nivel_seguridad">Nivel de Seguridad</label>
                        <input class="form-control" name="nivel_seguridad" id="nivel_seguridad" placeholder=" " type="text">
                    </div>

                    <a class="btn btn-secondary" onclick="cierraModal('modalFormularioPerfiles')">Cerrar</a>
                    <button type="submit" class="btn btn-primary"><span id="btnAccionModalPerfiles"></button>

                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="<?= base_url(); ?>/assets/js/perfiles.js"> </script>
<?= $this->endSection(); ?>
<?= $this->section('FooterContent'); ?>
<?= $this->endSection(); ?>