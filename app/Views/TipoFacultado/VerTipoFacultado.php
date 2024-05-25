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
            <a class="btn btn-primary" onclick="AgregarTipoFacultados()"> <i class="bi bi-file-person"></i>Agregar </a>
        </div>
    </div>
    <div class="row">
        <table id="tablaTipoFacultado" class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre del Tipo Facultado</th>
                    <th>Fecha alta</th>
                    <th>Fecha cambio</th>
                    <th>Fecha baja</th>
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

<div id="modalFormularioTipoFacultados" class="modal" tabindex="1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> <span id="textoAccionModalTipoFacultados"></span>Procuradurias</h4>
            </div>
            <div class="modal-body" style="overflow-y: auto;">
                <form id="tipoFacultadoFormulario" role="form p2" method="POST" enctype="multipart/form-data">
                    <input hidden class="form-control" name="idTipoFacultados" id="idTipoFacultados" placeholder=" " type="text">
                    <div class="form-group">
                        <label class="control-label" for="nombre_tipoFacultado">Nombre de la Procuraduria</label>
                        <input class="form-control" name="nombre_tipoFacultado" id="nombre_tipoFacultado" placeholder=" " type="text">
                    </div>
                    
                    <a class="btn btn-secondary" onclick="cierraModal('modalFormularioTipoFacultados')">Cerrar</a>
                    <button type="submit" class="btn btn-primary"><span id="btnAccionModalTipoFacultados"></button>
                </form>

            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>

</div>


<script type="text/javascript" src="<?= base_url(); ?>/assets/js/tipoFacultados.js"> </script>
<?= $this->endSection(); ?>
<?= $this->section('FooterContent'); ?>
<?= $this->endSection(); ?>