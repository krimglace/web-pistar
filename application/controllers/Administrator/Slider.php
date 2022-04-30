<?php

	class Slider extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$id = $this->session->userdata('id');
				$where = array( 'id' => $id );

				$data['admin'] = $this->Admin_Model->GetAdmin($where, 'tb_admin')->result();
				$data['pistar'] = $this->Admin_Model->tampilData('tb_slider')->result();

				$this->load->view('AdminView/header');
				$this->load->view('AdminView/sidebar', $data);
				$this->load->view('AdminView/slider', $data);
				$this->load->view('AdminView/footer');
			} else{
				redirect('Home');
			}
		}
		public function Tambah()
		{
			
			$config['upload_path']		= "assets/mystyle/img/";
        	$config['allowed_types']	= 'jpg|jpeg|png|svg';

        	$this->load->library('Upload');
			$this->upload->initialize($config);
			if( ! $this->upload->do_upload('gambar_slider'))
			{
				$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-window-close mr-2"></i> 
					'.$this->upload->display_errors('', '').'
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Slider');
			} else {
				$file = $this->upload->data();
				$logo = $file['file_name'];

				$data = array( 'gambar_slider' =>$logo );
			 
				$this->Admin_Model->tambahData($data, 'tb_slider');
				$this->session->set_flashdata('pesan','
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-square mr-2"></i> 
						Slider Berhasil Di Upload ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				redirect('Administrator/Slider');
			}
		}
		public function Edit($id)
		{
			$id_slide = $id;
			
			$config['upload_path']		= "assets/mystyle/img/";
        	$config['allowed_types']	= 'jpg|jpeg|png|svg';

        	$this->load->library('Upload');
			$this->upload->initialize($config);
			if( ! $this->upload->do_upload('gambar_slider'))
			{
				$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-window-close mr-2"></i> 
					'.$this->upload->display_errors('', '').'
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Slider');
			} else {
				$file = $this->upload->data();
				$logo = $file['file_name'];

				$data = array( 'gambar_slider' =>$logo );
				$where = array( 'id_slide' => $id_slide );
			 
				$this->Admin_Model->update_data($where,$data,'tb_slider');
				$this->session->set_flashdata('pesan','
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-square mr-2"></i> 
						Slider Berhasil Di Ganti ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				redirect('Administrator/Slider');
			}
		}
		public function Delete($id)
		{
			$where = array('id_slide' => $id);

			$this->Admin_Model->deleteAdmin($where, 'tb_slider');

			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-trash mr-2"></i> 
					Data Slider Berhasil Di Hapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Slider');
		}
	}
?>