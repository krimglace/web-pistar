<?php

	class Utama_Model extends CI_Model{

		public function tampilData($table)
		{
			return $this->db->get($table);
		}
		public function tambahBlog($data, $table)
		{
			return $this->db->insert($table, $data);
		}
		public function tampilDataByID($where, $table)
		{
			$this->db->where($where);
			return $this->db->get($table);
		}

	}

?>