<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Support\Facades\Request;


class AppController extends CI_Controller
{


    private $accessoPermitido;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'my_tag_helper'));
        $this->load->model('offerjobeloquent');
        $this->load->model('postulatejobeloquent');
        $this->load->model('usereloquent');
    }
    public function index()
    {
        //$accessoPermitido = $this->session->has_userdata('isLogged') ? $this->session->userdata('isLogged') : FALSE;
        if ($this->session->userdata('user_rol') != NULL) {
            $data = [];
            //$data['rol'] = $this->session->userdata('user_rol');
            $data['pagina'] = 'app/listConvocatorias';
            $data['query'] = Offerjobeloquent::where('status', '=', 1)->get();
            $this->load->view('app/layout/main', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-login');
        }
    }

    public function viewConvocatoria($id = NULL)
    {
        if ($this->session->userdata('user_rol') != NULL) {
            $data['convocatoria'] = Offerjobeloquent::findOrFail($id);
            $data['pagina'] = 'app/viewConvocatoria';
            $this->load->view('app/layout/main', $data);
        } else {
            $this->session->set_flashdata('error', '');
            redirect('/wp-login');
        }
    }

    public function viewPerfil()
    {
        if ($this->session->userdata('user_rol') != NULL) {
            $data['pagina'] = 'app/viewPerfil';
            $data['perfil'] = Usereloquent::findOrFail($this->session->userdata('user_id'));
            $this->load->view('app/layout/main', $data);
        } else {
            $this->session->set_flashdata('error', '');
            redirect('/wp-login');
        }
    }

    public function viewPostulaciones()
    {
        if ($this->session->userdata('user_rol') != NULL) {
            $data['query'] = Postulatejobeloquent::getPostulations($this->session->userdata('user_id'));
            $data['pagina'] = 'app/listPostulaciones';
            //echo json_encode($data['query']);
            $this->load->view('app/layout/main', $data);
        } else {
            $this->session->set_flashdata('error', '');
            redirect('/wp-login');
        }
    }

    public function viewCredenciales()
    {
        if ($this->session->userdata('user_rol') != NULL) {
            $data['pagina'] = 'app/viewCredencial';
            $this->load->view('app/layout/main', $data);
        } else {
            $this->session->set_flashdata('error', '');
            redirect('/wp-login');
        }
    }

    public function cambiarClave()
    {
        
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
