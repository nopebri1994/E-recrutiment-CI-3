<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lampiran extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('model_lampiran');
	}

	function index(){
		$this->template->load('template','lampiran/upload');
	}

	function add(){
		
			if(isset($_POST['submit'])){
				$id=$this->session->userdata['id_pelamar'];
				if($id==''){
					$this->session->set_flashdata('notif','<div class="alert alert-warning" role="alert" id="success-alert"> Logout terlebih dahulu, lalu login kembali Atau Pastikan biodata pelamar telah diisi.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button></div>');
					$this->template->load('template','lampiran/upload');
				}else{
					$query="Select * From lampiran where id_pelamar='$id'";
					$data=$this->db->query($query);
						foreach($data->result() as $d){
								$hasil=1;
													  }
						if($hasil==1){
							$this->session->set_flashdata('notif','<div class="alert alert-warning" role="alert" id="success-alert"> Data lampiran tersedia. Silahkan update data di biodata pelamar
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
						</button></div>');
								$this->template->load('template','lampiran/upload');
						}else{

						$config['upload_path']          = './upload_lampiran/';
		                $config['allowed_types']        = 'jpg|png|pdf';
		                $config['max_size']             = 2048;
		           
		                $this->load->library('upload', $config);
		     
		                //proses upload
		                $this->upload->do_upload('foto');
		                 $upload =  $this->upload->data();
		                $foto=$upload['file_name'];

		                $this->upload->do_upload('pdf');
		                $upload =  $this->upload->data();
		                $pdf=$upload['file_name'];
		              
		                $this->model_lampiran->insert($foto,$pdf);
		                $this->session->set_flashdata('notif','<div class="alert alert-warning" role="alert" id="success-alert"> Data lampiran berhasil disimpan.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
						</button></div>');
						redirect('pelamar/lihat_biodata');
             			 }
					}
				}
			}
function update_data()
	{
	
						$config['upload_path']          = './upload_lampiran/';
		                $config['allowed_types']        = 'jpg|png|pdf';
		                $config['max_size']             = 2048;
		           
		                $this->load->library('upload', $config);
		     
		                //proses upload
		                $this->upload->do_upload('foto');
		                $upload =  $this->upload->data();
		                $foto=$upload['file_name'];

		                
		 $this->model_lampiran->update($foto);
		 $this->session->set_flashdata('notif','<div class="alert alert-warning" role="alert" id="success-alert"> Update Berhasil
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
						</button></div>'); 
		redirect('pelamar/lihat_biodata');
	}
function update_data_lamp()
	{
	
						$config['upload_path']          = './upload_lampiran/';
		                $config['allowed_types']        = 'jpg|png|pdf';
		                $config['max_size']             = 2048;
		           
		                $this->load->library('upload', $config);
		     
		                //proses upload
		                $this->upload->do_upload('pdf');
		                $upload =  $this->upload->data();
		                $pdf=$upload['file_name'];

		                
		 $this->model_lampiran->update_lamp($pdf);
		 $this->session->set_flashdata('notif','<div class="alert alert-warning" role="alert" id="success-alert"> Update Berhasil
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
						</button></div>'); 
		redirect('pelamar/lihat_biodata');
	}
}