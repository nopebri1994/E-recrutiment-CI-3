<?php
class model_pelamar extends CI_Model{


function tampil_data()
	{
		$query="select tp.id_pelamar, tp.nik, tp.nama, tp.no_hp, tp.tempat_lahir, tp.tanggal, tpen.nama_pendidikan, tj.jurusan, 
		tjab.jabatan, tp.alamat, tp.keterangan from t_pelamar as tp, t_pendidikan as tpen, t_jurusan as tj, t_jabatan as tjab 
		WHERE tp.id_pendidikan=tpen.id_pendidikan and tp.id_jurusan=tj.id_jurusan and tp.id_jabatan = tjab.id_jabatan";
		return $this->db->query($query);
	}

	function insert($ket,$tgl_input)
	{
		$q=$this->db->query("SELECT MAX(RIGHT(id_pelamar,3)) as kodee from t_pelamar");
		$kd="";
		if($q->num_rows()>0){ 
            foreach($q->result() as $k){
                $tmp = ((int)$k->kodee)+1; 
                $kd = sprintf("%03s", $tmp); 
            }
        }else{ 
            $kd = "001";
        }
        $kar = "PP"; 
   		$kodejadi = $kar.$kd;
		$data=array(
					'id_pelamar'=>$kodejadi,
					'nik'=>$this->input->post('nik'),
					'nama'=>$this->input->post('nama'),
					'no_hp'=>$this->input->post('hp'),
					'tempat_lahir'=>$this->input->post('tl'),
					'tanggal'=>$this->input->post('tgl'),
					'jk'=>$this->input->post('jk'),
					'tinggi'=>$this->input->post('tinggi'),
					'id_pendidikan'=>$this->input->post('pendidikan'),
					'id_jurusan'=>$this->input->post('jurusan'),
					'id_jabatan'=>$this->input->post('jabatan'),
					'alamat'=>$this->input->post('alamat'),
					'keterangan'=>$ket,
					'tgl_input'=>$tgl_input
					);
		$this->db->insert('t_pelamar',$data);
	}
function ambil($id)
{
	$param=array('id_pelamar'=>$id);
	return $this->db->get_where('t_pelamar',$param);
}

	function tampil_data_periode($tanggal1,$tanggal2)
	{
		$query="select tp.id_pelamar, tp.nik, tp.nama, tp.no_hp, tp.tempat_lahir, tp.tanggal, tpen.nama_pendidikan, tj.jurusan, 
		tjab.jabatan, tp.alamat, tp.keterangan from t_pelamar as tp, t_pendidikan as tpen, t_jurusan as tj, t_jabatan as tjab 
		WHERE tp.id_pendidikan=tpen.id_pendidikan and tp.id_jurusan=tj.id_jurusan and tp.id_jabatan = tjab.id_jabatan and tp.tgl_input BETWEEN '$tanggal1' and '$tanggal2'
        ";
		return $this->db->query($query);
	}


	function hapus($id){
		$this->db->where('id_pelamar',$id);
		$this->db->delete('t_jadwal_pel');
		$this->db->where('id_pelamar',$id);
		$this->db->delete('t_pelamar');
	}

	function get_one($id){
		$param=array('id_pelamar'=>$id);
		return $this->db->get_where('t_pelamar',$param);
	}
	function edit($ket){
		if($ket=="Tidak lulus"){
			$ket=$ket;
		}else{
			$ket=$this->input->post('keterangan');
		}
	$data=array(
					'nik'=>$this->input->post('nik'),
					'nama'=>$this->input->post('nama'),
					'no_hp'=>$this->input->post('hp'),
					'tempat_lahir'=>$this->input->post('tl'),
					'tanggal'=>$this->input->post('tgl'),
					'jk'=>$this->input->post('jk'),
					'tinggi'=>$this->input->post('tinggi'),
					'id_pendidikan'=>$this->input->post('pendidikan'),
					'id_jurusan'=>$this->input->post('jurusan'),
					'id_jabatan'=>$this->input->post('jabatan'),
					'alamat'=>$this->input->post('alamat'),
					'keterangan'=>$ket,
					'tgl_input'=>$this->input->post('tgl_input'),
					);
		$this->db->where('id_pelamar',$this->input->post('id'));
		$this->db->update('t_pelamar',$data);	
	
	}
	function cek_nik($nik){
		$this->db->where('nik',$nik);
		$this->db->from('t_pelamar');
		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result;
		}
		}
		function tampil_data_pem_fpk()
	{
		$query="select tp.id_pelamar, tp.nik, tp.nama, tp.no_hp, tp.tempat_lahir, tp.tanggal, tpen.nama_pendidikan, tj.jurusan, 
		tjab.jabatan, tp.alamat, tp.keterangan from t_pelamar as tp, t_pendidikan as tpen, t_jurusan as tj, t_jabatan as tjab 
		WHERE tp.id_pendidikan=tpen.id_pendidikan and tp.id_jurusan=tj.id_jurusan and tp.id_jabatan = tjab.id_jabatan and tp.keterangan='Proses tahap 2'";
		return $this->db->query($query);
	}

	function tampil_satu(){
		$cek=$this->session->userdata['nik'];
		$query="select tp.id_pelamar, tp.nik, tp.nama,tp.tinggi,tp.jk, tp.no_hp, tp.tempat_lahir, tp.tanggal, tpen.nama_pendidikan, tj.jurusan, 
		tjab.jabatan, tp.alamat, tp.keterangan from t_pelamar as tp, t_pendidikan as tpen, t_jurusan as tj, t_jabatan as tjab 
		WHERE tp.id_pendidikan=tpen.id_pendidikan and tp.id_jurusan=tj.id_jurusan and tp.id_jabatan = tjab.id_jabatan  and tp.nik=$cek";
		return $this->db->query($query);
	}
	function tampil_satu_staf($id){
	
		$query="select tp.id_pelamar, tp.nik, tp.nama,tp.tinggi,tp.jk, tp.no_hp, tp.tempat_lahir, tp.tanggal, tpen.nama_pendidikan, tj.jurusan, 
		tjab.jabatan, tp.alamat, tp.keterangan from t_pelamar as tp, t_pendidikan as tpen, t_jurusan as tj, t_jabatan as tjab 
		WHERE tp.id_pendidikan=tpen.id_pendidikan and tp.id_jurusan=tj.id_jurusan and tp.id_jabatan = tjab.id_jabatan and tp.id_pelamar='$id'";
		return $this->db->query($query);
	}
}
