<div class="align-items-md-stretch mt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= $convocatoria->title ?></h4>
        </div>
        <div class="card-body">
            <strong class="card-title">Tipo de oferta: <?= $convocatoria->type_offer ?></strong>
            <br><br>
            <p class="card-text">Detalle: <?= $convocatoria->detail ?></p>
            <p class="card-text">Número de vacantes: <?= $convocatoria->vacancy_numbers ?></p>
            <p class="card-text">Fecha de publicación: <?= $convocatoria->date_publish ?></p>
            <p class="card-text">Fecha lìmite de postulación: <?= $convocatoria->date_vigency ?></p>
            <a class="btn btn-warning btn-lg" href="/users">Regresar</a>
            <?php
            if ($this->session->userdata('user_rol') == 'estudiante') {
                echo '<div class="d-grid gap-2 col-4 mx-auto float-end">';
                echo '<button class="btn btn-success btn-lg" onclick="modal_postulante()"></i>Postular >>></button>';
                echo '</div>';
            } else {
            }
            ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    function modal_postulante() {
        $('#fileUploadModal').modal('show');
    }
</script>
<!-- Modal -->
<div id="fileUploadModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <?= form_open('appcontroller/postular', array('enctype' => 'multipart/form-data')) ?>
                <div class="modal-header">
                    <h5 class="modal-title">Realizar postulación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Puede agregar un mensaje:</p>
                    <input type="hidden" name="offer_id" value="<?= $convocatoria->id ?>">
                    <textarea class="form-control" id="msg_postulant" name="msg_postulant" value="$this->msg_postulant"></textarea>
                    <br>
                    <p>Cargue archivo PDF (máx. 4 MB): </p>
                    <input type='file' name='filecv' id='filecv' class='form-control'><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <input type='submit' class='btn btn-info' value='Confirmar postulación' id='btn_upload'>
                </div>
            <?= form_close() ?>
        </div>
    </div>
</div>