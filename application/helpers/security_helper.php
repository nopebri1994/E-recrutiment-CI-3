<?php
	function cek_session()
	{ 
		$CI=& get_instance();
		$session=$CI->session->userdata('status_login');
		if($session != 'sukses'){
			redirect('auth');
		
		}
	}

	function cek_session_login()
	{
		$CI=& get_instance();
		$session=$CI->session->userdata('status_login');
		if($session == 'sukses'){
			redirect('home');
	}
}

?>