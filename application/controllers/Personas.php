<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personas extends CI_Controller {
 // private $tipo_documento;
 // private $numero_documento;
 // private $nombre;
 // private $apellido;
 // private $sexo;
 // private $fecha_nacimiento;
 // private $direccion;
 // private $email;
 // private $telefono;
 // private $nacionalidad;

 public function __construct(){
	 parent::__construct();
	 $this->load->helper(array('form', 'url','url_helper'));
	 $this->load->library('form_validation');
	 //$this->load->model('Persona');
 }

 public function index(){
	 $this->load->view('Menu');
 }

 public function registrar($registro = null){
	 $this->load->model('Persona');
	 if($registro == NULL){
		 $this->load->view('Registrar');
	 }else{
		 
			$this->form_validation->set_rules('tipo_documento', 'Tipo documento', 'required');
			$this->form_validation->set_rules('numero_documento', 'Numero documento', 'required');
			$this->form_validation->set_rules('nombre', 'Nombre', 'required');
			$this->form_validation->set_rules('apellido', 'Apellido', 'required');
			$this->form_validation->set_rules('sexo', 'Sexo', 'required');
			$this->form_validation->set_rules('fecha_nacimiento', 'Fecha nacimiento', 'required');
			$this->form_validation->set_rules('ciudad', 'Ciudad', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('telefono', 'Telefono', 'required');
			$this->form_validation->set_rules('nacionalidad', 'Nacionalidad', 'required');			
			
		if ($this->form_validation->run() == FALSE)
		{
						$this->load->view('Registrar');
		}
		else
		{
			$value['tipo_documento'] = $this->input->post('tipo_documento');
			$value['numero_documento'] = $this->input->post('numero_documento');
			$value['nombre'] = $this->input->post('nombre');
			$value['apellido'] = $this->input->post('apellido');
			$value['sexo'] = $this->input->post('sexo');
			$value['fecha_nacimiento'] = $this->input->post('fecha_nacimiento');
			$value['direccion'] = $this->input->post('direccion');
			$value['ciudad'] = $this->input->post('ciudad');
			$value['email'] = $this->input->post('email');
			$value['telefono'] = $this->input->post('telefono');
			$value['nacionalidad'] = $this->input->post('nacionalidad');

			//$this->Persona->construc($value);
			$people = new Persona($value);
			$people->registrar();

			$this->load->view('Menu');

		}
	 }
 }

 public function listar_personas(){
	 $this->load->model('Persona');
	 $resu = $this->Persona->obtener_todas();

	 $cantidad_personas = count($resu);
  for ($i=0; $i < $cantidad_personas; $i++) {
		$indice = "persona".($i+1);
  	$result[$indice] =  $resu[$i];
  }
	$result['cantidad'] = $cantidad_personas;
	 $this->load->view('Listar_personas',$result);
 }

 public function listar_detalle($cedula = null){
   $this->load->model('Persona');
   if($cedula != null){
     $value['numero_documento'] = $cedula;
      $peop = new Persona($value);
      $peop->obtener_datos();
   }
 }

 public function editar_pregrado($cedula = null){
   $this->load->model('Persona');
   if($cedula != null){
     $value['numero_documento'] = $cedula;
      $peop = new Persona($value);
      $peop->obtener_datos();
   }
 }

}
