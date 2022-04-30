<?php 

	class LoginAdmin_Model extends CI_Model{

		public function cek_login($email, $password)
		{
			$this->db->where("email_admin", $email);
			$this->db->where("password_admin", $password);
			return $this->db->get('tb_admin');
		}

	}


?>