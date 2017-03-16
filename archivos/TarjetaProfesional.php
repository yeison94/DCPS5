<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TarjetaProfesional extends CI_Model {

	private $fecha_expedicion;
	private $numero;

	public function __construct($value = null) {
		parent::__construct();

		if (isset($value)) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->fecha_expedicion = isset($value->fecha_expedicion) ? $value->fecha_expedicion : null;
				$this->numero = isset($value->numero) ? $value->numero : null;
			}
		}
	}

	public function validar($pregrado) {
		$errores = [];

		if ($this->fecha_expedicion == null) {
			$errores[] = 'La fecha de expedición no puede ser vacía';
		}
		// Acá habría que validar también que sea una fecha correcta
		// y que esté entre $pregrado->fecha_graduacion y la fecha actual.

		if ($this->numero == null) {
			$errores[] = 'El número no puede ser vacío';
		}

		return empty($errores) ? TRUE : $errores;

	}

	public function registrar($pregrado) {
		$data = [
			'pregrado' => $pregrado->id,
		    'fecha_expedicion' => $this->fecha_expedicion,
		    'numero' => $this->numero
		];

		if ($this->db->insert('tarjetaProfesional', $data) !== false) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
