<?php
class model_submenu extends CI_Model{


function tampil_data()
	{
		$query="select s.nama_submenu, s.link, s.aktif, s.icon, s.level,m.nama_mainmenu from submenu as s, mainmenu as m where m.id_mainmenu=s.id_mainmenu";
		return $this->db->query($query);
	}

function insert()
	{
		$data=array(
					'id_mainmenu'=>$this->input->post('mainmenu'),
					'nama_submenu'=>$this->input->post('nama'),
					'link'=>$this->input->post('link'),
					'aktif'=>$this->input->post('aktif'),
					'icon'=>$this->input->post('icon'),
					'level'=>$this->input->post('level')
					);
		$this->db->insert('submenu',$data);

	}

}
