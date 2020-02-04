<?php
class model_Fpk extends CI_Model{


function tampil_data()
	{
		$query="select * from t_fpk,t_jabatan where t_jabatan.id_jabatan=t_fpk.id_jabatan and t_fpk.total>t_fpk.terpenuhi";
		return $this->db->query($query);
	}

	


	function insert()
	{

		$ketmp1=$this->input->post('ketmp1');
		$ketmp2=$this->input->post('ketmp2');
		$ketmp3=$this->input->post('ketmp3');
		$ketmp4=$this->input->post('ketmp4');

		$ketmp=$ketmp1.$ketmp2.$ketmp3.$ketmp4;
		$kemp1=$this->input->post('kemp1');
		$kemp2=$this->input->post('kemp2');
		$kemp3=$this->input->post('kemp3');
		$kemp4=$this->input->post('kemp4');
		$kemp5=$this->input->post('kemp5');
		$kemp6=$this->input->post('kemp6');
		$kemp7=$this->input->post('kemp7');
		$kemp8=$this->input->post('kemp8');
		$kemp=$kemp1.$kemp2.$kemp3.$kemp4.$kemp5.$kemp6.$kemp7.$kemp8;
		
		$data=array(
					'no_fpk'=>$this->input->post('no'),
					'Bagian'=>$this->input->post('bg'),
					'total'=>$this->input->post('tot'),
					'id_jabatan'=>$this->input->post('jabatan'),
					'jenis_kelamin'=>$this->input->post('gender'),
					'usia'=>$this->input->post('usia'),
					'pendidikan'=>$this->input->post('pendidikan'),
					'jurusan'=>$this->input->post('jurusan'),
					'ket_bahasa'=>$ketmp,
					'kemampuan'=>$kemp,
					'keterangan'=>$this->input->post('keterangan'),
				
					'terpenuhi'=>0
					);
		$this->db->insert('t_fpk',$data);
	}

		function insert_proses()
	{
		$data=array(
					
					'id_fpk'=>$this->input->post('fpk'),
					'id_pelamar'=>$this->input->post('id_pel')
					);
		$this->db->insert('t_fpk_pel',$data);
	}

	function detail($id)
		{
		$query="select tp.id_pelamar, tp.nik, tp.nama, tp.no_hp, tp.tempat_lahir, tp.tanggal, tpen.nama_pendidikan, tj.jurusan, 
		tjab.jabatan, tp.alamat, tp.keterangan, (year(curdate())-year(tp.tanggal)) as umur, tp.tinggi from t_pelamar as tp, 
		t_pendidikan as tpen, t_jurusan as tj, t_jabatan as tjab, t_fpk as f, t_fpk_pel as fp
		WHERE tp.id_pendidikan=tpen.id_pendidikan and tp.id_jurusan=tj.id_jurusan and tp.id_jabatan = tjab.id_jabatan and 
		(year(curdate())-year(tp.tanggal)<24) and tp.id_pelamar=fp.id_pelamar and fp.Id_fpk=$id and f.Id_fpk=fp.id_fpk ";
		return $this->db->query($query);
		}

	function detail_fpk($id){
		$param= array('id_fpk'=>$id);
		return $this->db->get_where('t_fpk',$param);
	}	
}
