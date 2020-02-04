<?php
class model_transaksi extends CI_Model{


function tampil_data_tes()
	{
		$query="select tp.nama, (year(curdate())-year(tp.tanggal)) as umur, tpen.nama_pendidikan, tjad.tanggal 
		from t_pelamar as tp, t_pendidikan as tpen, t_jurusan as tj ,t_jadwal_pel as tjp, t_jadwal as tjad WHERE 
		tp.id_pendidikan=tpen.id_pendidikan and tp.id_jurusan=tj.id_jurusan and (year(curdate())-year(tp.tanggal)<24) and 
		tp.keterangan='proses tahap 2' and tjp.id_pelamar = tp.id_pelamar and tjp.id_jadwal = tjad.id_jadwal  ";
		return $this->db->query($query);
	}

	function per_tanggal($tanggal)
	{
		$query="select tp.nama, (year(curdate())-year(tp.tanggal)) as umur, 
		tpen.nama_pendidikan, tjad.tanggal from t_pelamar as tp, t_pendidikan as tpen, 
		t_jurusan as tj ,t_jadwal_pel as tjp, t_jadwal as tjad WHERE tp.id_pendidikan=tpen.id_pendidikan and 
		tp.id_jurusan=tj.id_jurusan and (year(curdate())-year(tp.tanggal)<24) and tp.keterangan='proses tahap 2' 
		and tjp.id_pelamar = tp.id_pelamar and tjp.id_jadwal = tjad.id_jadwal and tjad.tanggal= '$tanggal'";
		return $this->db->query($query);
	}

	

		function tampil_data_tl()
	{
		$query="select tp.id_pelamar, tp.nik, tp.nama, tp.no_hp, tp.tempat_lahir, tp.tanggal, tpen.nama_pendidikan, tj.jurusan, 
		tjab.jabatan, tp.alamat, tp.keterangan, (year(curdate())-year(tp.tanggal)) as umur, tp.tinggi 
		from t_pelamar as tp, 
		t_pendidikan as tpen, t_jurusan as tj, t_jabatan as tjab 
		WHERE tp.id_pendidikan=tpen.id_pendidikan and tp.id_jurusan=tj.id_jurusan and tp.id_jabatan = tjab.id_jabatan and 
		tp.keterangan='Tidak lulus'";
		return $this->db->query($query);
	}

}
