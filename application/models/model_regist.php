		<?php
class model_regist extends CI_Model{



	function insert(){
		$data=array(
					'nama'=>$this->input->post('nama'),
					'user'=>$this->input->post('user'),
					'password'=>$this->input->post('password'),
					'email'=>$this->input->post('email'),
					'level'=>'3', 
					'nik'=>$this->input->post('nik')
					);
		$this->db->insert('users',$data);
	}

}
	