<?php

	class Testimoni extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$id = $this->session->userdata('id');
				$where = array( 'id' => $id );

				$data['admin'] = $this->Admin_Model->GetAdmin($where, 'tb_admin')->result();
				$data['testimoni_siswa'] = $this->Admin_Model->tampilData('tb_testimoni_siswa')->result();
				$data['testimoni_guru'] = $this->Admin_Model->tampilData('tb_testimoni_tutor')->result();

				$this->load->view('AdminView/header');
				$this->load->view('AdminView/sidebar', $data);
				$this->load->view('AdminView/testi', $data);
				$this->load->view('AdminView/footer');
			} else{
				redirect('home');
			}
		}
		public function SelectTestimoni()
		{
			$testi = $this->input->post('testimoni');
			if( $testi == 'siswa' ){

				$id = $this->session->userdata('id');
				$where = array( 'id' => $id );
				$data['admin'] = $this->Admin_Model->GetAdmin($where, 'tb_admin')->result();
				$data['testimoni_siswa'] = $this->Admin_Model->tampilData('tb_testimoni_siswa')->result();

				$this->load->view('AdminView/header');
				$this->load->view('AdminView/sidebar', $data);
				$this->load->view('AdminView/testi_siswa', $data);
				$this->load->view('AdminView/footer');

			} elseif( $testi == 'guru' ){
				$id = $this->session->userdata('id');
				$where = array( 'id' => $id );

				$data['admin'] = $this->Admin_Model->GetAdmin($where, 'tb_admin')->result();
				$data['testimoni_guru'] = $this->Admin_Model->tampilData('tb_testimoni_tutor')->result();

				$this->load->view('AdminView/header');
				$this->load->view('AdminView/sidebar', $data);
				$this->load->view('AdminView/testi_guru', $data);
				$this->load->view('AdminView/footer');

			}else{
				redirect('Administrator/Testimoni');
			}
		}
		public function HapusSiswa($id){
			$where = array('id_testimoni' => $id);

			$this->Admin_Model->deleteAdmin($where, 'tb_testimoni_siswa');

			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-trash mr-2"></i> 
					Testimoni Berhasil Di Hapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Testimoni');
		}
		public function HapusTutor($id){
			$where = array('id_testimoni' => $id);

			$this->Admin_Model->deleteAdmin($where, 'tb_testimoni_tutor');

			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-trash mr-2"></i> 
					Testimoni Berhasil Di Hapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Testimoni');
		}

	}

?>