<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?= getenv('APP_NAME') ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--<link rel="icon" href="https://getbootstrap.com/docs/4.1/assets/img/favicons/favicon.ico">-->
  <link rel="icon" href="<?= base_url('assets/img/cropped-ricardo3-1-32x32.png') ?>">
  <!-- Bootstrap core CSS -->
  <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="<?= base_url('assets/css_ex/mystyle.css') ?>">

  <!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
  <script src="<?= base_url('assets/js/jquery-3.5.1.js') ?>"></script>

</head>

<body>

  <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-kadence text-white">
    <div class="container">
    <a class="navbar-brand" href="/">
      <img class="img rounded-circle mb-10" src="<?= base_url('assets/img/logo_2023.png') ?>" height="80" />
      &nbsp;&nbsp;&nbsp;IESTP "RICARDO RAMOS PLATA"
    </a>
    </div>
  </nav>
  <br>
  <div class="container">
    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Conoce nuestra Bolsa Laboral</h1>
          <p class="lead text-muted">Los estudiantes y egresados podrán acceder a las oportunidades de trabajo que presentan las empresas a nivel nacional y así lograr ubicarse en un puesto de acuerdo a su profesión.</p>
        </div>
      </section>
      <div class="container text-center">

        <div class="row">
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img class="card-img-top" src="<?= base_url('assets/img/login1.jpeg') ?>" alt="Estudiantes/Egresados" width="200" height="260">
              <div class="card-body">
                <h4 class="card-text">Estudiantes y egresados</h4>
                <a class="btn btn-large btn-primary" href="/wp-login"><strong>Ingresar</strong></a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <!--<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22288%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20288%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18791386041%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18791386041%22%3E%3Crect%20width%3D%22288%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2296.828125%22%20y%3D%22118.8%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">-->
              <img class="card-img-top" src="<?= base_url('assets/img/login2.jpg') ?>" alt="Docentes" width="200" height="260">
              <div class="card-body">
                <h4 class="card-text">Docentes</h4>
                <a class="btn btn-large btn-info" href="/wp-login"><strong>Ingresar</strong></a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <!--<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22288%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20288%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18791386042%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18791386042%22%3E%3Crect%20width%3D%22288%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2296.828125%22%20y%3D%22118.8%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">-->
              <img class="card-img-top" src="<?= base_url('assets/img/login3.png') ?>" alt="Administrador" width="200" height="260">
              <div class="card-body">
                <h4 class="card-text">Administrador</h4>
                <a class="btn btn-large btn-warning" href="/wp-admin"><strong>Ingresar</strong></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>

</html>