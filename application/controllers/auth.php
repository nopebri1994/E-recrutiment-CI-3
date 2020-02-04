<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('model_login');
	

}
	
	public function index()
	{

		$this->template->load('temp_login','form_login');
		//$this->load->view('form_login');

	}


	public function login(){
	if  (isset($_POST['submit'])){

		$username= $this->input->post('user');
		$password= $this->input->post('pass');

		//if($username==''){
		
		//		}


		$hasil = $this->model_login->login($username,$password);
		if($hasil==1)
		{
			$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" id="success-alert"> Login Succes
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button></div>');
			redirect('home');
		}
		else{
			$this->session->set_flashdata('notif','<div class="alert alert-warning" role="alert" id="success-alert"> Login Gagal
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button></div>');
			redirect('auth');
			}
	}
		else {
			$this->session->set_flashdata('notif','<div class="alert alert-warning" role="alert" id="success-alert"> Login Gagal
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('auth');
				}
}

	public function logout()
	{
		$this->session->Sess_destroy();
		
		redirect('auth');
	}
}
