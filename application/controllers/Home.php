<?php

	class Home extends CI_Controller{

		public function index()
		{
			$data['tentang'] = $this->Utama_Model->tampilData('tb_tentang_pistar')->result();
			$data['faq'] = $this->Utama_Model->tampilData('tb_faq')->result();
			$where = array('keterangan' => 'Panduan');
			$where1 = array('keterangan' => 'Siswa');
			$where2 = array('keterangan' => 'Tutor');
			$data['panduan'] = $this->Pengajar_Model->tampilData($where, 'tb_panduan_jadipengajar')->result();
			$data['panduansiswa'] = $this->Pengajar_Model->tampilData($where1, 'tb_panduan_jadipengajar')->result();
			$data['panduantutor'] = $this->Pengajar_Model->tampilData($where2, 'tb_panduan_jadipengajar')->result();
			$query = "SELECT * FROM tb_slider WHERE id_slide = '1'";
			$query1 = "SELECT * FROM tb_slider WHERE id_slide != '1'";
			$data['slide1'] = $this->db->query($query)->result();
			$data['slidenext'] = $this->db->query($query1)->result();
// 			var_dump($data['slidenext']);
			
			$this->load->view('header', $data);
			$this->load->view('home', $data);
			$this->load->view('faq', $data);
			$this->load->view('footer', $data);
		}
	}
	
?>