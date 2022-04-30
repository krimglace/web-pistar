<?php

	class Tutorial extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$id = $this->session->userdata('id');
				$where = array( 'id' => $id );

				$data['admin'] = $this->Admin_Model->GetAdmin($where, 'tb_admin')->result();
				$data['tutorial'] = $this->Admin_Model->tampilData('tb_tutorial')->result();

				$this->load->view('AdminView/header');
				$this->load->view('AdminView/sidebar', $data);
				$this->load->view('AdminView/tutorial', $data);
				$this->load->view('AdminView/footer');
			} else{
				redirect('home');
			}
		}
		public function TambahTutorial()
        {
            $jenis_tutorial = $this->input->post('jenis_tutorial');
			$isi_tutorial =$this->input->post('isi_tutorial');

			$data = array(
				'jenis_tutorial' => $jenis_tutorial,
				'isi_tutorial' => $isi_tutorial
			);

			$this->Admin_Model->tambahAdmin($data,'tb_tutorial');
			$this->session->set_flashdata('pesan','
				<div class="mt-2 alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Tutorial Berhasil Di Tambahkan ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Tutorial');
        }
        public function EditTutorial($id)
		{
			$isi_tutorial = $this->input->post('isi_tutorial');

			$data = array( 'isi_tutorial' => $isi_tutorial );

			$where = array('id_tutorial' => $id);

			$this->Faq_Model->UpdateJawaban($where, $data,'tb_tutorial');

			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Tutorial Berhasil Di Update ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Tutorial');
		}
		public function HapusTutorial($id)
		{
			$where = array('id_tutorial' => $id);

			$this->Faq_Model->DeleteJawaban($where, 'tb_tutorial');

			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-trash mr-2"></i> 
					Tutorial Berhasil Di Hapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Tutorial');
		}

	}

?>