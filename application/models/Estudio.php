<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudio extends CI_Model {

	private $id;
	private $institucion;
	private $pais;
	private $fecha_graduacion;

	public function __construct($value = null) {
		parent::__construct();
		$this->load->database();
		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->id = isset($value->id) ? $value->id : null;
				$this->institucion = isset($value->institucion) ? $value->institucion : null;
				$this->pais = isset($value->pais) ? $value->pais : null;
				$this->fecha_graduacion = isset($value->fecha_graduacion) ? $value->fecha_graduacion : null;
			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'id':
			case 'institucion':
			case 'pais':
			case 'fecha_graduacion':
			return $this->$key;
			default:
			return parent::__get($key);
		}
	}

	public function validar($persona) {
		$errores = [];
		if ($this->institucion == null){
			$errores[] = 'La institución no puede ser vacía';
		}

		if ($this->pais == null) {
			$errores[] = 'El país no puede ser vacío';
		}

		if ($this->fecha_graduacion == null) {
			$errores['fecha_graduacion'] = ['required'];
		}
		// Acá habría que validar también que sea una fecha correcta
		// y que esté entre $persona->fecha_nacimiento y la fecha actual.

		return empty($errores) ? TRUE : $errores;
	}

	public function registrar($persona) {

		$data = [
			'persona' => $persona->numero_documento,
			'institucion' => $this->institucion,
			'pais' => $this->pais,
			'fecha_graduacion' => $this->fecha_graduacion
		];

		if ($this->db->insert('estudio', $data) !== FALSE) {
			$this->id = $this->db->insert_id();
			return TRUE;
		} else {
			return FALSE;
		}

	}

	public function obtener_estudios_por_persona($persona) {
		$this->load->model('Pregrado');
		$this->load->model('Posgrado');


		$pregrados = [];
		$posgrados = [];
		$estudios = [];

		$this->db->from('estudio')
			->join('pregrado', 'estudio.id = pregrado.estudio')
			->where('persona', $persona->numero_documento);

		$pregrados = $this->db->get()->result();

		foreach ($pregrados as $pregrado) {
		//	array_push($pregrados,new Pregrado($pregrado));
			$estudios[] = new Pregrado($pregrado);
			
		}
		// var_dump($estudios);
			
		$this->db->from('estudio')
			->join('posgrado', 'estudio.id = posgrado.estudio')
			->where('persona', $persona->numero_documento);

		$posgrados = $this->db->get()->result();

		foreach ($posgrados as $posgrado) {
			array_push($posgrados,new Posgrado($posgrado));
			//$estudios = new Posgrado($posgrado);
		}
        //$estudios = ['pregrados'=>$pregrados,'posgrados'=>$posgrados];
		//array_push($estudios,$pregrados,$posgrados);

		return $estudios;
	}

}
