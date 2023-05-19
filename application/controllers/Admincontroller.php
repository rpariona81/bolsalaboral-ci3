<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {


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
        if($this->session->userdata('user_rol') == 'admin'){
            $data['contenido'] = 'admin/dashboard';
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
        
    }

    public function verConvocatorias()
    {
        if($this->session->userdata('user_rol') == 'admin'){
            $data['query'] = Offerjobeloquent::all();
            $data['contenido'] = 'admin/tblConvocatorias';
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
        
    }

    public function nuevaConvocatoria()
    {
        if($this->session->userdata('user_rol') == 'admin'){
            $data['contenido'] = 'admin/newConvocatoria';
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
        
    }

    public function editaConvocatoria($id)
    {
        if($this->session->userdata('user_rol') == 'admin'){
            $data['convocatoria'] = Offerjobeloquent::findOrFail($id);
            $data['contenido'] = 'admin/editConvocatoria';
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
        
    }

}

/* End of file Controllername.php */
