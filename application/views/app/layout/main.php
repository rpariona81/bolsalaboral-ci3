<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <div class="text-muted">Copyright &copy; IESTP Ricardo Ramos Plata</div>
    </div>
</footer>


<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

</body>

</html><?php
//defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('app/layout/header');

echo '<!-- Begin page content -->';
echo '<main class="flex-shrink-0">';
echo '  <div class="container">';

$this->load->view($pagina);

echo '  </div>';
echo '</main>';
echo '<br/>';
$this->load->view('app/layout/footer');