<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Model {

	private $tipo_documento;
	private $numero_documento;
	private $nombre;
	private $apellido;
	private $sexo;
	private $fecha_nacimiento;
	private $direccion;
	private $ciudad;
	private $email;
	private $telefono;
	private $nacionalidad;
	

	public function __construct($value = null) {
		parent::__construct();
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->tipo_documento = isset($value->tipo_documento)? $value->tipo_documento : null;
				$this->numero_documento = isset($value->numero_documento)? $value->numero_documento : null;
				$this->nombre = isset($value->nombre)? $value->nombre : null;
				$this->apellido = isset($value->apellido)? $value->apellido : null;
				$this->sexo = isset($value->sexo)? strtoupper($value->sexo) : null;
				$this->fecha_nacimiento = isset($value->fecha_nacimiento)? $value->fecha_nacimiento : null;
				$this->direccion = isset($value->direccion)? $value->direccion : null;
				$this->ciudad = isset($value->ciudad)? $value->ciudad : null;
				$this->email = isset($value->email) ? $value->email : null;
				$this->telefono = isset($value->telefono) ? $value->telefono : null;
				$this->nacionalidad = isset($value->nacionalidad)? $value->nacionalidad : null;
			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'tipo_documento':
			case 'numero_documento':
			case 'nombre':
			case 'apellido':
			case 'sexo':
			case 'fecha_nacimiento':
			case 'direccion':
			case 'email':
			case 'telefono':
			case 'nacionalidad':
			case 'ciudad':
				return $this->$key;
			default:
				return parent::__get($key);
		}
	}

	public function validar() {
		$errores = [];
		if ($this->tipo_documento == null) {
			$errores[] = 'El tipo de documento no puede ser vacío';
		}

		if ($this->numero_documento == null) {
			$errores[] = 'El número de documento no puede ser vacío';
		}

		if ($this->nombre == null) {
			$errores[] = 'El nombre no puede ser vacío';
		}

		if ($this->apellido == null) {
			$errores[] = 'El apellido no puede ser vacío';
		}

		if ($this->sexo == null) {
			$errores[] = 'El sexo no puede ser vacío';
		} else if ($this->sexo != 'M' && $this->sexo != 'F') {
			$errores[] = 'El sexo debe ser M ó F';
		}

		if ($this->fecha_nacimiento == null) {
			$errores[] = 'La fecha de nacimiento no puede ser vacía';
		}
		// Acá habría que validar también que sea una fecha correcta
		// y que sea menor a la fecha actual.

		if ($this->direccion == null) {
			$errores[] = 'La dirección no puede ser vacía';
		}

		if ($this->ciudad == null) {
			$errores[] = 'La ciudad no puede ser vacía';
		}

		if ($this->email == null) {
			$errores[] = 'El email no puede ser vacío';
		} else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			$errores[] = 'El email ingresado no es válido';
		}

		if ($this->telefono == null) {
			$errores[] = 'El teléfono no puede ser vacío';
		}

		if ($this->nacionalidad == null) {
			$errores[] = 'La nacionalidad no puede ser vacía';
		}

		if (empty($errores)) {
			return TRUE;
		} else {
			return $errores;
		}
	}

	public function registrar() {
		$data = [
			'tipo_documento' => $this->tipo_documento,
			'numero_documento' => $this->numero_documento,
			'nombre' => $this->nombre,
			'apellido' => $this->apellido,
			'sexo' => $this->sexo,
			'fecha_nacimiento' => $this->fecha_nacimiento,
			'direccion' => $this->direccion,
			'ciudad' => $this->ciudad,
			'nacionalidad' => $this->nacionalidad,
			'email' => $this->email,
			'telefono' => $this->telefono
		];

		return $this->db->insert('persona', $data);
	}

	public function obtener_datos() {
		$query = $this->db->get_where('persona', ['numero_documento' => $this->numero_documento]);
		$result = $query->result();
		if (empty($result)) {
			return FALSE;
		} else {
			$this->tipo_documento = $result[0]->tipo_documento;
			$this->numero_documento = $result[0]->numero_documento;
			$this->nombre = $result[0]->nombre;
			$this->apellido = $result[0]->apellido;
			$this->sexo = $result[0]->sexo;
			$this->fecha_nacimiento = $result[0]->fecha_nacimiento;
			$this->direccion = $result[0]->direccion;
			$this->ciudad = $result[0]->ciudad;
			$this->nacionalidad = $result[0]->nacionalidad;
			$this->email = $result[0]->email;
			$this->telefono = $result[0]->telefono;
			return $this;
		}
	}

	
	public function obtener_estudios() {
		$this->load->model('Estudio');
		
		return $this->estudios = $this->Estudio->obtener_estudios_por_persona($this);
	}
	

	public function obtener_todas() {
		$query = $this->db->get('persona');

		$result = [];

		foreach ($query->result() as $key=>$persona) {
			$result[$key] = new Persona($persona);
		}

		return $result;
	}

	
}
