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
	  $data['persona'] = $peop;
	  $datos = $peop->obtener_estudios();
	   settype($datos, 'array');
	  $data['estudios'] =$datos;
	  //var_dump($datos);
	  $this->load->view('Listar_detalle',$data);

	  //var_dump($peop->obtener_estudios());
   }
 }

 public function agregar_pregrado($cedula = null,$opcion = null){
   $this->load->model('Pregrado');
   $this->load->model('Persona');
   $this->load->model('Estudio');
   if($cedula != null && $opcion != null){
	   $this->form_validation->set_rules('institucion', 'institucion', 'required');
		$this->form_validation->set_rules('pais', 'pais', 'required');
		$this->form_validation->set_rules('fecha_graduacion', 'fecha_graduacion', 'required');
		$this->form_validation->set_rules('profesion', 'profesion', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['cedula'] = $cedula;
	        $this->load->view('Agregar_pregrado',$data);
						//$this->load->view('Registrar');
		}
		else
		{
			// $value['tipo_documento'] = $this->input->post('tipo_documento');
			// $value['numero_documento'] = $this->input->post('numero_documento');
			// $value['nombre'] = $this->input->post('nombre');
			// $value['apellido'] = $this->input->post('apellido');
			// $value['sexo'] = $this->input->post('sexo');
			// $value['fecha_nacimiento'] = $this->input->post('fecha_nacimiento');
			// $value['direccion'] = $this->input->post('direccion');
			// $value['ciudad'] = $this->input->post('ciudad');
			// $value['email'] = $this->input->post('email');
			// $value['telefono'] = $this->input->post('telefono');
			// $value['nacionalidad'] = $this->input->post('nacionalidad');
            $value['institucion'] = $this->input->post('institucion');
			$value['pais'] = $this->input->post('pais');
			$value['fecha_graduacion'] = $this->input->post('fecha_graduacion');
			$value['profesion'] = $this->input->post('profesion');
            $value['numero_documento'] = $cedula;
           
			$pregrado = new Pregrado($value);
			$persona = new Persona($value);
			$resultado = $pregrado->registrar($persona);
			if($resultado == TRUE){
             echo "INSERTADO";
			}else{
             echo "NO INSERTADO";
			}
			//$people->registrar();

			//$this->load->view('Menu');
			

		}

   }elseif ($cedula != null && $opcion == null) {
	$data['cedula'] = $cedula;
	$this->load->view('Agregar_pregrado',$data);
    //  $value['numero_documento'] = $cedula;
    //   $peop = new Persona($value);
    //   $peop->obtener_datos();
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


public function modificar($numero_documento = null, $modificacion = null){
	 $this->load->model('Persona');

	if($numero_documento != null) {

	 $this->load->model('Persona');
	 $persona = $this->Persona->obtener_persona($numero_documento);

	 $data["persona"] = $persona;

	 if($modificacion == NULL){
	 	$this->load->view('modificar_persona',$data);
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
			$this->load->view('modificar_persona',$data);
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
			if ($people->actualizar()){
				$data["persona"] = $value;
				$this->load->view('modificar_persona',$data);
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
