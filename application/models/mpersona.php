<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mpersona extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function registrar_persona($datos){
		if($this->db->insert('personas',$datos)){
			return true;
		}else{
			return false;
		}
	}

	function listar_persona(){
		$datos=$this->db->select('nombres,apellidos,dni,id')
				 		->from('personas')
				 		->get()
				 		->result();
		return $datos;
	}

	function buscar_persona($data){
		$datos=$this->db->get_where('personas',array('id' => $data))
						->result();
		return $datos;
	}

	function eliminar_persona($id){
		if($this->db->delete('personas',array('id' => $id))){
			return true;
		}else{
			return false;
		}
	}

	function modificar_persona($datos,$id){
		$this->db->where('id',$id);
		if($this->db->update('personas',$datos)){
			return true;
		}else{
			return false;
		}
	}

}
?>