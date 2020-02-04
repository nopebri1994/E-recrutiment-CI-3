<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class info extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('model_info');
}
		

	public function index ()
		{
		$data['info']=$this->model_info->tampil_data();	
		$this->template->load('template','info/view',$data);
		}

	
function add_info(){
	$this->model_info->insert();
	redirect('info');
	}
}