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

    /**
     * CONTROL DE CONVOCATORIAS
     *  */ 

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
            redirect('/admin/convocatorias','refresh');
        } else {
            echo "fallo actualizacion";
        }
    }

    public function desactivaConvocatoria()
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $id = $this->input->post('id', true);
            $model = Offerjobeloquent::find($id);
            $model->status = 0;
            $model->save();
            redirect('/admin/convocatorias','refresh');
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

    public function activaConvocatoria()
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $id = $this->input->post('id');
            $model = Offerjobeloquent::find($id);
            $model->status = 1;
            $model->save();
            redirect('/admin/convocatorias','refresh');            
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

    /**
     * CONTROL DE ESTUDIANTES Y EGRESADOS
     *  */ 
    public function verEstudiantes()
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $data['query'] = UserEloquent::getUserEstudiantes();
            $data['contenido'] = 'admin/estudianteTable';
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

    public function nuevoEstudiante()
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $data['contenido'] = 'admin/estudianteNew';
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

    public function creaEstudiante()
    {
        //$this->_validate();
        date_default_timezone_set('America/Lima');
        if ($this->session->userdata('user_rol') == 'admin') {
            $data = array(
                'document_type' => $this->input->post('document_type'),
                'document_number' => $this->input->post('document_number'),
                'career_id' => $this->input->post('career_id'),
                'name' => $this->input->post('name'),
                'paternal_surname' => $this->input->post('paternal_surname'),
                'maternal_surname' => $this->input->post('maternal_surname'),
                'gender' => $this->input->post('gender'),
                'birthdate' => $this->input->post('birthdate'),
                'username' => $this->input->post('username'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'graduated' => $this->input->post('graduated'),
                'address' => $this->input->post('address'),
                'role_id' => '4'
            );

            $model = new UserEloquent();
            $model->fill($data);
            $model->save($data);
            redirect('/admin/estudiantes');
        } else {
            redirect('/admin/newestudiante');
        }
    }

    public function editaEstudiante($id)
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $data['usuario'] = UserEloquent::findOrFail($id);
            $data['contenido'] = 'admin/estudianteEdit';
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

    public function actualizaEstudiante()
    {
        //$this->_validate();
        date_default_timezone_set('America/Lima');
        if ($this->session->userdata('user_rol') == 'admin') {
            $id = $this->input->post('id');
            $data = array(
                'document_type' => $this->input->post('document_type'),
                'document_number' => $this->input->post('document_number'),
                'career_id' => $this->input->post('career_id'),
                'name' => $this->input->post('name'),
                'paternal_surname' => $this->input->post('paternal_surname'),
                'maternal_surname' => $this->input->post('maternal_surname'),
                'gender' => $this->input->post('gender'),
                'birthdate' => $this->input->post('birthdate'),
                'username' => $this->input->post('username'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'graduated' => $this->input->post('graduated'),
                'address' => $this->input->post('address')
            );

            $model = UserEloquent::findOrFail($id);
            $model->fill($data);
            $model->save();
            redirect('/admin/estudiantes','refresh');
        } else {
            echo "fallo actualizacion";
        }
    }

    public function desactivaEstudiante()
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $id = $this->input->post('id', true);
            $model = UserEloquent::find($id);
            $model->status = 0;
            $model->save();
            redirect('/admin/estudiantes','refresh');
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

    public function activaEstudiante()
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $id = $this->input->post('id');
            $model = UserEloquent::find($id);
            $model->status = 1;
            $model->save();
            redirect('/admin/estudiantes','refresh');            
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

        /**
     * CONTROL DE DOCENTES
     *  */ 
    public function verDocentes()
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $data['query'] = UserEloquent::getUserDocentes();
            $data['contenido'] = 'admin/docenteTable';
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

    public function nuevoDocente()
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $data['contenido'] = 'admin/docenteNew';
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

    public function creaDocente()
    {
        //$this->_validate();
        date_default_timezone_set('America/Lima');
        if ($this->session->userdata('user_rol') == 'admin') {
            $data = array(
                'document_type' => $this->input->post('document_type'),
                'document_number' => $this->input->post('document_number'),
                'career_id' => $this->input->post('career_id'),
                'name' => $this->input->post('name'),
                'paternal_surname' => $this->input->post('paternal_surname'),
                'maternal_surname' => $this->input->post('maternal_surname'),
                'gender' => $this->input->post('gender'),
                'birthdate' => $this->input->post('birthdate'),
                'username' => $this->input->post('username'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'graduated' => $this->input->post('graduated'),
                'address' => $this->input->post('address'),
				'role_id' => '3'
            );

            $model = new UserEloquent();
            $model->fill($data);
            $model->save($data);
            redirect('/admin/Docentes');
        } else {
            redirect('/admin/newdocente');
        }
    }

    public function editaDocente($id)
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $data['usuario'] = UserEloquent::findOrFail($id);
            $data['contenido'] = 'admin/docenteEdit';
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

    public function actualizaDocente()
    {
        //$this->_validate();
        date_default_timezone_set('America/Lima');
        if ($this->session->userdata('user_rol') == 'admin') {
            $id = $this->input->post('id');
            $data = array(
                'document_type' => $this->input->post('document_type'),
                'document_number' => $this->input->post('document_number'),
                'career_id' => $this->input->post('career_id'),
                'name' => $this->input->post('name'),
                'paternal_surname' => $this->input->post('paternal_surname'),
                'maternal_surname' => $this->input->post('maternal_surname'),
                'gender' => $this->input->post('gender'),
                'birthdate' => $this->input->post('birthdate'),
                'username' => $this->input->post('username'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'graduated' => $this->input->post('graduated'),
                'address' => $this->input->post('address')
            );

            $model = UserEloquent::findOrFail($id);
            $model->fill($data);
            $model->save();
            redirect('/admin/Docentes','refresh');
        } else {
            echo "fallo actualizacion";
        }
    }

    public function desactivaDocente()
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $id = $this->input->post('id', true);
            $model = UserEloquent::find($id);
            $model->status = 0;
            $model->save();
            redirect('/admin/Docentes','refresh');
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

    public function activaDocente()
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $id = $this->input->post('id');
            $model = UserEloquent::find($id);
            $model->status = 1;
            $model->save();
            redirect('/admin/Docentes','refresh');            
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }


}

/* End of file Controllername.php */

