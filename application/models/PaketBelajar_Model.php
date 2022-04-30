<?php

	class PaketBelajar_Model extends CI_Model{

		public function tampilData($table)
		{
			return $this->db->get($table);
		}

	}

?>