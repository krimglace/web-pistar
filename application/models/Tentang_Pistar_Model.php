<?php

	class Tentang_Pistar_Model extends CI_Model{

		public function tampilData($table)
		{
			return $this->db->get($table);
		}
		public function update_data($where, $data, $table)
		{
			$this->db->where($where);
			$this->db->update($table, $data);
		}

	}

?>