<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jabatan extends CI_Controller {
function __construct(){
	parent::__construct();
	$this->load->model('model_jabatan');
	cek_session();

}
	
	public function index()
	{
	
		
		$this->template->load('template','');
	}


}
