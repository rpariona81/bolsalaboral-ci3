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
        $this->form_validation->set_message('no_repetir_username', 'Existe otro registro con el mismo %s');
        $this->form_validation->set_message('no_repetir_email', 'Existe otro registro con el mismo %s');
        $this->form_validation->set_message('no_repetir_document', 'Existe otro registro con el mismo %s');
        
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
            redirect('/admin/convocatorias', 'refresh');
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
            redirect('/admin/convocatorias', 'refresh');
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
            redirect('/admin/convocatorias', 'refresh');
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
            $fechaactual = date('Y-m-d'); // 2016-12-29
            $nuevafecha = strtotime('-16 year', strtotime($fechaactual)); //Se resta un año menos
            $data['fechamax'] = date('Y-m-d', $nuevafecha);
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

    public function no_repetir_username($username)
    {
        $usuario = UserEloquent::getUserBy('username', $username);
        if ($usuario) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function no_repetir_email($email)
    {
        $usuario = UserEloquent::getUserBy('email', $email);
        if ($usuario) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function no_repetir_document($document)
    {
        $usuario = UserEloquent::getUserBy('document_number', $document);
        if ($usuario) {
            return FALSE;
        } else {
            return TRUE;
        }
    }


    public function creaEstudiante()
    {
        //$this->_validate();
        /*$usuario = UserEloquent::getUserBy('username', $this->input->post('username'));
        //$query = $this->ci->db->get('usuarios');
        if ($usuario) {
            //redirect('/admin/newestudiante');
            //return FALSE;
            $this->nuevoEstudiante();
        } else {
            $usuario = UserEloquent::getUserBy('email', $this->input->post('email'));
            if ($usuario) {
                //return FALSE;
                $this->nuevoEstudiante();
                //redirect('/admin/newestudiante');
            } else {*/
        $this->form_validation->set_rules('name', 'Nombres', 'required');
        $this->form_validation->set_rules('username', 'Usuario', 'required|callback_no_repetir_username');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|callback_no_repetir_email');
        $this->form_validation->set_rules('document_number', 'Nro documento', 'required|callback_no_repetir_document');
        //si el proceso falla mostramos errores
        if ($this->form_validation->run() == FALSE) {
            $this->nuevoEstudiante();
            //en otro caso procesamos los datos
        } else {

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
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'remember_token' => base64_encode($this->input->post('password')),
                    'role_id' => '4'
                );
                $model = new UserEloquent();
                $model->fill($data);
                $model->save();
                //print_r($model);
                redirect('/admin/estudiantes');
            } else {
                redirect('/admin/newestudiante');
            }
            //}
        }
    }

    public function editaEstudiante($id)
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $data['usuario'] = UserEloquent::findOrFail($id);
            $fechaactual = date('Y-m-d'); // 2016-12-29
            $nuevafecha = strtotime('-16 year', strtotime($fechaactual)); //Se resta un año menos
            $data['fechamax'] = date('Y-m-d', $nuevafecha);
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
            if (password_verify($this->input->post('password'), $model->password)) {
                $data['password'] = $model->password;
                $data['remember_token'] = $model->remember_token;
            } else {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                $data['remember_token'] = base64_encode($this->input->post('password'));
            }
            $model->fill($data);
            $model->save();
            redirect('/admin/estudiantes', 'refresh');
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
            redirect('/admin/estudiantes', 'refresh');
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
            redirect('/admin/estudiantes', 'refresh');
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
            $fechaactual = date('Y-m-d'); // 2016-12-29
            $nuevafecha = strtotime('-21 year', strtotime($fechaactual)); //Se resta un año menos
            $data['fechamax'] = date('Y-m-d', $nuevafecha);
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
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'remember_token' => base64_encode($this->input->post('password')),
                'role_id' => '3'
            );

            $model = new UserEloquent();
            $model->fill($data);
            $model->save($data);
            redirect('/admin/docentes');
        } else {
            redirect('/admin/newdocente');
        }
    }

    public function editaDocente($id)
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $data['usuario'] = UserEloquent::findOrFail($id);
            $fechaactual = date('Y-m-d'); // 2016-12-29
            $nuevafecha = strtotime('-21 year', strtotime($fechaactual)); //Se resta un año menos
            $data['fechamax'] = date('Y-m-d', $nuevafecha);
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
            if (password_verify($this->input->post('password'), $model->password)) {
                $data['password'] = $model->password;
                $data['remember_token'] = $model->remember_token;
            } else {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                $data['remember_token'] = base64_encode($this->input->post('password'));
            }
            $model->fill($data);
            $model->save();
            redirect('/admin/docentes', 'refresh');
        } else {
            echo "fallo actualizacion";
        }
    }

    public function desactivaDocente()
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $id = $this->input->post('id', true);
            $model = UserEloquent::find($id);
            $model->status = FALSE;
            $model->save();
            redirect('/admin/docentes', 'refresh');
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

    public function activaDocente()
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $id = $this->input->post('id', true);
            $model = UserEloquent::find($id);
            $model->status = TRUE;
            $model->save();
            redirect('/admin/docentes', 'refresh');
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

    /**
     * CONTROL DE POSTULACIONES
     *  */

    public function verPostulaciones($offer_id = NULL)
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $data['query'] = PostulateJobEloquent::getReportPostulations($offer_id);
            //echo json_encode($data['query']);
            $data['contenido'] = 'admin/postulacionTable';
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

    public function desactivaPostulacion()
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $id = $this->input->post('id');
            $programa = '/admin/postulaciones/' . $this->input->post('career_id');
            $model = PostulateJobEloquent::find($id);
            $model->status = 0;
            $model->save();
            //print_r($programa);
            //redirect('/admin/postulaciones','refresh');    
            redirect($programa . '', 'refresh');
            //redirect(site_url(uri_string()),'refresh');
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }

    public function activaPostulacion()
    {
        if ($this->session->userdata('user_rol') == 'admin') {
            $id = $this->input->post('id');
            $programa = '/admin/postulaciones/' . $this->input->post('career_id');
            $model = PostulateJobEloquent::find($id);
            $model->status = 1;
            $model->save();
            //print_r($programa);
            //redirect('/admin/postulaciones','refresh');    
            redirect($programa . '', 'refresh');
            //redirect(site_url(uri_string()),'refresh');
        } else {
            $this->session->set_flashdata('error');
            redirect('/wp-admin');
        }
    }
}

/* End of file Controllername.php */
