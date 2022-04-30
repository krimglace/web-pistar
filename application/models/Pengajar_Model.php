<?php

	class Pengajar_Model extends CI_Model{

		public function tampilData($where, $table)
		{
			$this->db->where($where);
			return $this->db->get($table);
		}
		public function tambahData($data, $table)
		{
			$this->db->insert($table, $data);
		}
		public function updateData($where, $data, $table)
		{
			$this->db->where($where);
			$this->db->update($table, $data);
		}
        public function tampilDataDESC($where, $table, $DESC)
		{
			$this->db->where($where);
			$this->db->Order_By('id_tutor', $DESC);
			return $this->db->get($table);
		}
		public function tampilDataCount($where, $table)
		{
			$this->db->where($where);
			$query = $this->db->get($table);
			if($query->num_rows() > 0){
				return $query->num_rows();
			} else{
				return 0;
			}
		}
	}

?>