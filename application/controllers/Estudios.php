<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudios extends CI_Controller {


 public function __construct(){
	 parent::__construct();
	 $this->load->helper(array('form', 'url','url_helper'));
	 $this->load->library('form_validation');
 }


public function modificar($id_estudio = null, $modificacion = null){

	if($id_estudio != null) {

	 $this->load->model('Estudio');
	 $estudio = $this->Estudio->obtener_estudio_por_id($id_estudio);

	 $data["estudio"] = $estudio;

	 if($modificacion == NULL){
	 	$this->load->view('modificar_estudio',$data);
	 }else{
		 
			$this->form_validation->set_rules('institucion', 'Institución', 'required');
			$this->form_validation->set_rules('pais', 'País', 'required');
			$this->form_validation->set_rules('fecha_graduacion', 'Fecha Graduación', 'required');		
			
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('modificar_estudio',$data);
		}
		else
		{
			$value['id'] = $id_estudio;
			$value['institucion'] = $this->input->post('institucion');
			$value['pais'] = $this->input->post('pais');
			$value['fecha_graduacion'] = $this->input->post('fecha_graduacion');

			$estudio = new Estudio($value);
			if ($estudio->actualizar()){
				$data["estudio"] = $value;
				$this->load->view('modificar_estudio',$data);
				echo "Modificado exitosamente";
			}
		}
	 }

 	}
	else {
		redirect('/personas/listar_personas');
	 }
 }
}
