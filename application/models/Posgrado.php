<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posgrado extends Estudio {

	private $area;
	private $nivel;

	public function __construct($value = null) {
		parent::__construct($value);
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->area = isset($value->area) ? $value->area : null;
				$this->nivel = isset($value->nivel) ? $value->nivel : null;
			}
		}
	}

	public function validar($persona) {
		$errores = parent::validar($persona);

		if (!is_array($errores))
			$errores = [];

		if ($this->area == null) {
			$errores[] = 'El área no puede ser vacía';
		}

		if ($this->nivel == null) {
			$errores[] = 'El nivel no puede ser vacío';
		} else {
			if ($this->nivel != 'Especialización' && $this->nivel != 'Maestría' && $this->nivel != 'Doctorado' && $this->nivel != 'Posdoctorado')
				$errores[] = 'El nivel ingresado es inválido';
		}
		return empty($errores) ? TRUE : $errores;
	}


	public function registrar($persona) {
		$this->db->trans_begin();

		$parent_result = parent::registrar($persona);

		if (!$parent_result) {
			$this->db->trans_rollback();
			return $parent_result;
		}

		$data = [
			'estudio' => $this->id,
			'area' => $this->area,
			'nivel' => $this->nivel
		];
		if ($this->db->insert('posgrado', $data) !== false) {
			$this->db->trans_commit();
			return TRUE;
		} else { 
			$this->db->trans_rollback();
			return FALSE;
		}
	}
}
