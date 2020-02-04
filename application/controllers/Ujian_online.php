<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian_online extends CI_Controller {
function __construct(){
	parent::__construct();
	$this->load->model('model_ujian');

}
	
	function index(){
		$data['soal']=$this->model_ujian->v_soal();
		$this->template->load('template','ujian/data_soal',$data);
	}
	
	function add_soal(){
		if(Isset($_POST['submit']))	
		{
			$this->model_ujian->insert_soal();
			redirect('ujian_online');
		}

	}

	function detailsoal(){
		$id_soal =$_GET['soal'];
		$data_soal=$this->model_ujian->get_one($id_soal)->row_array();
 		
		echo " <table class='table table-bordered'><tr><td width='100px'>Waktu</td><td>$data_soal[waktu] Menit</td></tr>
             <tr><td>Jumlah Soal</td><td>$data_soal[jumlah_soal] Soal</td></tr></table>";
         
	}

	function add_soal_isi(){
		if(Isset($_POST['submit']))
		{
			$this->model_ujian->insert_soal_isi();
			redirect('ujian_online');
		}

	}

	function detailisi(){
		$id_soal =$_GET['soal'];
		$data_isi=$this->model_ujian->detailisi($id_soal);

		echo "<table class='table table-bordered table-striped data'>
				<thead>
					<th>No</th><th>Soal</th><th>Jawaban</th><th width='115px'></th>
				</thead><tbody>";
				$no=1;
		foreach($data_isi->result() as $ds){
			echo "<tr>	
					<td>$no</td>
					<td>$ds->soal</td>
					<td>$ds->Jawaban</td>
					<td>
					<a 
					    href='javascript:;'
					    data-id='$ds->id_isi_soal'
					    data-soal='$ds->soal'
					    data-id_soal='$ds->id_soal'
					    data-gambar='$ds->gambar'
					    data-opsi_a='$ds->opsi_a'
					    data-opsi_b='$ds->opsi_b'
					    data-opsi_c='$ds->opsi_c'
					    data-opsi_d='$ds->opsi_d'
					    data-opsi_e='$ds->opsi_e'
					    data-jawaban='$ds->Jawaban'
					  
					    data-toggle='modal' data-target='#edit-data'>
					    <button  data-toggle='modal' data-target='#ubah-data' class='btn btn-info btn-xs'>Edit</button>
					</a>";

				echo "<a 
					    href='javascript:;'
					    data-id='$ds->id_isi_soal'					  
					    data-toggle='modal' data-target='#delete-data'>
					    <button  data-toggle='modal' data-target='#hapus-data' class='btn btn-warning btn-xs'>Hapus</button>
					</a></td>
				  </tr>";
				  $no++;
				}
				
			echo "</tbody></table>";
			echo "<script type='text/javascript'>
						  $(document).ready(function(){
 						   $('.data').DataTable();
 					 });
			</script>";	  
			
	}

	function data_soal(){
		$data['soal']=$this->model_ujian->v_soal();
		$data['hasil']=$this->model_ujian->hasil();
		$this->template->load('template','ujian/data_ujian',$data);
	}
	function mulai(){
		$id_soal=$this->input->post('submit');
		$data['id']=$id_soal;
		$cek_ket=$this->session->userdata['keterangan'];
		if($id=$this->session->userdata['id_pelamar']==''){
		$data['soal']=$this->model_ujian->v_soal();
		$data['hasil']=$this->model_ujian->hasil();
		$this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert" id="success-alert"> Logout terlebih dahulu, lalu login kembali Atau anda belum mengisi biodata pelamar
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button></div>');
			$this->template->load('template','ujian/data_ujian',$data);	
		}elseif($cek_ket=='Tidak lulus'){
		$data['soal']=$this->model_ujian->v_soal();
		$data['hasil']=$this->model_ujian->hasil();
		$this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert" id="success-alert"> Tidak Lulus Seleksi Berkas
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button></div>');
			$this->template->load('template','ujian/data_ujian',$data);	
			}else{
				$this->template->load('template','ujian/mulai',$data);
			}
			
	}
	function mulaiujian(){
		$cek=0;
		$id_soal=$this->input->post('submit');
		$hasil=$this->model_ujian->hasil();
			foreach($hasil->result() as $h ){
				if($id_soal==$h->id_soal){
					$cek=1;
				}
			}
	
		if($cek==1){
		$data['soal']=$this->model_ujian->v_soal();
		$data['hasil']=$this->model_ujian->hasil();
			$this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert" id="success-alert"> Anda Sudah Mengikuti Ujian Online pada soal ini
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button></div>');
		$this->template->load('template','ujian/data_ujian',$data);			
		}else{
		$data_isi['time']=$this->model_ujian->get_one($id_soal)->row_array();	
		$data_isi['soal']=$this->model_ujian->detailisi($id_soal);
		$this->template->load('template','ujian/mulai_ujian',$data_isi);
		}
	}

	function add_data(){
		$nilai=0;
		$id_soal=$this->input->post('id_soal');
		$data_isi=$this->model_ujian->detailisi($id_soal);

			foreach($data_isi->result() as $s){ 
				$jawaban=$this->input->post($s->id_isi_soal);
				if($jawaban==$s->Jawaban){
					$nilai=$nilai+10;
				}

				} 
		$this->model_ujian->insert_hasil($nilai,$id_soal);
				$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" id="success-alert"> Ujian Selesai, data berhasil disimpan
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button></div>');
			redirect('ujian_online/data_soal');
		}

		function update_soal_isi(){
			if(Isset($_POST['submit']))
		{
			$this->model_ujian->update_soal_isi();
			redirect('ujian_online');
		}
		}
		function hapus_isi(){
			$this->model_ujian->hapus_isi();
			redirect('ujian_online');
		}
}