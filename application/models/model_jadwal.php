<?php
class model_jadwal extends CI_Model{


function tampil_data()
	{
		return $this->db->get('t_jadwal');
	}


function insert()
{
	$q=$this->db->query("SELECT MAX(RIGHT(id_jadwal,3)) as kodee from t_jadwal");
		$kd="";
		if($q->num_rows()>0){ 
            foreach($q->result() as $k){
                $tmp = ((int)$k->kodee)+1; 
                $kd = sprintf("%03s", $tmp); 
            }
        }else{ 
            $kd = "001";
        }
        $kar = "JA"; 
   		$kodejadi = $kar.$kd;
		$data=array(
					'id_jadwal'=>$kodejadi,
					'tanggal'=>$this->input->post('tgl')
					);
		$this->db->insert('t_jadwal',$data);
	}
	function hapus($id){
		$this->db->where('id_jadwal',$id);
		$this->db->delete('t_jadwal');
	}
	function get_one($id){
		$param = array('id_jadwal'=>$id);
		return $this->db->get_where('t_jadwal',$param);
	}

	function edit(){
		$data=array(
					'tanggal'=>$this->input->post('tgl')
					);
		$this->db->where('id_jadwal',$this->input->post('id'));
		$this->db->update('t_jadwal',$data);
	}

}
