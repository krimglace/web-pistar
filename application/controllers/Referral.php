<?php

	class Referral extends CI_Controller{

		public function index()
		{
			$data['faq'] = $this->Utama_Model->tampilData('tb_faq')->result();
			$data['tentang'] = $this->Utama_Model->tampilData('tb_tentang_pistar')->result();

			$this->load->view('header.php', $data);
			$this->load->view('referral.php');
			$this->load->view('faq', $data);
			$this->load->view('footer.php', $data);
		}

	}

?>