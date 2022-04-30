<?php

	class Tentang_Pistar extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$id = $this->session->userdata('id');
				$where = array( 'id' => $id );

				$data['admin'] = $this->Admin_Model->GetAdmin($where, 'tb_admin')->result();
				$data['rekening'] = $this->Tentang_Pistar_Model->tampilData('tb_rekeningpistar')->result();
				$data['tentang'] = $this->Tentang_Pistar_Model->tampilData('tb_tentang_pistar')->result();

			$this->load->view('AdminView/header');
			$this->load->view('AdminView/sidebar');
			$this->load->view('AdminView/tentangpistar', $data);
			$this->load->view('AdminView/footer');
			} else{
				redirect('home');
			}
		}
		public function ganti_tentang()
		{
			$id = $this->input->post('id_tentang');
			$alamat = $this->input->post('alamat_pistar');
			$pt = $this->input->post('nama_pt');
			$email	= $this->input->post('email_pistar');
			$telepon	= $this->input->post('no_telepon_pistar');
			$whatsapp	= $this->input->post('whatsapp_admin_pistar');
			$linkedin	= $this->input->post('facebook_pistar');
			$instagram	= $this->input->post('instagram_pistar');
			$youtube	= $this->input->post('youtube_pistar');
			$tiktok	= $this->input->post('tiktok_pistar');
			$tentangPistar	= $this->input->post('tentang_pistar');
			$data = array(
				'alamat_pistar' => $alamat,
				'no_telepon_pistar' => $telepon,
				'email_pistar' => $email,
				'whatsapp_admin_pistar' => $whatsapp,
				'instagram_pistar' => $instagram,
				'facebook_pistar' => $linkedin,
				'youtube_pistar' => $youtube,
				'tiktok_pistar' => $tiktok_pistar,
				'tentang_pistar' => $tentangPistar,
				'nama_pt' => $pt
			);
		 
			$where = array(
				'id_tentang' => $id
			);
		 
			$this->Tentang_Pistar_Model->update_data($where,$data,'tb_tentang_pistar');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Keterangan Berhasil Di Update ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Tentang_Pistar');
		}
		public function ganti_logo()
		{
			$id = $this->input->post('id_tentang');
			
			$config['upload_path']		= "assets/mystyle/img";
        	$config['allowed_types']	= 'jpg|jpeg|png|svg';

			$this->load->library('Upload');
			$this->upload->initialize($config);
			if( ! $this->upload->do_upload('logo_pistar'))
			{
				$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-window-close mr-2"></i> 
					'.$this->upload->display_errors('', '').'
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Tentang_Pistar');
			} else {
				$file = $this->upload->data();
				$logo = $file['file_name'];

				$data = array( 'logo_pistar' =>$logo );
				$where = array( 'id_tentang' => $id );
			 
				$this->Tentang_Pistar_Model->update_data($where,$data,'tb_tentang_pistar');
				$this->session->set_flashdata('pesan','
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-square mr-2"></i> 
						Logo Berhasil Di Ganti ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				redirect('Administrator/Tentang_Pistar');
			}
		}
		public function ganti_bank()
		{
			$id_rekening = $this->input->post('id_rekening');
			$atas_nama = $this->input->post('atas_nama');
			$jenis_bank = $this->input->post('jenis_bank');
			$nomor_rekening	= $this->input->post('nomor_rekening');
			
			$data = array(
				'atas_nama' => $atas_nama,
				'jenis_bank' => $jenis_bank,
				'nomor_rekening' => $nomor_rekening
			);
		 
			$where = array(
				'id_rekening' => $id_rekening
			);
		 
			$this->Tentang_Pistar_Model->update_data($where,$data,'tb_rekeningpistar');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Rekening Berhasil Di Update ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Tentang_Pistar');
		}
		public function tambah_bank()
		{
			$atas_nama = $this->input->post('atas_nama');
			$jenis_bank = $this->input->post('jenis_bank');
			$nomor_rekening	= $this->input->post('nomor_rekening');
			
			$data = array(
				'atas_nama' => $atas_nama,
				'jenis_bank' => $jenis_bank,
				'nomor_rekening' => $nomor_rekening
			);
		 
			$this->Admin_Model->tambahData($data,'tb_rekeningpistar');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Rekening Berhasil Di Update ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Tentang_Pistar');
		}
		public function hapus_bank(){
			$id = $this->input->get('id_rekening');

			$where = array('id_rekening' => $id);

			$this->Admin_Model->deleteAdmin($where,'tb_rekeningpistar');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Rekening Berhasil Di Hapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Tentang_Pistar');

		}
	}

?>