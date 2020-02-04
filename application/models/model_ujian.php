		<?php
class model_ujian extends CI_Model{

	
function v_soal()
	{
		$id=$this->session->userdata['id_login'];
		$query="select distinct t_soal.id_soal,t_soal.nama_soal,t_soal.waktu,t_soal.jumlah_soal from 
		t_soal";
		return $this->db->query($query);
	}

function hasil()
	{
		$id=$this->session->userdata['id_pelamar'];
		$query="select t_soal.id_soal, t_soal.nama_soal, t_soal.jumlah_soal,t_soal.waktu, hasil_ui.nilai FROM t_soal t_soal LEFT JOIN hasil_ui on t_soal.id_soal=hasil_ui.id_soal Left Join users on users.id_login=hasil_ui.id_pelamar where 
			hasil_ui.id_pelamar='$id' and t_soal.id_soal=hasil_ui.id_soal";
		return $this->db->query($query);
	}

function insert_soal()
	{
		$data=array(
					
					'nama_soal'=>$this->input->post('nama'),
					'waktu'=>$this->input->post('waktu'),
					'jumlah_soal'=>$this->input->post('jml'),


					);
		$this->db->insert('t_soal',$data);
	}
	function get_one($id_soal){
		$param= array('id_soal'=>$id_soal);
		return $this->db->get_where('t_soal',$param);
	}

	function insert_soal_isi(){
				$config['upload_path']          = './upload_soal/';
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = 1024;
                $this->load->library('upload', $config);
                $this->upload->do_upload('gambar');
                $upload =  $this->upload->data();
                $foto=$upload['file_name'];
		$data=array(
					'id_soal'=>$this->input->post('id_soal'),
					'gambar'=>$foto,
					'soal'=>$this->input->post('soal'),
					'opsi_a'=>$this->input->post('a'),
					'opsi_b'=>$this->input->post('b'),
					'opsi_c'=>$this->input->post('c'),
					'opsi_d'=>$this->input->post('d'),
					'opsi_e'=>$this->input->post('e'),
					'jawaban'=>$this->input->post('jwb'),
					);
		$this->db->insert('t_isi_soal',$data);
	}

	function detailisi($id_soal){
		$query="SELECT * FROM `t_isi_soal` WHERE id_soal='$id_soal'";	
		return $this->db->query($query);
	}

	function insert_hasil($nilai, $id_soal){
				$data=array(
					'id_soal'=>$id_soal,
					'id_pelamar'=>$this->session->userdata['id_pelamar'],
					'nilai'=>$nilai
					);
		$this->db->insert('hasil_ui',$data);
	}

function hasil_detail($id)
	{
		
		$query="select t_soal.id_soal, t_soal.nama_soal, t_soal.jumlah_soal,t_soal.waktu, hasil_ui.nilai FROM t_soal t_soal LEFT JOIN hasil_ui on t_soal.id_soal=hasil_ui.id_soal Left Join users on users.id_login=hasil_ui.id_pelamar where 
			hasil_ui.id_pelamar='$id' and t_soal.id_soal=hasil_ui.id_soal";
		return $this->db->query($query);
	}	

	function update_soal_isi(){
		$gambar=$this->input->post('gambar');
		if($gambar==''){
				$config['upload_path']          = './upload_soal/';
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = 1024;
                $this->load->library('upload', $config);
                $this->upload->do_upload('gambar');
                $upload =  $this->upload->data();
                $foto=$upload['file_name'];
            }else{
            	$foto=$this->input->post('gambar_lama');
            }

		$data=array(
					'id_soal'=>$this->input->post('id_soal'),
					'gambar'=>$foto,
					'soal'=>$this->input->post('soal'),
					'opsi_a'=>$this->input->post('a'),
					'opsi_b'=>$this->input->post('b'),
					'opsi_c'=>$this->input->post('c'),
					'opsi_d'=>$this->input->post('d'),
					'opsi_e'=>$this->input->post('e'),
					'jawaban'=>$this->input->post('jwb'),
					);
		$this->db->where('id_isi_soal',$this->input->post('id'));
		$this->db->update('t_isi_soal',$data);
	}
	function hapus_isi(){
		$this->db->where('id_isi_soal',$this->input->post('id'));
		$this->db->delete('t_isi_soal');	

	}

}
	