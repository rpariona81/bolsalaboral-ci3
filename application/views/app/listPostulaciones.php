
<div class="align-items-md-stretch mt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Actualizar datos:...</h4>
        </div>
        <div class="card-body">

            <form class="row g-3 needs-validation" novalidate>
                <div class="col-md-4">
                    <label for="name" class="form-label">Tipo de Documento de identidad</label>
                    <select class="form-select" id="document_type" name="document_type" aria-label="Default select example" disabled>
                        <option selected>$this->document_type</option>
                        <option value="1">D.N.I.</option>
                        <option value="2">CARNET DE EXTRANJERÍA</option>
                        <option value="3">PASAPORTE</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="name" class="form-label">Número de documento</label>
                    <input type="text" class="form-control" id="document_number" name="document_number" value="$this->document_number" disabled>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="career_id" class="form-label">Programa de estudios</label>
                    <select class="form-select" id="career_id" name="career_id" aria-label="Default select example">
                        <option selected>$this->document_type</option>
                        <option value="1">Arquitectura de Plataformas y Servicios de Tecnologías de la Información</option>
                        <option value="2">Enfermería Técnica</option>
                        <option value="3">Farmacia Técnica</option>
                        <option value="4">Tecnología Pesquera y Acuícola</option>
                        <option value="5">Desarrollo pesquero y acuícola</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="name" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="name" name="name" value="$this->name" disabled>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="paternal_surname" class="form-label">Apellido paterno</label>
                    <input type="text" class="form-control" id="paternal_surname" name="paternal_surname" value="$this->paternal_surname" disabled>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="maternal_surname" class="form-label">Apellido materno</label>
                    <input type="text" class="form-control" id="maternal_surname" name="maternal_surname" value="$this->maternal_surname" disabled>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="gender" class="form-label">Sexo</label>
                    <select class="form-select" id="gender" name="gender" aria-label="Default select example" disabled>
                        <option selected>$this->gender</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="birthdate" class="form-label">Fecha nacimiento</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="$this->birthdate" disabled>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="username" class="form-label">Usuario</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="inputGroupPrepend" value="$this->username" disabled>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="mobile" class="form-label">Teléfono celular:</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="$this->mobile" required>
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="address" class="form-label">Dirección actual</label>
                    <input type="text" class="form-control" id="address" name="address" value="$this->address">
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>
                <div class="col-12">
                    <div class="float-end">
                        <input class="btn btn-primary" type="submit" value="Actualizar datos"></input>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>