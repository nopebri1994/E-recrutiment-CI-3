<?php
class model_lampiran extends CI_Model{



	function insert($foto,$pdf)
	{
		
		$data=array(
					
					'id_pelamar'=>$this->session->userdata['id_pelamar'],
					'foto'=>$foto,
					'lampiran'=>$pdf
				
					);
		$this->db->insert('lampiran',$data);
		
	}

	function tampil_detail(){
		$cek=$this->session->userdata['id_pelamar'];
		$query="select * from lampiran where id_pelamar='$cek'";
		return $this->db->query($query);
	}
		function tampil_detail_staf($id){
		
		$query="select * from lampiran where id_pelamar='$id'";
		return $this->db->query($query);
	}
	function update($foto){
		$id=$this->session->userdata['id_pelamar'];
		$query="Select * From lampiran where id_pelamar='$id'";
		$data=$this->db->query($query);
		foreach($data->result() as $d){
	
		$lampiran_old=$d->lampiran;
		$id_lampiran=$d->id_lampiran;	

		}
		
		$data=array(
				'id_pelamar'=>$id,
				'foto'=>$foto,
				'lampiran'=>$lampiran_old
			);
		$this->db->where('id_lampiran',$id_lampiran);
		$this->db->update('lampiran',$data);
	}
	function update_lamp($pdf){
		$id=$this->session->userdata['id_pelamar'];
		$query="Select * From lampiran where id_pelamar='$id'";
		$data=$this->db->query($query);
		foreach($data->result() as $d){
		$foto=$d->foto;
		$id_lampiran=$d->id_lampiran;	
		}
		
		$data=array(
				'id_pelamar'=>$id,
				'foto'=>$foto,
				'lampiran'=>$pdf
			);
		$this->db->where('id_lampiran',$id_lampiran);
		$this->db->update('lampiran',$data);
	}

}
	