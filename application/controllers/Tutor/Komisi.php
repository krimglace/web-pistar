<?php

	class Komisi extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$idtutor = $this->session->userdata('id_tutor');
				$where = array( 'id_tutor' => $idtutor );

				$data['pengajar'] = $this->Pengajar_Model->tampilData($where, 'tb_tutor')->result();

				$data['komisi'] = $this->Komisi_Model->tampilData($idtutor);
				$this->load->view('TutorView/header');
				$this->load->view('TutorView/sidebar', $data);
				$this->load->view('TutorView/komisi', $data);
				$this->load->view('TutorView/footer');
			} else{
				redirect('home');
			}
		}
		public function klaim($id)
		{	
			$idtutor = $this->session->userdata('id_tutor');
			$idkomisi = $id;
			$status = 'Sedang Diproses';
			$rekening = $this->input->post('rekening');

			$data = array(
				'status_komisi' => $status,
				'rekening' => $rekening
			);
			$where = array('id_komisi' => $idkomisi);

			$this->Komisi_Model->updateKomisi($data, $where, 'tb_komisi_tutor');
			redirect('Tutor/Komisi');
		}

	}

?>