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

    public function _do_upload()
    {
        $config['upload_path']          = 'uploads/filescv/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 4096;
        $config['file_name']             = round(microtime(true) * 1000);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('filecv')) {
            $error = array('error' => $this->upload->display_errors());
            //print_r($error); die();
            //$this->load->view('upload_form', $error);
            $data['error_string'][] = 'Error de carga de archivo: ' . $this->upload->display_errors('', '');
                $data['status'][] = FALSE;
                echo json_encode($data);
                exit();
            //return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());
            //print_r("Funciona!!");
            //$route_filecv = $data['full_path'];
            //print_r($data);
            return $data;
            //$this->load->view('upload_success', $data);
        }

        /*if (!$this->input->post('upload') != NULL) {

            if (!$this->upload->do_upload('filecv')) {
                $data['inputerror'][] = 'filecv';
                $data['error_string'][] = 'Error de carga de archivo: ' . $this->upload->display_errors('', '');
                $data['status'][] = FALSE;
                echo json_encode($data);
                exit();
            } else {
                return $this->upload->data('filecv');
            }
        }*/
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->session->userdata('user_id') == NULL) {
            $data['inputerror'][] = 'user_id';
            $data['error_string'][] = 'No ha iniciado sesión correctamente';
            $data['status'] = FALSE;
        }

        if ($this->input->post('offer_id') == NULL) {
            $data['inputerror'][] = 'offer_id';
            $data['error_string'][] = 'No ha seleccionado oferta laboral';
            $data['status'] = FALSE;
        }

        /*if ($this->input->post('date_postulation') == '') {
            $data['inputerror'][] = 'date_postulation';
            $data['error_string'][] = 'Error de fecha de postulación';
            $data['status'] = FALSE;
        }*/

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            //redirect()
            exit();
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
            if($upload){
                $data['route_filecv'] = $upload['upload_data']['full_path'];
                $data['filecv'] = $upload['upload_data']['file_name'];
            }else{
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
