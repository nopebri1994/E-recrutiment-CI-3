<?php
class model_info extends CI_Model{


function tampil_data()
	{
		$query="select * from t_info where status='Y'";
		return $this->db->query($query);

	}

	


	function insert()
	{
		$data=array(
					'info'=>$this->input->post('info'),
					'status'=>$this->input->post('status')
					);
		$this->db->insert('t_info',$data);
	}

}