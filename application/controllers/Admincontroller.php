<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{

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
        if ($this->session->userdata('user_rol') == 'admin') {
            $data['contenido'] = 'admin/dashboard';
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

    public function verConvocatorias()
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            //$data['query'] = Offerjobeloquent::orderBy('date_publish','desc')->get();
            //$data['query'] = Offerjobeloquent::all();
            $data['query'] = Offerjobeloquent::getOffersjobs();
            //print_r($data['query']);
            $data['contenido'] = 'admin/convocatoriaTable';
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

    public function nuevaConvocatoria()
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $data['contenido'] = 'admin/convocatoriaNew';
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
        if ($this->session->userdata('user_rol') == 'admin') {
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
            redirect('/admin/convocatorias');
        } else {
            redirect('/admin/newconvocatoria');
        }
    }

    public function editaConvocatoria($id)
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $data['convocatoria'] = Offerjobeloquent::findOrFail($id);
            $data['contenido'] = 'admin/convocatoriaEdit';
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

    public function actualizaConvocatoria()
    {
        //$this->_validate();
        date_default_timezone_set('America/Lima');
        if ($this->session->userdata('user_rol') == 'admin') {
            $id = $this->input->post('id');
            $data = array(
                'title' => $this->input->post('title'),
                'type_offer' => $this->input->post('type_offer'),
                'career_id' => $this->input->post('career_id'),
                'detail' => $this->input->post('detail'),
                'vacancy_numbers' => $this->input->post('vacancy_numbers'),
                'date_publish' => $this->input->post('date_publish'),
                'date_vigency' => $this->input->post('date_vigency')
            );

            $model = Offerjobeloquent::findOrFail($id);
            $model->fill($data);
            $model->save($data);
            redirect('/admin/convocatorias');
        } else {
            echo "fallo actualizacion";
        }
    }

    public function desactivaConvocatoria()
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $id = $this->input->post('id', true);
            /*$data = array(
                'id' => $id,
                'status' => '0'
            );*/
            $model = Offerjobeloquent::find($id);
            $model->status = 0;
            $model->save();
            //$model = Offerjobeloquent::findOrFail($id);
            //print_r($model);
            redirect('/admin/convocatorias','refresh');
            //redirect('/admin/convocatorias');
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

    public function activaConvocatoria()
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $id = $this->input->post('id');
            /*$data = array(
                'id' => $id,
                'status' => '1'
            );*/
            $model = Offerjobeloquent::find($id);
            //$model->fill($data);
            $model->status = 1;
            $model->save();
            //print_r($model);
            redirect('/admin/convocatorias','refresh');
            //redirect('/admin/convocatorias');
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }
}

/* End of file Controllername.php */
