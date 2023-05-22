<div class="align-items-md-stretch mt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Datos personales</h4>&nbsp;<muted>Cualquier corrección o actualización deberá solicitarlo al administrador.</muted>
        </div>
        <?= my_validation_errors(validation_errors()); ?>
        <div class="card-body">
            <?= form_open('appcontroller/actualizaPerfil', array('class' => 'row g-3 needs-validation')); ?>
            <input type="hidden" id="id" name="id" value="<?= $this->session->userdata('user_id') ?>">
            <div class="col-md-4">
                <label for="name" class="form-label">Tipo de Documento de identidad</label>
                <select class="form-select" id="document_type" name="document_type" aria-label="Default select example" disabled>
                    <option selected><?= $perfil->document_type ?></option>
                    <option value="1" <?= $perfil->document_type == 1 ? ' selected="selected"' : ''; ?>>D.N.I.</option>
                    <option value="2" <?= $perfil->document_type == 2 ? ' selected="selected"' : ''; ?>>CARNET DE EXTRANJERÍA</option>
                    <option value="3" <?= $perfil->document_type == 3 ? ' selected="selected"' : ''; ?>>PASAPORTE</option>
                    <option value="9" <?= $perfil->document_type == 9 ? ' selected="selected"' : ''; ?>>Sin especificar</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="name" class="form-label">Número de documento</label>
                <input type="text" class="form-control" id="document_number" name="document_number" value="<?= $perfil->document_number ?>" disabled>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="career_id" class="form-label">Programa de estudios</label>
                <select class="form-select" id="career_id" name="career_id" aria-label="Default select example" disabled>
                    <option value="">Seleccione</option>
                    <option value="1" <?= $perfil->career_id == 1 ? ' selected="selected"' : ''; ?>>Arquitectura de Plataformas y Servicios de Tecnologías de la Información</option>
                    <option value="2" <?= $perfil->career_id == 2 ? ' selected="selected"' : ''; ?>>Enfermería Técnica</option>
                    <option value="3" <?= $perfil->career_id == 3 ? ' selected="selected"' : ''; ?>>Farmacia Técnica</option>
                    <option value="4" <?= $perfil->career_id == 4 ? ' selected="selected"' : ''; ?>>Tecnología Pesquera y Acuícola</option>
                    <option value="5" <?= $perfil->career_id == 5 ? ' selected="selected"' : ''; ?>>Desarrollo pesquero y acuícola</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="name" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $perfil->name ?>" disabled>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="paternal_surname" class="form-label">Apellido paterno</label>
                <input type="text" class="form-control" id="paternal_surname" name="paternal_surname" value="<?= $perfil->paternal_surname ?>" disabled>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="maternal_surname" class="form-label">Apellido materno</label>
                <input type="text" class="form-control" id="maternal_surname" name="maternal_surname" value="<?= $perfil->maternal_surname ?>" disabled>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-2">
                <label for="gender" class="form-label">Sexo</label>
                <select class="form-select" id="gender" name="gender" aria-label="Default select example" disabled>
                    <option selected><?= $perfil->gender ?></option>
                    <option value="Femenino" <?= $perfil->gender == 'Femenino' ? ' selected="selected"' : ''; ?>>Femenino</option>
                    <option value="Masculino" <?= $perfil->gender == 'Masculino' ? ' selected="selected"' : ''; ?>>Masculino</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="birthdate" class="form-label">Fecha nacimiento</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= $perfil->birthdate ? date_format($perfil->birthdate, 'Y-m-d') : ''; ?>" disabled>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-2">
                <label for="username" class="form-label">Usuario</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" class="form-control" id="username" name="username" aria-describedby="inputGroupPrepend" value="<?= $perfil->username ?>" disabled>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <label for="graduated" class="form-label">Situación actual</label>
                <select class="form-select" id="graduated" name="graduated" aria-label="Default select example" disabled>
                    <option value="">Seleccione</option>
                    <option value="Estudiante" <?= $perfil->graduated == 'Estudiante' ? ' selected="selected"' : ''; ?>>Estudiante</option>
                    <option value="Egresado" <?= $perfil->graduated == 'Egresado' ? ' selected="selected"' : ''; ?>>Egresado</option>
                </select>
            </div>

            <div class="card-header bg-warning"><strong>Puede actualizar información de contacto</strong></div>
            <div class="col-md-2">
                <label for="mobile" class="form-label">Teléfono celular:</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="<?= $perfil->mobile ?>" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-4">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $perfil->email ?>">
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-6">
                <label for="address" class="form-label">Dirección actual</label>
                <input type="text" class="form-control" id="address" name="address" value="<?= $perfil->address ?>">
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <?php if ($this->session->flashdata('flashSuccess')) : ?>
                <p class='alert alert-success'> <?= $this->session->flashdata('flashSuccess') ?> </p>
            <?php endif ?>

            <div class="col-12">
                <div class="float-end">
                    <input class="btn btn-primary" type="submit" value="Actualizar datos"></input>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>