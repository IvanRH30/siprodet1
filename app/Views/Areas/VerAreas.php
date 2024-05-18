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
            <a class="btn btn-primary" onclick="AgregarArea()"> <i class="bi bi-file-person"></i>Agregar </a>
        </div>
    </div>
    <div class="row">
        <table id="tablaAreas" class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre del Area</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

</div>

<div id="modalFormularioAreas" class="modal" tabindex="1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span id="textoAccionModalAreas"></span> Areas</h4>
            </div>
            <div class="modal-body" style="overflow-y: auto;">
                <form id="areasFormulario" role="form p2" method="POST" enctype="multipart/form-data">
                    <input hidden class="form-control" name="idAreas" id="idAreas" placeholder=" " type="text">
                    <div class="form-group">
                        <label class="control-label" for="nombre_area">Nombre del Area</label>
                        <input class="form-control" name="nombre_area" id="nombre_area" placeholder=" " type="text">
                    </div>

                    <a class="btn btn-secondary" onclick="cierraModal('modalFormularioAreas')">Cerrar</a>
                    <button type="submit" class="btn btn-primary"><span id="btnAccionModalAreas"></button>

                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>






<script type="text/javascript" src="<?= base_url(); ?>/assets/js/areas.js"> </script>
<?= $this->endSection(); ?>
<?= $this->section('FooterContent'); ?>
<?= $this->endSection(); ?>