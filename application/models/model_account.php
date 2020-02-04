<?php
class model_account extends CI_Model{


function tampil_data()
	{
		$query="select * from users";
		return $this->db->query($query);
	}

	function insert(){
		$data=array(
					'nama'=>$this->input->post('nama'),
					'user'=>$this->input->post('user'),
					'password'=>$this->input->post('password'),
					'level'=>$this->input->post('level') 
					);
		$this->db->insert('users',$data);
	}
	function update(){
		$id=$this->session->userdata['id_login'];
		$data=array(
					'nik'=>$this->session->userdata['nik'],
					'nama'=>$this->session->userdata['nama'],
					'user'=>$this->input->post('user'),
					'password'=>$this->input->post('passnew'),
					'level'=>$this->session->userdata['level'],
					 'last_login'=>date('Y-m-d H:i:s'),
					 'email'=>$this->session->userdata['email']
					);
		$this->db->where('id_login',$id);
		$this->db->update('users',$data);

}
}
	