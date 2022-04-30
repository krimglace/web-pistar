<?php

	class Dashboard extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$idtutor = $this->session->userdata('id_tutor');
				$where = array( 'id_tutor' => $idtutor );

				$data['pengajar'] = $this->Pengajar_Model->tampilData($where, 'tb_tutor')->result();
				$this->load->view('TutorView/header');
				$this->load->view('TutorView/sidebar', $data);
				$this->load->view('TutorView/dashboard');
				$this->load->view('TutorView/footer');
			} else{
				redirect('home');
			}
		}

	}

?>