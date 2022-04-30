<?php

	class Logout extends CI_Controller{

		public function index()
		{
			$this->session->sess_destroy();
			echo "<script>
				alert('Data Anda Berhasil Logout');
				window.location.href = '".base_url('Home')."';
			</script>";

		}

	}


?>