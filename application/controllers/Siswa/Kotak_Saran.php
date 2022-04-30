<?php

	class Kotak_Saran extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$idsiswa = $this->session->userdata('id_siswawali');
				$where = array( 'id_siswawali' => $idsiswa );
				$where2 = array( 'id' => $idsiswa );

				$data['siswawali'] = $this->AkunSiswa_Model->tampilData($where, 'tb_siswawali_user')->result();
				$data['kotaksaran'] = $this->AkunSiswa_Model->tampilData($where2, 'tb_kotaksaran')->result();

				$this->load->view('SiswaView/header');
				$this->load->view('SiswaView/sidebar', $data);
				$this->load->view('SiswaView/kotaksaran', $data);
				$this->load->view('SiswaView/footer');
			} else{
				redirect('Home');
			}
		}
		public function Tambah_Saran()
		{
			$id = $this->input->post('idsiswa');
			$subjek = $this->input->post('subjek');
			$isi = $this->input->post('isi');
			$target = $this->input->post('target');

			$data = array(
				'id' => $id,
				'judul_saran' => $subjek,
				'isi_saran' => $isi,
				'target' => $target
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
			redirect('Siswa/Kotak_Saran');
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
			redirect('Siswa/Kotak_Saran');
		}

	}

?>