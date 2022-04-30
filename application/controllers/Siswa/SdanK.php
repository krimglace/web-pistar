<?php

	class SdanK extends CI_Controller{
		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$idsiswa = $this->session->userdata('id_siswawali');
				$where = array( 'id_siswawali' => $idsiswa );

				$data['siswawali'] = $this->AkunSiswa_Model->tampilData($where, 'tb_siswawali_user')->result();
				$data['sk'] = $this->Admin_Model->tampilData('tb_syarat_ketentuan')->result();

				$this->load->view('SiswaView/header');
				$this->load->view('SiswaView/sidebar', $data);
				$this->load->view('SiswaView/sdank', $data);
				$this->load->view('SiswaView/footer');
			} else{
				redirect('Home');
			}
		}
	}

?>