<?php
class model_login extends CI_Model{



	function login($username,$password){

		$cek= $this->db->get_where('users',array('user'=>$username,'password'=>$password));
		if($cek->num_rows()>0)
		{
			$r= $cek->row_array();
			$id=$r['id_login'];
			$data2=array('id_login'=>$r['id_login'], 
							'nama'=>$r['nama'],    
							 'user'=>$username,
							 'password'=>$password,                     
                            'level'=>$r['level'],
                         	'nik'=>$r['nik'],
                            'last_login'=>date('Y-m-d H:i:s'),
                            'email'=>$r['email']

						);
		$cekdata=$this->db->get_where('t_pelamar',array('nik'=>$r['nik']));
		if($cekdata->num_rows()>0)
		{
			$k= $cekdata->row_array();
			$id_pelamar=$k['id_pelamar'];
			$keterangan=$k['keterangan'];

		}
                $data=array('id_login'=>$r['id_login'],                          
                            'level'=>$r['level'],
                         	'status_login'=>'sukses',
                         	'nik'=>$r['nik'],
                         	'nama'=>$r['nama'], 
                         	'id_pelamar'=>$id_pelamar,
                            'user'=>$username,
                            'email'=>$r['email'],
                            'keterangan'=>$keterangan,
                			'password'=>$password);
                $this->session->set_userdata($data);

              
        $this->db->where('id_login',$id);
        $this->db->update('users',$data2);
        
			return 1;		
		}
			else
			{
				return 0;
			}
	}





}