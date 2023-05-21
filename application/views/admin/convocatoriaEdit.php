<div class="align-items-md-stretch mt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Editar convocatoria</h4>
        </div>
        <div class="card-body">
            <?= form_open('admincontroller/actualizaConvocatoria', array('class' => 'row g-3 needs-validation')); ?>
            <div class="col-md-4">
                <label for="title" class="form-label">Título</label>
                <input type="hidden" value="<?=$convocatoria->id?>" name="id" id="id">
                <input type="text" class="form-control" id="title" name="title" minlength="10" value="<?= $convocatoria->title ?>">
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="type_offer" class="form-label">Tipo de convocatoria</label>
                <select class="form-select" id="type_offer" name="type_offer" aria-label="Default select example" >
                    <option value="">Seleccione</option>
                    <option value="Tiempo parcial" <?= $convocatoria->type_offer == 'Tiempo parcial' ? ' selected="selected"' : '';?>>Tiempo parcial</option>
                    <option value="Tiempo completo" <?= $convocatoria->type_offer == 'Tiempo completo' ? ' selected="selected"' : '';?>>Tiempo completo</option>
                    <option value="Prácticas pre-profesionales" <?= $convocatoria->type_offer == 'Prácticas pre-profesionales' ? ' selected="selected"' : '';?>>Prácticas pre-profesionales</option>
                    <option value="Prácticas profesionales" <?= $convocatoria->type_offer == 'Prácticas profesionales' ? ' selected="selected"' : '';?>>Prácticas profesionales</option>
                    <option value="Empleo temporal" <?= $convocatoria->type_offer == 'Empleo temporal' ? ' selected="selected"' : '';?>>Empleo temporal</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="career_id" class="form-label">Programa de estudios</label>
                <select class="form-select" id="career_id" name="career_id" aria-label="Default select example">
                    <option value="">Seleccione</option>
                    <option value="1" <?= $convocatoria->career_id == 1 ? ' selected="selected"' : '';?>>Arquitectura de Plataformas y Servicios de Tecnologías de la Información</option>
                    <option value="2" <?= $convocatoria->career_id == 2 ? ' selected="selected"' : '';?>>Enfermería Técnica</option>
                    <option value="3" <?= $convocatoria->career_id == 3 ? ' selected="selected"' : '';?>>Farmacia Técnica</option>
                    <option value="4" <?= $convocatoria->career_id == 4 ? ' selected="selected"' : '';?>>Tecnología Pesquera y Acuícola</option>
                    <option value="5" <?= $convocatoria->career_id == 5 ? ' selected="selected"' : '';?>>Desarrollo pesquero y acuícola</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="detail" class="form-label">Detalle</label>
                <textarea class="form-control" id="detail" name="detail" minlength="30"><?=$convocatoria->detail ?></textarea>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-2">
                <label for="vacancy_numbers" class="form-label"># Vacantes</label>
                <input type="number" class="form-control" id="vacancy_numbers" min="1" max="30" data-toggle="tooltip" data-placement="top" title="Mínimo 1, Máximo 30" name="vacancy_numbers" value="<?= $convocatoria->vacancy_numbers ?>">
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-2">
                <label for="date_publish" class="form-label">Fecha publicación</label>
                <input type="date" class="form-control" id="date_publish" name="date_publish" value="<?= date_format($convocatoria->date_publish,'Y-m-d') ?>" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-2">
                <label for="date_vigency" class="form-label">Fecha límite</label>
                <input type="date" class="form-control" id="date_vigency" name="date_vigency" value="<?= date_format($convocatoria->date_vigency,'Y-m-d') ?>" onchange="validaFechas();" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            
            <div class="col-12">
                <div class="float-end">
                    <a href="/admin/convocatorias" class="btn btn-danger" type="button">Cancelar</a>
                    <input class="btn btn-primary" type="submit" value="Actualizar convocatoria"></input>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(':input[type="number"]').change(function() {
            var max = parseInt($(this).attr('max'));
            var min = parseInt($(this).attr('min'));
            if ($(this).val() > max) {
                $(this).val(max);
            } else if ($(this).val() < min) {
                $(this).val(min);
            }
        });
    });
</script>

<script>
    function getDateObj(dateString) {
        var parts = dateString.split('-');
        var date = parts[2];
        var month = parts[1];
        var year = parts[0];
        return new Date(year, month, date).getTime();
    }
</script>

<script>
    function validaFechas() {
        var date1 = document.getElementById('date_publish').value;
        var date2 = document.getElementById('date_vigency').value;
        //console.log(date1 + "---" + date2);
        var dateObjFrom = getDateObj(date1);
        var dateObjTo = getDateObj(date2);
        console.log(dateObjFrom + "---" + dateObjTo);
        //alert(dateObjTo);
        if (dateObjFrom > dateObjTo) {
            console.log('La fecha de publicación no puede ser mayor a la fecha límite.');
            alert('La fecha de publicación no puede ser mayor a la fecha límite.');
            $("#date_vigency").val('');
        }
    }
</script>