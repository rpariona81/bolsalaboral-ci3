<div class="align-items-md-stretch mt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Nueva convocatoria</h4>
        </div>
        <div class="card-body">
            <?= form_open('admincontroller/creaConvocatoria', array('class' => 'row g-3 needs-validation')); ?>
            <div class="col-md-4">
                <label for="title" class="form-label">Título</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo set_value('title')?>" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="type_offer" class="form-label">Tipo de convocatoria</label>
                <select class="form-select" id="type_offer" name="type_offer" aria-label="Default select example" required>
                    <option value="" selected>Seleccione</option>
                    <option value="Tiempo parcial">Tiempo parcial</option>
                    <option value="Tiempo completo">Tiempo completo</option>
                    <option value="Prácticas pre-profesionales">Prácticas pre-profesionales</option>
                    <option value="Prácticas profesionales">Prácticas profesionales</option>
                    <option value="Empleo temporal">Empleo temporal</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="career_id" class="form-label">Programa de estudios</label>
                <select class="form-select" id="career_id" name="career_id" aria-label="Default select example" required>
                    <option value="" selected>Seleccione</option>
                    <option value="1">Arquitectura de Plataformas y Servicios de Tecnologías de la Información</option>
                    <option value="2">Enfermería Técnica</option>
                    <option value="3">Farmacia Técnica</option>
                    <option value="4">Tecnología Pesquera y Acuícola</option>
                    <option value="5">Desarrollo pesquero y acuícola</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="detail" class="form-label">Detalle</label>
                <textarea class="form-control" id="detail" name="detail" value="<?php echo set_value('detail') ?>" required></textarea>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-2">
                <label for="vacancy_numbers" class="form-label"># Vacantes</label>
                <input type="number" class="form-control" id="vacancy_numbers" name="vacancy_numbers" value="<?php echo set_value('vacancy_numbers') ?>" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-2">
                <label for="date_publish" class="form-label">Fecha publicación</label>
                <input type="date" class="form-control" id="date_publish" name="date_publish" value="<?php echo set_value('date_publish') ?>" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-2">
                <label for="date_vigency" class="form-label">Fecha límite</label>
                <input type="date" class="form-control" id="date_vigency" name="date_vigency" value="<?php echo set_value('date_vigency') ?>" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            
            <div class="col-12">
                <div class="float-end">
                    <a href="/admin/convocatorias" class="btn btn-danger" type="button">Cancelar</a>
                    <input class="btn btn-primary" type="submit" value="Crear convocatoria"></input>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>