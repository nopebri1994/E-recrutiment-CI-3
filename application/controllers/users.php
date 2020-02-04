<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Controller {
function __construct(){
	parent::__construct();
	$this->load->model('model_account');

}

	
		public function profile()
	{
		
		$data['cek']='';
		$data['konf']='';
		$data['alert']='';
		$this->template->load('template','users/profile',$data);

}
		public function update()
	{
		$password=$this->input->post('pass');
		if($password==$this->session->userdata['password'] and $this->input->post('passnew')==$this->input->post('passnew2')){
		$this->model_account->update();
		$data['cek']='';
		$data['konf']='';
		$data['alert']='Data Berhasil Dipebarui';
		$this->template->load('template','users/profile',$data);
	}else{
		$data['cek']='Password Salah';
		$data['konf']='Password tidak sama';
		$this->template->load('template','users/profile',$data);
	}
	}
}