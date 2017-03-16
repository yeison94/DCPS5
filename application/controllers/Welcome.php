<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
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

				 $config = array(
					 array(
										 'field' => 'tipo_documento',
										 'label' => 'Tipo documento',
										 'rules' => 'required'
						 ),
						 array(
										 'field' => 'numero_documento',
										 'label' => 'Numero documento',
										 'rules' => 'required',
						 ),
						 array(
										 'field' => 'nombre',
										 'label' => 'Nombre',
										 'rules' => 'required'
						 ),
						 array(
										 'field' => 'apellido',
										 'label' => 'Apellido',
										 'rules' => 'required'
						 ),
						 array(
										 'field' => 'sexo',
										 'label' => 'Sexo',
										 'rules' => 'required'
						 ),
						 array(
										 'field' => 'fecha_nacimiento',
										 'label' => 'Fecha nacimiento',
										 'rules' => 'required'
						 ),
						 array(
										 'field' => 'ciudad',
										 'label' => 'Ciudad',
										 'rules' => 'required'
						 ),
						 array(
										 'field' => 'email',
										 'label' => 'Email',
										 'rules' => 'required'
						 ),
						 array(
										 'field' => 'telefono',
										 'label' => 'Telefono',
										 'rules' => 'required'
						 ),
						 array(
										 'field' => 'nacionalidad',
										 'label' => 'Nacionalidad',
										 'rules' => 'required'
						 ),
					);

					 $this->form_validation->set_rules($config);

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
