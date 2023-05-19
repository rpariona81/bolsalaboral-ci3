<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <link href="<?= base_url('assets/font-awesome/4.7.0/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css_ex/styles.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css_ex/custom.css') ?>" rel="stylesheet" />

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>-->

    <!--<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    </link>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    </link>-->
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    </link>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    </link>
    
    <!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
    <!--<script src="< ?= base_url('assets/js/jquery-3.5.1.js') ?>"></script>
    <script src="< ?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<script src="< ?= base_url('assets/js/bootstrap.min.js') ?>"></script>



<script src="< ?= base_url('assets/js_ex/scripts.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>-->
</head>

<body class="sb-nav-fixed">
    <!--<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">-->
    <nav class="sb-topnav navbar navbar-expand navbar-default bg-warning">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 text-black" href="#">
            <strong>Bolsa Laboral RRP</strong></a>

        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fa fa-bars"></i></button>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-black" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <strong>Administrador</strong><i class="fa fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Cambiar clave</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <!-- Boton salir-->
                    <form class="text-center ml-4" action="/logout">
                        <input class="btn btn-primary" id="btnLogout" type="submit" value="Cerrar sesión"></input>
                    </form>

                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">

        <div id="layoutSidenav_nav">


            <nav class="sb-sidenav accordion sb-sidenav-kadence" id="sidenavAccordion">
                <!--<nav class="sb-sidenav accordion sb-sidenav-info border border-primary bg-default" id="sidenavAccordion">-->

                <div class="sb-sidenav-menu">

                    <div class="nav">
                        <!--<img class="img login-logo rounded-circle mb-0" src="img/logoFondoBlack.png" height="50" />
                        <div class="sb-sidenav-menu-heading">Core</div>-->
                        <img class="img login-logo rounded-circle mb-0" src="<?= base_url('assets/img/logo_2023.png') ?>" height="50" />
                        <a class="nav-link active" href="/admin/">
                            <div class="sb-nav-link-icon"><i class="fa fa-home"></i></div>
                            Inicio
                        </a>
                        <a class="nav-link collapsed" href="/admin/students/list">
                            <div class="sb-nav-link-icon"><i class="fa fa-address-book"></i></div>
                            Estudiantes/Egresados
                        </a>
                        <a class="nav-link collapsed" href="/admin/teachers/list">
                            <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>
                            Docentes
                        </a>
                        <a class="nav-link" href="/admin/convocatorias">
                            <div class="sb-nav-link-icon"><i class="fa fa-area-chart"></i></div>
                            Convocatorias
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fa-list-ul"></i></div>
                            Postulaciones
                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/admin/reportes/programas">Por programa de estudios</a>
                                <a class="nav-link" href="/admin/reportes/fechas">Por rango de fechas</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fa fa-user-secret"></i></div>
                            Datos del administrador
                        </a>
                        <form class="ml-4" action="/logout">
                            &nbsp;&nbsp;&nbsp;<input class="btn btn-primary" id="btnLogout" type="submit" value="Cerrar sesión"></input>
                        </form>

                    </div>
                </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <?php $this->load->view($contenido); ?>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; IESTP Ricardo Ramos Plata</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    
    <script src="<?= base_url('assets/js_ex/scripts.js') ?>"></script>

    <!--<script src="< ?= base_url('assets/js/bootstrap.min.js') ?>"></script>-->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    
    <!--<script src="< ?= base_url('assets/js/datatables-simple-demo.js') ?>"></script>-->

    <script>
        $(document).ready(function() {
            //$.noConflict();
            $('#lista').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    customize: function(xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];

                        $('row c[r^="C"]', sheet).attr('s', '2');
                    }
                }]
            });
        });
    </script>
</body>

</html>