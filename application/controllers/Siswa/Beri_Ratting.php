<?php

	class Beri_Ratting extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$idsiswa = $this->session->userdata('id_siswawali');
				$where = array( 'id_siswawali' => $idsiswa );

				$data['siswawali'] = $this->AkunSiswa_Model->tampilData($where, 'tb_siswawali_user')->result();
				$data['pengajar'] = $this->Admin_Model->tampilData('tb_tutor')->result();
				$data['pesanan'] = $this->AkunSiswa_Model->tampilData($where, 'tb_pesanan_les')->result();
				$data['id_siswawali'] = $idsiswa;
				
				$this->load->view('SiswaView/header');
				$this->load->view('SiswaView/sidebar', $data);
				$this->load->view('SiswaView/beriratting', $data);
				$this->load->view('SiswaView/footer');
			} else{
				redirect('home');
			}
		}
		public function Tambah_Ratting($id)
		{
			$no = 1;

			$idsiswa = $this->session->userdata('id_siswawali');
			$idtutor = $id;
			$jumlah_ratting = $this->input->post('nilai?id_tutor='.$idtutor);

			$dataSelect = array('jumlah_ratting' => $jumlah_ratting);
			$whereSelect = array('id_tutor' => $idtutor, 'id_siswawali_user' => $idsiswa);

			$rating = $this->AkunSiswa_Model->tampilData($whereSelect, 'tb_ratting_tutor');

			if($rating->num_rows() > 0){
				$this->AkunSiswa_Model->update_data($whereSelect,$dataSelect,'tb_ratting_tutor');
				$this->session->set_flashdata('pesan','
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-square mr-2"></i> 
						Berhasil Melakukan Penilaian! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				redirect('Siswa/Beri_Ratting');
			} else{
				$data = array(
					'jumlah_ratting' => $jumlah_ratting,
					'id_tutor' => $idtutor,
					'id_siswawali_user' => $idsiswa
				);

				$this->AkunSiswa_Model->tambahPesanan($data,'tb_ratting_tutor');
				$this->session->set_flashdata('pesan','
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-square mr-2"></i> 
						Berhasil Melakukan Penilaian ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				redirect('Siswa/Beri_Ratting');
			}
		}

	}

?>