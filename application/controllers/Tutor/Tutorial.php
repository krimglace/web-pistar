<?php

    class Tutorial extends CI_Controller{
        
        public function index()
        {
            if($this->session->userdata('status')=="login"){

				$idtutor = $this->session->userdata('id_tutor');
				$where = array( 'id_tutor' => $idtutor );

				$data['pengajar'] = $this->Pengajar_Model->tampilData($where, 'tb_tutor')->result();
				$data['tutorial'] = $this->Blog_Model->tampilData('tb_tutorial')->result();

				$this->load->view('TutorView/header');
				$this->load->view('TutorView/sidebar', $data);
				$this->load->view('TutorView/tutorial', $data);
				$this->load->view('TutorView/footer');
			} else{
				redirect('home');
			}
        }
        public function Filter()
		{

			$jenis_tutorial = $this->input->post('jenis_tutorial');
			
			$idtutor = $this->session->userdata('id_tutor');
			$where = array( 'id_tutor' => $idtutor );

			$data['pengajar'] = $this->Pengajar_Model->tampilData($where, 'tb_tutor')->result();
				
			$where2 = array(
				'jenis_tutorial' => $jenis_tutorial
			);
            $data['tutorial'] = $this->Blog_Model->tampilData('tb_tutorial')->result();
            $data['filter'] = $this->ProgramLes_Model->filterdata($where2, 'tb_tutorial')->result();

			$this->load->view('TutorView/header');
			$this->load->view('TutorView/sidebar', $data);
			$this->load->view('TutorView/tutorialfilter', $data);
			$this->load->view('TutorView/footer');
		}
        
    }

?>