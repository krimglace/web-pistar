<?php

	class Profil extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$id = $this->session->userdata('id');
				$where = array( 'id' => $id );

				$data['admin'] = $this->Admin_Model->GetAdmin($where, 'tb_admin')->result();

				$this->load->view('AdminView/header');
				$this->load->view('AdminView/sidebar', $data);
				$this->load->view('AdminView/profil', $data);
				$this->load->view('AdminView/footer');
			} else{
				redirect('home');
			}
		}
		public function Ganti_FotoProfil()
		{
			$id = $this->input->post('id');
			
			$config['upload_path']		= "assets/mystyle/img/admin";
        	$config['allowed_types']	= 'jpg|jpeg|png|svg';

        	$this->load->library('Upload');
			$this->upload->initialize($config);
			if( ! $this->upload->do_upload('pp_admin'))
			{
				$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-window-close mr-2"></i> 
					'.$this->upload->display_errors('', '').'
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Profil');
			} else {
				$file = $this->upload->data();
				$logo = $file['file_name'];

				$data = array( 'pp_admin' =>$logo );
				$where = array( 'id' => $id );
			 
				$this->Admin_Model->update_data($where,$data,'tb_admin');
				$this->session->set_flashdata('pesan','
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-square mr-2"></i> 
						Poto Profil Berhasil Di Ganti ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				redirect('Administrator/Profil');
			}
		}
		public function Ganti_Profil()
		{
			$id = $this->input->post('id');
			$nama_lengkap_admin = $this->input->post('nama_lengkap_admin');
			$nama_panggilan_admin = $this->input->post('nama_panggilan_admin');
			$email	= $this->input->post('email_admin');

			$data = array(
				'nama_lengkap_admin' => $nama_lengkap_admin,
				'nama_panggilan_admin' => $nama_panggilan_admin,
				'email_admin' => $email
			);
		 
			$where = array(
				'id' => $id
			);
		 
			$this->Admin_Model->update_data($where,$data,'tb_admin');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Profil Berhasil Di Update ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Profil');
		}
		public function Ganti_Password()
		{
			$id = $this->input->post('id');
			$password_lama = $this->input->post('last_pass');
			$password_baru = $this->input->post('new_pass');

			$where = array(
				'id' => $id
			);
			$getdata = $this->Admin_Model->GetAdmin($where, 'tb_admin')->result();

			foreach( $getdata as $get ){
				if( $get->password_admin != md5($password_lama) ){
					$this->session->set_flashdata('pesan','
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<i class="fa fa-window-close mr-2"></i> 
						Password Lama Anda Salah ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
					redirect('Administrator/Profil');
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
						redirect('Administrator/Profil');
					} else{
						$data = array( 'password_admin' => md5($password_baru) );
						$this->Admin_Model->update_data($where,$data,'tb_admin');
						$this->session->set_flashdata('pesan','
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<i class="fa fa-check-square mr-2"></i> 
								Password Berhasil Di Update ! 
								<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
									<span aria-hidden="true">&times;</span>
								</button>
							</div>');
						redirect('Administrator/Profil');
					}
				}
			}
		}
	}
?>