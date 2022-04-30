<?php 

	class Login_Model extends CI_Model{

		public function cek_loginsiswa($email, $password, $table)
		{
			$this->db->where("email_user", $email);
			$this->db->where("password_user", $password);
			return $this->db->get($table);
		}
		public function cek_logintutor($table, $where)
		{
			$this->db->where($where);
			return $this->db->get($table);
		}
		public function get_logintutor($table, $where)
		{
			$this->db->where($where);
			return $this->db->get('tb_tutor');
		}

	}


?>