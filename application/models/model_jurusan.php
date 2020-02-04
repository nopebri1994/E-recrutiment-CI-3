<?php
class model_jurusan extends CI_Model{


function tampil_data()
	{

		return $this->db->get('t_jurusan');
	}


function insert()
	{
		
		$q=$this->db->query("SELECT MAX(RIGHT(id_jurusan,3)) as kodee from t_jurusan");
		$kd="";
		if($q->num_rows()>0){ 
            foreach($q->result() as $k){
                $tmp = ((int)$k->kodee)+1; 
                $kd = sprintf("%03s", $tmp); 
            }
        }else{ 
            $kd = "001";
        }
        $kar = "J"; 
   		$kodejadi = $kar.$kd;

		$data=array(
					'id_jurusan'=>$kodejadi,
					'jurusan'=>$this->input->post('jurusan')
					);
		$this->db->insert('t_jurusan',$data);
	}
	function hapus($id){
		$this->db->where('id_jurusan',$id);
		$this->db->delete('t_jurusan');
	}

	function get_one($id){
		$param = array('id_jurusan'=>$id);
		return $this->db->get_where('t_jurusan',$param);	
	}

	function edit(){
		$data=array(
					'jurusan'=>$this->input->post('nama')
					);
		$this->db->where('id_jurusan',$this->input->post('id'));
		$this->db->update('t_jurusan',$data);
	}
}
