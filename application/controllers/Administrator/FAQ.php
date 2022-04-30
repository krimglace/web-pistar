<?php

	class FAQ extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$id = $this->session->userdata('id');
				$where = array( 'id' => $id );

				$data['admin'] = $this->Admin_Model->GetAdmin($where, 'tb_admin')->result();
				$data['faq'] = $this->Faq_Model->tampilData('tb_faq')->result();

				$this->load->view('AdminView/header');
				$this->load->view('AdminView/sidebar');
				$this->load->view('AdminView/faq', $data);
				$this->load->view('AdminView/footer');
			} else{
				redirect('home');
			}
		}
        public function TambahFAQ()
        {
            $pertanyaan = $this->input->post('pertanyaan');
			$jawaban =$this->input->post('jawaban');

			$data = array(
				'pertanyaan' => $pertanyaan,
				'jawaban' => $jawaban
			);

			$this->Admin_Model->tambahAdmin($data,'tb_faq');
			$this->session->set_flashdata('pesan','
				<div class="mt-2 alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data FAQ Berhasil Di Tambahkan ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/FAQ');
        }
		public function EditJawaban($id)
		{
			$jawaban = $this->input->post('jawaban');

			$data = array( 'jawaban' => $jawaban );

			$where = array('id_faq' => $id);

			$this->Faq_Model->UpdateJawaban($where, $data,'tb_faq');

			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Jawaban Berhasil Di Update ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/FAQ');
		}

		public function HapusJawaban($id)
		{
			$where = array('id_faq' => $id);

			$this->Faq_Model->DeleteJawaban($where, 'tb_faq');

			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-trash mr-2"></i> 
					Pertanyaan Berhasil Di Hapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/FAQ');
		}

	}

?>