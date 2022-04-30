<?php

	class Faq_Model extends CI_Model
	{
		public function tampilData($tablename)
		{			
			return $this->db->get($tablename);
		}
		public function tampilDataPanduanJadiPengajar($tablename)
		{			
			return $this->db->get($tablename);
		}

		public function UpdateJawaban($where, $data, $table)
		{
			$this->db->where($where);
			$this->db->update($table, $data);
		}

		public function DeleteJawaban($where, $table)
		{
			$this->db->where($where);
			$this->db->delete($table);
		}
	}

?>