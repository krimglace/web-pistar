<?php

	class Komisi_Model extends CI_Model{

		public function tampilData($where)
		{
			$query = "SELECT * FROM tb_tutor as tutor JOIN tb_komisi_tutor as komisi ON tutor.id_tutor = komisi.id_tutor WHERE tutor.id_tutor = '".$where."'";
			$que = $this->db->query($query)->result();
			return $que;
		}
		public function updateKomisi($data, $where, $table)
		{
			$this->db->where($where);
			$this->db->update($table, $data);
		}

	}

?>