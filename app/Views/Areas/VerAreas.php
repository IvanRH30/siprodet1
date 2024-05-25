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
                    <th>Clave del Area</th>
                    <th>Telefono del Jefe</th>
                    <th>Telefono del Subjefe</th>
                    <th>Telefonon del Secretari(@)</th>
                    <th>Telefono de Fax</th>
                    <th>Fecha_alta</th>
                    <th>Fecha_cambio</th>
                    <th>Fecha_baja</th>
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
                    <div class="form-group">
                        <label class="control-label" for="clave_areas">Clave del Area</label>
                        <input class="form-control" name="clave_areas" id="clave_areas" placeholder=" " type="text">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="tel_jefe">Telefono del Jefe</label>
                        <input class="form-control" name="tel_jefe" id="tel_jefe" placeholder=" " type="text">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="tel_subjefe">Telefono del Subjefe</label>
                        <input class="form-control" name="tel_subjefe" id="tel_subjefe" placeholder=" " type="text">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="tel_secret">Telefono del secretari(@)</label>
                        <input class="form-control" name="tel_secret" id="tel_secret" placeholder=" " type="text">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="tel_fax">Telefono Fax</label>
                        <input class="form-control" name="tel_fax" id="tel_fax" placeholder=" " type="text">
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