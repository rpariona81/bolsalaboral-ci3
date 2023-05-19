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
            //$data['query'] = Offerjobeloquent::orderBy('date_publish','desc')->get();
            //$data['query'] = Offerjobeloquent::all();
            $data['query'] = Offerjobeloquent::getOffersjobs();
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

    public function creaConvocatoria()
    {
        //$this->_validate();
        date_default_timezone_set('America/Lima');
        if($this->session->userdata('user_rol') == 'admin'){
            $data = array(
                'title' => $this->input->post('title'),
                'type_offer' => $this->input->post('type_offer'),
                'career_id' => $this->input->post('career_id'),
                'detail' => $this->input->post('detail'),
                'vacancy_numbers' => $this->input->post('vacancy_numbers'),
                'date_publish' => $this->input->post('date_publish'),
                'date_vigency' => $this->input->post('date_vigency')
            );
    
            $model = new Offerjobeloquent();
            $model->fill($data);
            $model->save($data);
            //$this->postulatejobeloquent->save($data);
            //echo json_encode($data);
            redirect('/admin/convocatorias');
        }else{
            redirect('/admin/newconvocatoria');
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

