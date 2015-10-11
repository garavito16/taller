<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cpersona extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Mpersona');
	}

	function index($valor=null){
		if($valor==null){
			$valor['curl']='registrarPersona';
			$this->load->view('persona',$valor);
		}else{
			$valor['curl']='modificarPersona';
			$this->load->view('persona',$valor);
		}
		
		$this->listarPersona();
	}

	function validar(){
		$this->form_validation->set_rules('nombres', 'Nombres', 'trim|required|min_length[2]|max_length[15]');
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required|min_length[2]|max_length[35]');
		$this->form_validation->set_rules('dni', 'Dni', 'trim|required|min_length[8]|max_length[8]|numeric');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[1]|max_length[70]|valid_email');
	}

	function registrarPersona(){
		$this->validar();
		if($this->form_validation->run()!=FALSE){
			$registrar = array('nombres' => $this->input->post('nombres'),
							'apellidos' => $this->input->post('apellidos'),
							'dni' => $this->input->post('dni'),
							'email' => $this->input->post('email')
							);
			if($this->Mpersona->registrar_persona($registrar)){
				redirect('cpersona');
			}else{
				$data['mensaje']="No se pudo Registrar";
				$this->load->view('persona',$data);
			}

		}else{
			$this->load->view('persona');
		}
	}

	public function listarPersona(){
		$datos['data']=$this->Mpersona->listar_persona();
		if(isset($datos)){
			$this->load->view('lista_persona',$datos);
		}else{
			$datos['lista']="No Hay Datos a Mostrar";
			$this->load->view('persona',$datos);
		}
	}

	function buscarPersona(){
		$this->form_validation->set_rules('id',' ','trim|numeric|required');
		if($this->form_validation->run()!=FALSE){
			$id=$this->input->post('id');
			$resultado['listados']=$this->Mpersona->buscar_persona($id);
			$this->index($resultado);
		}else{
			redirect('cpersona');
		}
	}
	// Hola mundo
	function eliminarPersona(){
		$this->form_validation->set_rules('id', 'id', 'required');
		if($this->form_validation->run()!=FALSE){
			$id=$this->input->post('id');
			if($this->Mpersona->eliminar_persona($id)){
				redirect('cpersona');
			}else{
				echo "error al eliminar";
				echo "<a href='cpersona'>Regresar</a>";
			}
		}else{
			echo "error al eliminar v";
			echo "<a href='cpersona'>Regresar</a>";
		}
	}

	function modificarPersona(){
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->validar();
		if($this->form_validation->run()!=FALSE){
			$actualizar = array('nombres' => $this->input->post('nombres'),
							'apellidos' => $this->input->post('apellidos'),
							'dni' => $this->input->post('dni'),
							'email' => $this->input->post('email')
							);
			$id=$this->input->post('id');
			if($this->Mpersona->modificar_persona($actualizar,$id)){
				redirect('cpersona');
			}else{
				echo "error al modificar";
				echo "<a href='cpersona'>Regresar</a>";
			}
		}else{
			$valor['curl']='modificarPersona';
			$this->load->view('persona',$valor);
			$this->listarPersona();
		}
	}
}
?>
