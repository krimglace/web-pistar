<?php

	class Kelola_Pengguna extends CI_Controller
	{

		public function index()
		{
			$this->load->view('AdminView/header');
			$this->load->view('AdminView/sidebar');
			$this->load->view('AdminView/kelolapengguna');
			$this->load->view('AdminView/footer');
		}
		// Function Admin

			public function Admin()
			{
				$data['admin'] = $this->Admin_Model->tampilData('tb_admin')->result();

				$this->load->view('AdminView/header');
				$this->load->view('AdminView/sidebar');
				$this->load->view('AdminView/kelolaadmin', $data);
				$this->load->view('AdminView/footer');	
			}

			public function TambahAdmin()
			{
				$email = $this->input->post('email_admin');
				$password =$this->input->post('password_admin');
				echo $password;

				$data = array(
					'email_admin' => $email,
					'password_admin' => md5($password)
				);

				$this->Admin_Model->tambahAdmin($data,'tb_admin');
				$this->session->set_flashdata('pesan','
					<div class="mt-2 alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-square mr-2"></i> 
						Data Admin Berhasil Di Tambahkan ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				redirect('Administrator/Kelola_Pengguna/Admin');

			}

			public function HapusAdmin($id)
			{
				$where = array('id' => $id);

				$this->Admin_Model->deleteAdmin($where, 'tb_admin');

				$this->session->set_flashdata('pesan','
					<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert">
						<i class="fa fa-trash mr-2"></i> 
						Admin Berhasil Dihapus ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				redirect('Administrator/Kelola_Pengguna/Admin');
			}

		// End Function Admin

		// Function Teacher

			public function Guru()
			{
				$data['guru'] = $this->Admin_Model->tampilData('tb_tutor')->result();

				$this->load->view('AdminView/header');
				$this->load->view('AdminView/sidebar');
				$this->load->view('AdminView/kelolaguru', $data);
				$this->load->view('AdminView/footer');	
			}

			public function SetujuiTutor($id)
			{
				$jawaban = 'Ya';

				$data = array( 'setujui_tutor' => $jawaban );

				$where = array('id_tutor' => $id);

				$this->Admin_Model->setujuiTutor($where, $data,'tb_tutor');

				$this->session->set_flashdata('pesan','
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-square mr-2"></i> 
						Guru DiSetujui ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				redirect('Administrator/Kelola_Pengguna/Guru');				
			}

			public function TidakSetujuiTutor($id)
			{
				$where = array('id_tutor' => $id);

				$this->Admin_Model->deleteAdmin($where, 'tb_tutor');

				$this->session->set_flashdata('pesan','
					<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert">
						<i class="fa fa-trash mr-2"></i> 
						Guru Tidak Disetujui ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				redirect('Administrator/Kelola_Pengguna/Guru');
			}

			public function HapusGuru($id)
			{
				$where = array('id_tutor' => $id);

				$this->Admin_Model->deleteAdmin($where, 'tb_tutor');

				$this->session->set_flashdata('pesan','
					<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert">
						<i class="fa fa-trash mr-2"></i> 
						Guru Berhasil Dihapus ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				redirect('Administrator/Kelola_Pengguna/Guru');
			}

			public function Kelola_Kinerja($id){
				$id_tutor = $id;
				$where = array('id_tutor' => $id_tutor);
				$data['guru'] = $this->Admin_Model->GetData($where, 'tb_tutor')->result();

				$this->load->view('AdminView/header');
				$this->load->view('AdminView/sidebar');
				$this->load->view('AdminView/kelolakinerjaguru', $data);
				$this->load->view('AdminView/footer');
			}
			public function ResetPasswordGuru($id)
			{
			    $password = 123456;

				$data = array( 'password_tutor' => md5($password) );

				$where = array('id_tutor' => $id);

				$this->Admin_Model->setujuiTutor($where, $data,'tb_tutor');

				$this->session->set_flashdata('pesan','
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-square mr-2"></i> 
						Password tutor telah direset dengan password "123456" ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				redirect('Administrator/Kelola_Pengguna/Guru');
			}

		// End Function Tutor

		// Function Siswa

			public function Siswa()
			{
				$data['siswa'] = $this->Admin_Model->tampilData('tb_siswawali_user')->result();

				$this->load->view('AdminView/header');
				$this->load->view('AdminView/sidebar');
				$this->load->view('AdminView/kelolasiswa', $data);
				$this->load->view('AdminView/footer');	
			}

			public function HapusSiswa($id)
			{
				$where = array('id_siswawali' => $id);

				$this->Admin_Model->deleteAdmin($where, 'tb_siswawali_user');

				$this->session->set_flashdata('pesan','
					<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert">
						<i class="fa fa-trash mr-2"></i> 
						Siswa Berhasil Dihapus ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				redirect('Administrator/Kelola_Pengguna/Siswa');
			}
			public function ResetPasswordSiswa($id)
			{
			    $password = 123456;

				$data = array( 'password_user' => md5($password) );

				$where = array('id_siswawali' => $id);

				$this->Admin_Model->setujuiTutor($where, $data,'tb_siswawali_user');

				$this->session->set_flashdata('pesan','
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-square mr-2"></i> 
						Password user telah direset dengan password "123456" ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				redirect('Administrator/Kelola_Pengguna/Siswa');
			}

		// End Function Siswa

	}

?>