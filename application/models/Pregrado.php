<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("Estudio.php");
class Pregrado extends Estudio {

	private $profesion;
	private $tarjeta_profesional;

	public function __construct($value = null) {
		parent::__construct($value);
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->profesion = isset($value->profesion) ? $value->profesion : null;
				$this->tarjeta_profesional = isset($value->tarjeta_profesional) ? 
					$value->tarjeta_profesional : null;
			}
		}
	}

	public function validar($persona) {
		$errores = parent::validar($persona);
		if (!is_array($errores))
			$errores = [];

		if ($this->profesion == null)
			$errores[] = 'La profesion no puede ser vacía';
		if ($this->tarjeta_profesional != null) {
			$errores_tarjeta_profesional = $this->tarjeta_profesional->validar($this);
			
			if (is_array($errores_tarjeta_profesional)) {
				foreach ($errores_tarjeta_profesional as $error) {
					$errores[] = $error;
				}
			}
		}

		return empty($errores) ? TRUE : $errores;
	}

	public function registrar($persona) {
		$flags = 0;

		$this->db->trans_begin();
		$parent_result = parent::registrar($persona);

		if (!$parent_result) {
			$this->db->trans_rollback();
			return $parent_result;
	}

		$data = [
			'estudio' => $this->id,
		    'profesion' => $this->profesion
		];
		if ($this->db->insert('pregrado', $data) !== false) {
			if ($this->tarjeta_profesional != null) {
				if (!$this->tarjeta_profesional->registrar($this)) {
					$this->db->trans_rollback();
					return FALSE;
				}
			}
			$this->db->trans_commit();
			return TRUE;
		}
		$this->db->trans_rollback();
		return FALSE;

	}

}
