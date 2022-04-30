<?php

	class Kotak_Saran extends CI_Controller{

		public function index()
		{	
			if($this->session->userdata('status')=="login"){

				$idtutor = $this->session->userdata('id_tutor');
				$where = array( 'id_tutor' => $idtutor );
				$where2 = array( 'target' => 'tutor' );
				$where3 = array( 'id' => $idtutor );


				$data['komisi'] = $this->Komisi_Model->tampilData($idtutor);
				$data['pengajar'] = $this->Pengajar_Model->tampilData($where, 'tb_tutor')->result();
				$data['kotaksaransiswa'] = $this->Pengajar_Model->tampilData($where2, 'tb_kotaksaran')->result();
				$data['kotaksaranpengajar'] = $this->Pengajar_Model->tampilData($where3, 'tb_kotaksaran')->result();

				$this->load->view('TutorView/header');
				$this->load->view('TutorView/sidebar', $data);
				$this->load->view('TutorView/kotaksaran', $data);
				$this->load->view('TutorView/footer');
			} else{
				redirect('home');
			}
		}
		public function Tambah_Saran()
		{
			$id = $this->input->post('idtutor');
			$subjek = $this->input->post('subjek');
			$isi = $this->input->post('isi');

			$data = array(
				'id' => $id,
				'judul_saran' => $subjek,
				'isi_saran' => $isi,
				'target' => 'Admin'
			);

			$this->AkunSiswa_Model->tambahPesanan($data,'tb_kotaksaran');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Saran Berhasil Di Tambahkan ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Tutor/Kotak_Saran');
		}
		public function Hapus($id)
		{
			$where = array('id_saran' => $id);

			$this->AkunSiswa_Model->Delete($where, 'tb_kotaksaran');

			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-trash mr-2"></i> 
					Saran Berhasil Di Hapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Tutor/Kotak_Saran');
		}

	}

?>