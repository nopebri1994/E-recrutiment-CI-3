<?php
class model_pendidikan extends CI_Model{


function tampil_data()
	{
		return $this->db->get('t_pendidikan');
	}

	


function insert()
	{
		$q=$this->db->query("SELECT MAX(RIGHT(id_pendidikan,3)) as kodee from t_pendidikan");
		$kd="";
		if($q->num_rows()>0){ 
            foreach($q->result() as $k){
                $tmp = ((int)$k->kodee)+1; 
                $kd = sprintf("%03s", $tmp); 
            }
        }else{ 
            $kd = "001";
        }
        $kar = "P"; 
   		$kodejadi = $kar.$kd;

		$data=array(
					'id_pendidikan'=>$kodejadi,
					'nama_pendidikan'=>$this->input->post('nama')
					);
		$this->db->insert('t_pendidikan',$data);
	}
	function hapus($id){
		$this->db->where('id_pendidikan',$id);
		$this->db->delete('t_pendidikan');

	}
	function get_one($id){
		$param=array('id_pendidikan'=>$id);
	return $this->db->get_where('t_pendidikan',$param);
	}

	function edit(){
		$data=array(	
					'nama_pendidikan'=>$this->input->post('nama')
					);
		$this->db->where('id_pendidikan',$this->input->post('id'));
		$this->db->update('t_pendidikan',$data);
	}
}
