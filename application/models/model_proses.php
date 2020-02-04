<?php
class model_proses extends CI_Model{


function tampil_data()
	{
		$query="select tp.id_pelamar, tp.nik, tp.nama, tp.no_hp, tp.tempat_lahir, tp.tanggal, tpen.nama_pendidikan, tj.jurusan, 
		tjab.jabatan, tp.alamat, tp.keterangan, (year(curdate())-year(tp.tanggal)) as umur, tp.tinggi, hasil_ui.nilai from t_pelamar as tp, 
		t_pendidikan as tpen, t_jurusan as tj, t_jabatan as tjab, hasil_ui 
		WHERE tp.id_pendidikan=tpen.id_pendidikan and tp.id_jurusan=tj.id_jurusan and tp.id_jabatan = tjab.id_jabatan and 
		(year(curdate())-year(tp.tanggal)<24) and tp.keterangan='Sudah Mengikuti Ujian Online' and tp.tinggi>=163 and tp.id_pelamar=hasil_ui.id_pelamar ";
		return $this->db->query($query);
	}

	


	function insert()
	{
		$data=array(
					'id_pelamar'=>$this->input->post('id'),
					'id_jadwal'=>$this->input->post('jadwal')
					);
		$this->db->insert('t_jadwal_pel',$data);
	}
	function cek_data()
	{
		$id=$this->session->userdata['id_pelamar'];	
		$query="Select pel.id_pelamar,pel.id_jadwal, jad.tanggal from t_jadwal_pel as pel, t_jadwal as jad where jad.id_jadwal=pel.id_jadwal and id_pelamar='$id'";
		return $this->db->query($query);
	}	

}
