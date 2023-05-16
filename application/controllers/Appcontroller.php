<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Support\Facades\Request;


class AppController extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('offerjobeloquent');
    }
    public function index()
    {

        //$this->load->model('offerjobeloquent');

        $data = [];
        $data['rol'] = 'estudiante';
        //$data['rol'] = 'docente';

        $data['pagina'] = 'app/listConvocatorias';

        $data['query'] = Offerjobeloquent::where('status', '=', 1)->get();

        //echo $data['query'];
        $this->load->view('app/layout/main', $data);

        //$data['rol'] = session()->userdata['role'];

        //echo "front";
    }

    public function viewConvocatoria($id = NULL)
    {
        $data['rol'] = 'estudiante';
        $data['convocatoria'] = $data['query'] = Offerjobeloquent::findOrFail($id);
        $data['pagina'] = 'app/viewConvocatoria';
        $this->load->view('app/layout/main', $data);
    }

    public function viewPerfil()
    {
        $data['rol'] = 'estudiante';
        $data['pagina'] = 'app/viewPerfil';
        $this->load->view('app/layout/main', $data);
    }

    public function viewPostulaciones()
    {
        $data['rol'] = 'estudiante';
        $data['pagina'] = 'app/listPostulaciones';
        $this->load->view('app/layout/main', $data);
    }

    public function viewCredenciales()
    {
        $data['rol'] = 'estudiante';
        $data['pagina'] = 'app/viewPerfil';
        $this->load->view('app/layout/main', $data);
    }

    public function do_upload()
    {
        $config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 4096;

        $this->load->library('upload', $config);

        if ($this->input->post('upload') != NULL) {

            if (!$this->upload->do_upload('filecv')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('upload_form', $error);
            } else {
                $data = array('upload_data' => $this->upload->data());

                $this->load->view('upload_success', $data);
            }
        }
    }
}

/* End of file Controllername.php */
