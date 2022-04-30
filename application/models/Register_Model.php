<?php

	class Register_Model extends CI_Model{

		public function cekdatasiswa()
		{
			$this->db->select('RIGHT(tb_siswawali_user.id_siswawali, 3) as id_siswa, tb_siswawali_user.email_user as email', FALSE);
			return $this->db->get('tb_siswawali_user');
		}
		public function insertdata($data, $table)
		{
			$this->db->insert($table, $data);
		}
		public function cekdatatutor()
		{
			$this->db->select('RIGHT(tb_tutor.id_tutor, 3) as id_tutor, tb_tutor.email_tutor as email', FALSE);
			return $this->db->get('tb_tutor');
		}

	}

?>