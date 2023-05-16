<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

    <link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body style="background-color:#26375c;">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="login-logo text-center mt-4">
                        <img src="<?= base_url('assets/img/logoFondoBlack.png') ?>" width="250" height="250" id="logo">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card border-0 rounded-lg mt-4">
                                <!--<div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>-->
                                <div class="card-header">
                                    <h3>Bienvenido(a)</h3>
                                    <p class="font-weight-light my-4">Ingresa tu usuario y contraseña para iniciar sesión</p>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputUser" type="text" placeholder="Usuario" required />
                                            <label for="inputUser">Usuario</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" placeholder="Contraseña" required />
                                            <label for="inputPassword">Contraseña</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                            <input class="btn btn-primary" id="btnLogin" type="submit" value="Ingresar"></input>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <br />
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; IESTP Ricardo Ramos Plata</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/scripts.js') ?>"></script>
</body>

</html>