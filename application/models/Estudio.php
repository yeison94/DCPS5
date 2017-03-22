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

	public function actualizar() {
		$data = [
			'id' => $this->id,
			'institucion' => $this->institucion,
			'pais' => $this->pais,
			'fecha_graduacion' => $this->fecha_graduacion,
		];
		return $this->db->update('estudio', $data, array('id' => $this->id));
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

		$pregrados_result = $this->db->get()->result();

		foreach ($pregrados_result as $pregrado) {
			$pregrados[] = new Pregrado($pregrado);
			
		}
			
		$this->db->from('estudio')
			->join('posgrado', 'estudio.id = posgrado.estudio')
			->where('persona', $persona->numero_documento);

		$posgrados_result = $this->db->get()->result();

		foreach ($posgrados_result as $posgrado) {
			$posgrados[] = new Posgrado($posgrado);
			
		}
        $estudios = ['pregrados'=>$pregrados,'posgrados'=>$posgrados];

		return $estudios;
	}

	public function obtener_estudio_por_id($id) {

        $query = $this->db->get_where('estudio', array('id' => $id));
        return $query->row_array();
	}

}
