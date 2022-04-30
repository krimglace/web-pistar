<?php 

	class AkunSiswa_Model extends CI_Model{

		public function tampilData($where, $table)
		{
			$this->db->where($where);
			return $this->db->get($table);
		}
		public function update_data($where, $data, $table)
		{
			$this->db->where($where);
			$this->db->update($table, $data);
		}
		public function tampilDataPesanan($table)
		{
			return $this->db->get($table);
		}
		public function cekdatapesanan()
		{
			$this->db->select('RIGHT(tb_pesanan_les.id_pesanan, 3) as pesanan', FALSE);
			return $this->db->get('tb_pesanan_les');
		}
		public function tambahPesanan($data, $table)
		{
			return $this->db->insert($table, $data);
		}
		public function Delete($where, $table)
		{
			$this->db->where($where);
			$this->db->delete($table);
		}

	}

?>