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
            <a class="btn btn-primary" onclick="AgregarProcuradurias()"> <i class="bi bi-file-person"></i>Agregar </a>
        </div>
    </div>
    <div class="row">
        <table id="tablaProcuradurias" class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre de la Procuraduria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

</div>

<div id="modalFormularioProcuradurias" class="modal" tabindex="1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> <span id="textoAccionModalProcuradurias"></span>Procuradurias</h4>
            </div>
            <div class="modal-body" style="overflow-y: auto;">
                <form id="procuraduriasFormulario" role="form p2" method="POST" enctype="multipart/form-data">
                    <input hidden class="form-control" name="idProcuradurias" id="idProcuradurias" placeholder=" " type="text">
                    <div class="form-group">
                        <label class="control-label" for="nombre_procuraduria">Nombre de la Procuraduria</label>
                        <input class="form-control" name="nombre_procuraduria" id="nombre_procuraduria" placeholder=" " type="text">
                    </div>

                    <a class="btn btn-secondary" onclick="cierraModal('modalFormularioProcuradurias')">Cerrar</a>
                    <button type="submit" class="btn btn-primary"><span id="btnAccionModalProcuradurias"></button>
                </form>

            </div>
            <div class="modal-footer">
                
            </div>
        </div>

    </div>

</div>

<script type="text/javascript" src="<?= base_url(); ?>/assets/js/procuradurias.js"> </script>
<?= $this->endSection(); ?>
<?= $this->section('FooterContent'); ?>
<?= $this->endSection(); ?>