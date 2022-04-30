<?php

	class Profil extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$idsiswa = $this->session->userdata('id_siswawali');
				$where = array( 'id_siswawali' => $idsiswa );

				$data['siswawali'] = $this->AkunSiswa_Model->tampilData($where, 'tb_siswawali_user')->result();

				$this->load->view('SiswaView/header');
				$this->load->view('SiswaView/sidebar', $data);
				$this->load->view('SiswaView/profil', $data);
				$this->load->view('SiswaView/footer');
			} else{
				redirect('Home');
			}
		}
		public function Ganti_FotoProfil()
		{
			$id = $this->input->post('id_siswawali');
			
			$config['upload_path']		= "assets/mystyle/img/user";
        	$config['allowed_types']	= 'jpg|jpeg|png|svg';

        	$this->load->library('Upload');
			$this->upload->initialize($config);
			if( ! $this->upload->do_upload('pp_siswa'))
			{
				$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-window-close mr-2"></i> 
					'.$this->upload->display_errors('', '').'
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Siswa/Profil');
			} else {
				$file = $this->upload->data();
				$logo = $file['file_name'];

				$data = array( 'pp_siswa' =>$logo );
				$where = array( 'id_siswawali' => $id );
			 
				$this->AkunSiswa_Model->update_data($where,$data,'tb_siswawali_user');
				$this->session->set_flashdata('pesan','
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-square mr-2"></i> 
						Poto Profil Berhasil Di Ganti ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				redirect('Siswa/Profil');
			}
		}
		public function Ganti_Profil()
		{
			$id = $this->input->post('id_siswawali');
			$nama_lengkap_user = $this->input->post('nama_lengkap_user');
			$nama_panggilan_user = $this->input->post('nama_panggilan_user');
			$email	= $this->input->post('email_user');
			$no_whatsapp_user	= $this->input->post('no_whatsapp_user');
			$kelas	= $this->input->post('kelas_user');
			$alamat_user	= $this->input->post('alamat_user');
			

			if( $kelas == 'Belum Sekolah' ){
				$tingkat = 'TK';
			}elseif( $kelas == '1' || $kelas == '2' || $kelas == '3' || $kelas == '4' || $kelas == '5' || $kelas == '6' ){
				$tingkat = 'SD';
			} elseif ( $kelas == '7' || $kelas == '8' || $kelas == '9'){
				$tingkat = 'SMP';
			} else {
				$tingkat = '';
			}

			$data = array(
				'nama_lengkap_user' => $nama_lengkap_user,
				'nama_panggilan_user' => $nama_panggilan_user,
				'email_user' => $email,
				'kelas' => $kelas,
				'no_whatsapp_user' => $no_whatsapp_user,
				'tingkat' => $tingkat,
				'alamat_user' => $alamat_user
			);
		 
			$where = array(
				'id_siswawali' => $id
			);
		 
			$this->AkunSiswa_Model->update_data($where,$data,'tb_siswawali_user');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Profil Berhasil Di Update ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Siswa/Profil');
		}
		public function Ganti_Password()
		{
			$id = $this->input->post('id_siswawali');
			$password_lama = $this->input->post('last_pass');
			$password_baru = $this->input->post('new_pass');

			$where = array(
				'id_siswawali' => $id
			);
			$getdata = $this->AkunSiswa_Model->tampilData($where, 'tb_siswawali_user')->result();
			foreach( $getdata as $get ){
				if( $get->password_user != md5($password_lama) ){
					$this->session->set_flashdata('pesan','
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<i class="fa fa-window-close mr-2"></i> 
						Password Lama Anda Salah ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
					redirect('Siswa/Profil');
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
						redirect('Siswa/Profil');
					} else{
						$data = array( 'password_user' => md5($password_baru) );
						$this->AkunSiswa_Model->update_data($where,$data,'tb_siswawali_user');
						$this->session->set_flashdata('pesan','
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<i class="fa fa-check-square mr-2"></i> 
								Password Berhasil Di Update ! 
								<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
									<span aria-hidden="true">&times;</span>
								</button>
							</div>');
						redirect('Siswa/Profil');
					}
				}
			}
		}
	}
?>