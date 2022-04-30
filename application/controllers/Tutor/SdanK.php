<?php

	class SdanK extends CI_Controller{
		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$idtutor = $this->session->userdata('id_tutor');
				$where = array( 'id_tutor' => $idtutor );

				$data['pengajar'] = $this->Pengajar_Model->tampilData($where, 'tb_tutor')->result();
				$data['sk'] = $this->Admin_Model->tampilData('tb_syarat_ketentuan')->result();

				$this->load->view('TutorView/header');
				$this->load->view('TutorView/sidebar', $data);
				$this->load->view('TutorView/sdank', $data);
				$this->load->view('TutorView/footer');
			} else{
				redirect('home');
			}
		}
	}

?>