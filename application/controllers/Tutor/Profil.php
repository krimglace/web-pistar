<?php

	class Profil extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$idtutor = $this->session->userdata('id_tutor');
				$where = array( 'id_tutor' => $idtutor );

				$data['pengajar'] = $this->Pengajar_Model->tampilData($where, 'tb_tutor')->result();
				$this->load->view('TutorView/header');
				$this->load->view('TutorView/sidebar', $data);
				$this->load->view('TutorView/profil', $data);
				$this->load->view('TutorView/footer');
			} else{
				redirect('home');
			}
		}

		public function Ganti_FotoProfil()
		{
			$id = $this->input->post('id_tutor');
			
			$config['upload_path']		= "assets/mystyle/img/tutor";
        	$config['allowed_types']	= 'jpg|jpeg|png|svg';

        	$this->load->library('Upload');
			$this->upload->initialize($config);
			if( ! $this->upload->do_upload('gambar_guru'))
			{
				$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-window-close mr-2"></i> 
					'.$this->upload->display_errors('', '').'
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Tutor/Profil');
			} else {
				$file = $this->upload->data();
				$logo = $file['file_name'];

				$data = array( 'gambar_guru' =>$logo );
				$where = array( 'id_tutor' => $id );
			 
				$this->AkunSiswa_Model->update_data($where,$data,'tb_tutor');
				$this->session->set_flashdata('pesan','
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-square mr-2"></i> 
						Poto Profil Berhasil Di Ganti ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				redirect('Tutor/Profil');
			}
		}
		public function Ganti_Profil()
		{
			$id = $this->input->post('id_tutor');
			$nama_lengkap_tutor = $this->input->post('nama_lengkap_tutor');
			$nama_panggilan_tutor = $this->input->post('nama_panggilan_tutor');
			$email	= $this->input->post('email_tutor');
			$wa = $this->input->post('no_whatsapp_tutor');
			$univ = $this->input->post('universitas_tutor');
			$jur = $this->input->post('jurusan_tutor');
			$prov = $this->input->post('provinsi');
			$kab = $this->input->post('kabupaten_kota');
			$mapel = $this->input->post('matapelajaran_tempuh');
			$quotes = $this->input->post('quotes_tutor');

			$data = array(
				'nama_lengkap_tutor' => $nama_lengkap_tutor,
				'nama_panggilan_tutor' => $nama_panggilan_tutor,
				'email_tutor' => $email,
				'jurusan_tutor' => $jur,
				'universitas_tutor' => $univ,
				'provinsi' => $prov,
				'kabupaten_kota' => $kab,
				'matapelajaran_tempuh' => $mapel,
				'quotes_tutor' => $quotes,
				'no_whatsapp_tutor' => $wa
			);
		 
			$where = array(
				'id_tutor' => $id
			);
		 
			$this->AkunSiswa_Model->update_data($where,$data,'tb_tutor');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Profil Berhasil Di Update ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Tutor/Profil');
		}
		public function Ganti_Password()
		{
			$id = $this->input->post('id_tutor');
			$password_lama = $this->input->post('last_pass');
			$password_baru = $this->input->post('new_pass');

			$where = array(
				'id_tutor' => $id
			);
			$getdata = $this->AkunSiswa_Model->tampilData($where, 'tb_tutor')->result();
			foreach( $getdata as $get ){
				if( $get->password_tutor != md5($password_lama) ){
					$this->session->set_flashdata('pesan','
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<i class="fa fa-window-close mr-2"></i> 
						Password Lama Anda Salah ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
					redirect('Tutor/Profil');
				} else{
					if( $password_lama == $password_baru ){
						$this->session->set_flashdata('pesan','
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<i class="fa fa-window-close mr-2"></i> 
							Password Anda Sudah Pernah Digunakan ! 
							<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
						redirect('Tutor/Profil');
					} else{
						$data = array( 'password_tutor' => md5($password_baru) );
						$this->AkunSiswa_Model->update_data($where,$data,'tb_tutor');
						$this->session->set_flashdata('pesan','
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<i class="fa fa-check-square mr-2"></i> 
								Password Berhasil Di Update ! 
								<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
									<span aria-hidden="true">&times;</span>
								</button>
							</div>');
						redirect('Tutor/Profil');
					}
				}
			}
		}
	}

?>