<?php

	class Beri_Testimoni extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$idtutor = $this->session->userdata('id_tutor');
				$where = array( 'id_tutor' => $idtutor );

				$data['pengajar'] = $this->Pengajar_Model->tampilData($where, 'tb_tutor')->result();
				$data['testimoni'] = $this->AkunSiswa_Model->tampilData($where, 'tb_testimoni_tutor')->result();

				$this->load->view('TutorView/header');
				$this->load->view('TutorView/sidebar', $data);
				$this->load->view('TutorView/beritestimoni', $data);
				$this->load->view('TutorView/footer');
			} else{
				redirect('home');
			}
		}
		public function Tambah_Testimoni()
		{
			$idtutor = $this->input->post('idtutor');
			$isi = $this->input->post('isi_testimoni');

			$data = array(
				'id_tutor' => $idtutor,
				'isi_testimoni' => $isi
			);

			$this->AkunSiswa_Model->tambahPesanan($data,'tb_testimoni_tutor');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Testimoni Berhasil Di Tambahkan ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Tutor/Beri_Testimoni');
		}
		public function Hapus($id)
		{
			$where = array('id_testi_tutor' => $id);

			$this->AkunSiswa_Model->Delete($where, 'tb_testimoni_tutor');

			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-trash mr-2"></i> 
					Testimoni Berhasil Di Hapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Tutor/Beri_Testimoni');
		}

	}

?>