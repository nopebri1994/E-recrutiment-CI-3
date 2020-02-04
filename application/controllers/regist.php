<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class regist extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('model_regist');
		$this->load->model('model_pelamar');
		$this->load->model('model_account');
		
	}

	public function index ()
		{
			$data['exist']='';
			$data['user']='';
			$this->template->load('Temp_login','regist/input_data',$data);
		}

	function input(){
			$hasil=0;
			$cek_data= $this->model_pelamar->tampil_data();
			$nik=$this->input->post('nik');
			foreach($cek_data->result() as $d)	{
			if($d->nik == $nik){
				$hasil=1;
			}
		}
			$cek_user=$this->model_account->tampil_data();
			$nik=$this->input->post('nik');
			foreach($cek_user->result() as $d)	{
			if($d->nik == $nik){
				$hasil=1;
			}
		}
			$cek_user_1=$this->model_account->tampil_data();
			$user=$this->input->post('user');
			foreach($cek_user_1->result() as $d)	{
			if($d->user == $user){
				$hasil=2;
			}
		}
			
	
	if($hasil==1){
	
		$data['exist']='NIK sudah digunakan';
		$data['user']='';
		$this->template->load('Temp_login','regist/input_data',$data);
 					
	}elseif($hasil==2){
		$data['exist']='';
		$data['user']='User Sudah Digunakan';
		$this->template->load('Temp_login','regist/input_data',$data);

		}else{

		
			$this->model_regist->insert();
			$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" id="success-alert"> Registrasi Berhasil, Silahkan login
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button></div>');
			redirect("auth");
		}
		}	

}