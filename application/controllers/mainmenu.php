<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mainmenu extends CI_Controller {

	function __construct(){
	parent::__construct();
	$this->load->model('model_mainmenu');

}
	public function index()
	{
	
		//$this->load->view('home');
		$data['record']= $this->model_mainmenu->tampil_data();
		$this->template->load('template','mainmenu/lihat_data',$data);
	}
	function input_data(){
		if(isset($_POST['submit'])){
		$this->model_mainmenu->insert();
		redirect('mainmenu');
		}else{
				$this->template->load('template','mainmenu/input_data');
		}
	}
}
