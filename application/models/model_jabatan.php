<?php
class model_jabatan extends CI_Model{


function tampil_data()
	{
		return $this->db->get('t_jabatan');
	}

	


	function insert()
	{
		$q=$this->db->query("SELECT MAX(RIGHT(id_jabatan,3)) as kodee from t_jabatan");
		$kd="";
		if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
                $tmp = ((int)$k->kodee)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = sprintf("%03s", $tmp); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $kd = "001";
        }
        $kar = "JD"; //karakter depan kodenya
        //gabungkan string dengan kode yang telah dibuat tadi
   		$kodejadi = $kar.$kd;
   

		$data=array(	
					'id_jabatan'=>$kodejadi,
					'jabatan'=>$this->input->post('jabatan')
					);
		$this->db->insert('t_jabatan',$data);
	}

	function hapus($id){
		$this->db->where('id_jabatan',$id);
		$this->db->delete('t_jabatan');
	}

	function get_one($id){
		$param= array('id_jabatan'=>$id);
		return $this->db->get_where('t_jabatan',$param);
		
	}
	function edit(){
		$data=array(	
					'jabatan'=>$this->input->post('jabatan')
					);
		$this->db->where('id_jabatan',$this->input->post('id'));
		$this->db->update('t_jabatan',$data);
	}


}
