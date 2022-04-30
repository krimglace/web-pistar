<?php

	class Beri_Testimoni extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$idsiswa = $this->session->userdata('id_siswawali');
				$where = array( 'id_siswawali' => $idsiswa );

				$data['siswawali'] = $this->AkunSiswa_Model->tampilData($where, 'tb_siswawali_user')->result();
				$data['testimoni'] = $this->AkunSiswa_Model->tampilData($where, 'tb_testimoni_siswa')->result();

				$this->load->view('SiswaView/header');
				$this->load->view('SiswaView/sidebar', $data);
				$this->load->view('SiswaView/beritestimoni', $data);
				$this->load->view('SiswaView/footer');
			} else{
				redirect('Home');
			}
		}
		public function Tambah_Testimoni()
		{
			$idsiswa = $this->input->post('idsiswa');
			$isi = $this->input->post('isi_testimoni');

			$data = array(
				'id_siswawali' => $idsiswa,
				'isi_testimoni' => $isi
			);

			$this->AkunSiswa_Model->tambahPesanan($data,'tb_testimoni_siswa');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Testimoni Berhasil Di Tambahkan ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Siswa/Beri_Testimoni');
		}
		public function Hapus($id)
		{
			$where = array('id_testimoni' => $id);

			$this->AkunSiswa_Model->Delete($where, 'tb_testimoni_siswa');

			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-trash mr-2"></i> 
					Testimoni Berhasil Di Hapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Siswa/Beri_Testimoni');
		}

	}

?>