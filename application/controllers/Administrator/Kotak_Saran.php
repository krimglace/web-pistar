<?php

	class Kotak_Saran extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$id = $this->session->userdata('id');
				$where = array( 'id' => $id );

				$data['admin'] = $this->Admin_Model->GetAdmin($where, 'tb_admin')->result();
				$data['kotaksaran'] = $this->Admin_Model->tampilData('tb_kotaksaran')->result();

				$this->load->view('AdminView/header');
				$this->load->view('AdminView/sidebar', $data);
				$this->load->view('AdminView/kotaksaran', $data);
				$this->load->view('AdminView/footer');
			} else{
				redirect('home');
			}
		}
		public function Delete($id)
		{
			$id_saran = $id;
		 
			$where = array(
				'id_saran' => $id
			);
		    
		    $this->Admin_Model->deleteAdmin($where, 'tb_kotaksaran');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Referral Berhasil Di Hapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Kotak_Saran');
		}

	}

?>