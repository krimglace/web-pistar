<?php

	class SdanK extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$id = $this->session->userdata('id');
				$where = array( 'id' => $id );

				$data['admin'] = $this->Admin_Model->GetAdmin($where, 'tb_admin')->result();
				$data['sk'] = $this->Admin_Model->tampilData('tb_syarat_ketentuan')->result();

				$this->load->view('AdminView/header');
				$this->load->view('AdminView/sidebar', $data);
				$this->load->view('AdminView/s&k', $data);
				$this->load->view('AdminView/footer');
			} else{
				redirect('home');
			}
		}
		public function update($id)
		{
			$id_syarat = $id;
			$isi = $this->input->post('sk');

			$where = array('id_syarat' => $id_syarat);
			$data = array('isi_syarat_ketentuan' => $isi);

			$this->Admin_Model->update_data($where, $data, 'tb_syarat_ketentuan');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Komisi Berhasil Diganti ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/SdanK');
		}

	}

?>