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
        $this->form_validation->set_message('no_repetir_email', 'Existe otro registro con el mismo %s');
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

    public function no_repetir_email($registro)
    {
        $registro = $this->input->post();
        $usuario = UserEloquent::getUserBy('email', $registro['email']);
        if ($usuario and (!isset($registro['id']) or ($registro['id'] != $usuario->id))) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function actualizaPerfil()
    {
        $registro = $this->input->post();
        $this->form_validation->set_rules('email', 'Email', 'valid_email|callback_no_repetir_email');
        //si el proceso falla mostramos errores
        if ($this->form_validation->run() == FALSE) {
            $this->viewPerfil();
            //en otro caso procesamos los datos
        } else {

            date_default_timezone_set('America/Lima');
            if ($this->session->userdata('user_rol') != NULL) {
                $id = $this->session->userdata('user_id');
                $data = array(
                    'mobile' => $this->input->post('mobile'),
                    'email' => $this->input->post('email'),
                    'address' => $this->input->post('address')
                );

                $model = UserEloquent::findOrFail($id);
                $model->fill($data);
                $model->save($data);
                // Display success message
                $this->session->set_flashdata('flashSuccess', 'Actualización exitosa.');
                redirect('/users/perfil');
            } else {
                $this->viewPerfil();
            }
        }
    }

    public function cambiarClave()
    {
    }

    public function _do_upload()
    {
        $config['upload_path']          = FCPATH . 'uploads/filescv/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 4096;
        $config['file_name']             = round(microtime(true) * 1000);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('filecv')) {
            $error = array('error' => $this->upload->display_errors());
            //print_r($error); die();
            $data['error_string'][] = 'Error de carga de archivo: ' . $this->upload->display_errors('', '');
            $data['status'][] = FALSE;
            echo json_encode($data);
            exit();
        } else {
            $data = array('upload_data' => $this->upload->data());
            //print_r("Funciona!!");
            //$route_filecv = $data['full_path'];
            //print_r($data);
            return $data;
            //$this->load->view('upload_success', $data);
        }
    }

    public function postular()
    {
        //print_r($_FILES);
        //$this->_do_upload();
        $this->_validate();
        date_default_timezone_set('America/Lima');

        $data = array(
            'user_id' => $this->session->userdata('user_id'),
            'offer_id' => $this->input->post('offer_id'),
            'msg_postulant' => $this->input->post('msg_postulant'),
            'email_notification' => $this->session->userdata('user_email'),
            'date_postulation' => date("Y-m-d H:i:s"),
        );

        if (!empty($_FILES)) {
            $upload = $this->_do_upload();
            if ($upload) {
                $data['route_filecv'] = $upload['upload_data']['full_path'];
                $data['filecv'] = $upload['upload_data']['file_name'];
            } else {
                return FALSE;
            }
        }

        $model = new Postulatejobeloquent();
        $model->fill($data);
        $model->save($data);
        //$this->postulatejobeloquent->save($data);
        //echo json_encode($data);
        redirect('/users/postulaciones');
    }
}

/* End of file Controllername.php */
