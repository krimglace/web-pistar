<?php

	class Referral extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$idtutor = $this->session->userdata('id_tutor');
				$where = array( 'id_tutor' => $idtutor );

				$data['pengajar'] = $this->Pengajar_Model->tampilData($where, 'tb_tutor')->result();
				$this->load->view('TutorView/header');
				$this->load->view('TutorView/sidebar', $data);
				$this->load->view('TutorView/referral', $data);
				$this->load->view('TutorView/footer');
			} else{
				redirect('home');
			}
		}

		public function update($id)
		{
			$idtutor = $id;
			$ref = $this->input->post('ref');

			$data = array('kode_referral' => $ref);
			$where = array('id_tutor' => $idtutor);

			$this->Pengajar_Model->updateData($where, $data, 'tb_tutor');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Referral Berhasil Di Update ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Tutor/Referral');
		}

	}

?>