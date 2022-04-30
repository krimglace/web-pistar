<?php

		class Jadi_Pengajar extends CI_Controller{

			public function index()
			{
				$where = array('keterangan' => 'Panduan');
				$data['faq'] = $this->Utama_Model->tampilData('tb_faq')->result();
				$data['tentang'] = $this->Utama_Model->tampilData('tb_tentang_pistar')->result();
				$data['panduan'] = $this->Utama_Model->tampilDataByID($where, 'tb_panduan_jadipengajar')->result();
				
				$this->load->view('header', $data);
				$this->load->view('jadipengajar', $data);
				$this->load->view('faq', $data);
				$this->load->view('footer', $data);
			}
		}

?>
