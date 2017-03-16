<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

 public function __construct(){
	 parent::__construct();
	 $this->load->helper(array('form', 'url','url_helper'));
	 $this->load->library('form_validation');
	 //$this->load->model('Persona');
 }

 public function index(){
	 $this->load->view('Menu');
 }

}
