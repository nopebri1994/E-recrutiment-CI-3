<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pelamar extends CI_Controller {
function __construct(){
	parent::__construct();
	$this->load->model('model_pelamar');
	$this->load->model('model_pendidikan');	
	$this->load->model('model_jabatan');
	$this->load->model('model_jurusan');
	$this->load->model('model_lampiran');
	$this->load->model('model_ujian');
	$this->load->model('model_proses');


}
	
	public function index()
	{
		$data['record']	= $this->model_pelamar->tampil_data();
		$this->template->load('template','pelamar/lihat_data',$data);
	}



	function input_data(){
		if(isset($_POST['submit'])){
			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('nik','NIK','required');
			$this->form_validation->set_rules('hp','No Hadphone','required|numeric|max_length[12]');
			$this->form_validation->set_rules('tl','Tempat Lahir','required');
			$this->form_validation->set_rules('tgl','Tanggal Lahir','required');
			$this->form_validation->set_rules('tinggi','Tinggi','required|numeric');
			$this->form_validation->set_rules('alamat','Alamat','required');
			if($this->form_validation->run()==false){
					$data['jabatan']= $this->model_jabatan->tampil_data();
					$data['pendidikan']= $this->model_pendidikan->tampil_data();
					$data['jurusan']= $this->model_jurusan->tampil_data();
					$data['exist']='';
					$this->template->load('template','pelamar/input_data',$data);
			}else{
			$cek=0;
			$hasil=0;
			$cek_data= $this->model_pelamar->tampil_data();
			$nik=$this->input->post('nik');
			foreach($cek_data->result() as $d)	{
			if($d->nik == $nik){
				$hasil=$cek+1;
			}else{
				$hasil=$hasil+0;
			}
		}
		
	
	if($hasil!=0){
		$data['jabatan']= $this->model_jabatan->tampil_data();
		$data['pendidikan']= $this->model_pendidikan->tampil_data();
		$data['jurusan']= $this->model_jurusan->tampil_data();
		$data['exist']='NIK sudah digunakan';
		$this->template->load('template','pelamar/input_data',$data);
 					
	}else{
					$cek_j= $this->input->post('jurusan');
					$tinggi= $this->input->post('tinggi');
					$tl= $this->input->post('tgl');
					$tgl_input = date('y-m-d');
			$tahun = date_format(date_create($tl),'Y');
			$selisih = date('20y') - $tahun;
			if($selisih>24)
			{
						$ket="Tidak lulus";
			}else{
						
						if($tinggi<163){
								$ket="Tidak Lulus";
								}else{	
										if($cek_j=='J006'){
										$ket="Tidak lulus";	
									}else{
								$ket="Belum Di Tes";
				}
			}
		}

		$this->model_pelamar->insert($ket,$tgl_input);
			$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" id="success-alert"> Data Berhasil disimpan 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('pelamar/lihat_biodata');

		} 
	}
	}else{
			
		$data['jabatan']= $this->model_jabatan->tampil_data();
		$data['pendidikan']= $this->model_pendidikan->tampil_data();
		$data['jurusan']= $this->model_jurusan->tampil_data();
		$data['exist']='';
		
		$this->template->load('template','pelamar/input_data',$data);
		}

	}


	public function data_periode()
	{
		if(isset($_POST['submit'])){
		
		$tanggal1 = $this->input->post('tanggal1');
		$tanggal2 = $this->input->post('tanggal2');
		
		$data['record']= $this->model_pelamar->tampil_data_periode($tanggal1,$tanggal2);
		$this->template->load('template','pelamar/lihat_data',$data);
	}else{
		$data['record']= $this->model_pelamar->tampil_data();
		$this->template->load('template','pelamar/lihat_data',$data);
		}
	}
	function hapus(){
		$id=$this->uri->segment(3);
		$this->model_pelamar->hapus($id);
		redirect('pelamar');
		}

		function edit_data(){
			if(isset($_POST['submit'])){
			$tinggi= $this->input->post('tinggi');
			$tl= $this->input->post('tgl');
			$tahun = date_format(date_create($tl),'Y');
			$selisih = date('20y') - $tahun;

		

			if($selisih>24)
			{
						$ket="Tidak lulus";
			}else{
						
						if($tinggi<164){
								$ket="Tidak Lulus";
								}else{
								$ket="Belum Di Tes";
				}
				}

		$this->model_pelamar->edit($ket);
		redirect('pelamar/lihat_biodata');
	}else{
		$id=$this->uri->segment(3);
		$data['pelamar']=$this->model_pelamar->get_one($id)->row_array();	
		$data['jabatan']= $this->model_jabatan->tampil_data();
		$data['pendidikan']= $this->model_pendidikan->tampil_data();
		$data['jurusan']= $this->model_jurusan->tampil_data();
		$this->template->load('template','pelamar/edit_pelamar',$data);
		}

		}


	function lihat_biodata(){
		$data['record']	= $this->model_pelamar->tampil_satu()->row_array();
		$data['lampiran']	= $this->model_lampiran->tampil_detail()->row_array();
		$data['jadwal']=$this->model_proses->cek_data();
		$this->template->load('template','pelamar/detail_pelamar',$data);
	}

function detail(){
		$id=$this->uri->segment(3);
		$data['record']	= $this->model_pelamar->tampil_satu_staf($id)->row_array();
		$data['lampiran']= $this->model_lampiran->tampil_detail_staf($id)->row_array();
		$data ['hasil']=$this->model_ujian->hasil_detail($id);
		$this->template->load('template','pelamar/detail_pelamar_staf',$data);
	}

}