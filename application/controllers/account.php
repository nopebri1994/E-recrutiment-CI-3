<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class account extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('model_account');
}
		

	public function index ()
		{
			$data['account']=$this->model_account->tampil_data();
			$this->template->load('template','account/lihat_data', $data);
		}

	function input_data (){
		if(Isset($_POST['submit'])){
			$this->model_account->insert();
			redirect('account');
		}else{
			$this->template->load('template','account/input_data');
		}
	}

}