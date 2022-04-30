<?php

	class Admin_Model extends CI_Model{

		public function tampilData($table)
		{
			return $this->db->get($table);
		}

		public function tampilDataKomisi($table){
			$query = "SELECT *FROM ".$table." ORDER BY status_komisi ASC";
			return $this->db->query($query);
		}

		public function update_data($where, $data, $table)
		{
			$this->db->where($where);
			$this->db->update($table, $data);
		}
		
		public function tambahAdmin($data, $table)
		{
			$this->db->insert($table, $data);
		}

		public function tambahData($data, $table)
		{
			$this->db->insert($table, $data);
		}

		public function GetAdmin($where, $table)
		{
			$this->db->where($where);
			return $this->db->get($table);
		}

		public function GetData($where, $table)
		{
			$this->db->where($where);
			return $this->db->get($table);
		}

		public function deleteAdmin($where, $table)
		{
			$this->db->where($where);
			$this->db->delete($table);
		}

		public function setujuiTutor($where, $data, $table)
		{
			$this->db->where($where);
			$this->db->update($table, $data);
		}
	}

?>