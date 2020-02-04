<?php
class model_mainmenu extends CI_Model{


function tampil_data()
	{
		$query="select * from mainmenu";
		return $this->db->query($query);
	}

	function insert()
	{
		$data=array(
					
					'nama_mainmenu'=>$this->input->post('nama'),
					'icon'=>$this->input->post('icon'),
					'aktif'=>$this->input->post('aktif'),
					'link'=>$this->input->post('link'),
					'level'=>$this->input->post('level')
					);
		$this->db->insert('mainmenu',$data);
	}


}
	