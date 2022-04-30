<?php

    class Tutorial extends CI_Controller{
        
        public function index()
        {
            if($this->session->userdata('status')=="login"){

				$idsiswa = $this->session->userdata('id_siswawali');
				$where = array( 'id_siswawali' => $idsiswa );

				$data['siswawali'] = $this->AkunSiswa_Model->tampilData($where, 'tb_siswawali_user')->result();
				$data['tutorial'] = $this->Blog_Model->tampilData('tb_tutorial')->result();

				$this->load->view('SiswaView/header');
				$this->load->view('SiswaView/sidebar', $data);
				$this->load->view('SiswaView/tutorial', $data);
				$this->load->view('SiswaView/footer');
			} else{
				redirect('home');
			}
        }
        public function Filter()
		{

			$jenis_tutorial = $this->input->post('jenis_tutorial');
			
			$idsiswa = $this->session->userdata('id_siswawali');
			$where = array( 'id_siswawali' => $idsiswa );

			$data['siswawali'] = $this->AkunSiswa_Model->tampilData($where, 'tb_siswawali_user')->result();
				
			$where2 = array(
				'jenis_tutorial' => $jenis_tutorial
			);
            $data['tutorial'] = $this->Blog_Model->tampilData('tb_tutorial')->result();
            $data['filter'] = $this->ProgramLes_Model->filterdata($where2, 'tb_tutorial')->result();

			$this->load->view('SiswaView/header');
				$this->load->view('SiswaView/sidebar', $data);
				$this->load->view('SiswaView/tutorialfilter', $data);
				$this->load->view('SiswaView/footer');
		}
        
    }

?>