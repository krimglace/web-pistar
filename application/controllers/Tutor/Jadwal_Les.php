<?php

	class Jadwal_Les extends CI_Controller{
		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$idtutor = $this->session->userdata('id_tutor');
				$where = array( 'id_tutor' => $idtutor );

				$data['pengajar'] = $this->Pengajar_Model->tampilData($where, 'tb_tutor')->result();

				$this->load->view('TutorView/header');
				$this->load->view('TutorView/sidebar', $data);
				$this->load->view('TutorView/jadwalles', $data);
				$this->load->view('TutorView/footer');
			} else{
				redirect('home');
			}
		}
		public function update_senin(){
			$id_pesanan = $this->input->post('id_pesanan');
			$link_senin = $this->input->post('link_senin');
			
			$where = array('id_pesanan' => $id_pesanan);
			$data = array('link_senin' => $link_senin);

			$this->AkunSiswa_Model->update_data($where,$data,'tb_pesanan_les');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Berhasil Di Ganti ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Tutor/Jadwal_Les');
		}
		public function update_selasa(){
			$id_pesanan = $this->input->post('id_pesanan');
			$link_selasa = $this->input->post('link_selasa');
			
			$where = array('id_pesanan' => $id_pesanan);
			$data = array('link_selasa' => $link_selasa);

			$this->AkunSiswa_Model->update_data($where,$data,'tb_pesanan_les');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Berhasil Di Ganti ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Tutor/Jadwal_Les');
		}
		public function update_rabu(){
			$id_pesanan = $this->input->post('id_pesanan');
			$link_rabu = $this->input->post('link_rabu');
			
			$where = array('id_pesanan' => $id_pesanan);
			$data = array('link_rabu' => $link_rabu);

			$this->AkunSiswa_Model->update_data($where,$data,'tb_pesanan_les');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Berhasil Di Ganti ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Tutor/Jadwal_Les');
		}
		public function update_kamis(){
			$id_pesanan = $this->input->post('id_pesanan');
			$link_kamis = $this->input->post('link_kamis');
			
			$where = array('id_pesanan' => $id_pesanan);
			$data = array('link_kamis' => $link_kamis);

			$this->AkunSiswa_Model->update_data($where,$data,'tb_pesanan_les');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Berhasil Di Ganti ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Tutor/Jadwal_Les');
		}
		public function update_jumat(){
			$id_pesanan = $this->input->post('id_pesanan');
			$link_jumat = $this->input->post('link_jumat');
			
			$where = array('id_pesanan' => $id_pesanan);
			$data = array('link_jumat' => $link_jumat);

			$this->AkunSiswa_Model->update_data($where,$data,'tb_pesanan_les');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Berhasil Di Ganti ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Tutor/Jadwal_Les');
		}
		public function update_sabtu(){
			$id_pesanan = $this->input->post('id_pesanan');
			$link_sabtu = $this->input->post('link_sabtu');
			
			$where = array('id_pesanan' => $id_pesanan);
			$data = array('link_sabtu' => $link_sabtu);

			$this->AkunSiswa_Model->update_data($where,$data,'tb_pesanan_les');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Berhasil Di Ganti ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Tutor/Jadwal_Les');
		}
	}

?>