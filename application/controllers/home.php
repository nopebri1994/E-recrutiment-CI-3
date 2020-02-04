<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
	parent::__construct();
	$this->load->helper('security');
	cek_session();
	$this->load->model('model_fpk');
	$this->load->model('model_info');

}
	public function index()
	{
	
		//$this->load->view('home');
		$data['record']= $this->model_fpk->tampil_data();
		$data['info']= $this->model_info->tampil_data();
		$this->template->load('template','home',$data);
	}
}
