<?php

	class ProgramLes_Model extends CI_Model{

		public function namaprogram()
		{
			$this->db->select('*');
			$this->db->from('tb_namaprogramles');
			$this->db->order_by('id_namaprogram asc');
			$query = $this->db->get();
			return $query;
		}
		
		public function getdatalevel($id_levelkurikulum)
		{
			$this->db->select('*');
			$this->db->from('tb_levelkurikulum');
			$this->db->where('id_namaprogram = "$id_levelkurikulum"');
			$this->db->order_by('id_levelkurikulum asc');
			$query = $this->db->get();
			return $query->result();
		}
		public function filterdata($where, $table)
		{
			$this->db->where($where);
			return $this->db->get($table);
		}

	}


?>