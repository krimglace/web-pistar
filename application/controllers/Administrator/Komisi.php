<?php

	class Komisi extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$id = $this->session->userdata('id');
				$where = array( 'id' => $id );

				$data['admin'] = $this->Admin_Model->GetAdmin($where, 'tb_admin')->result();
				$data['komisi_tutor'] = $this->Admin_Model->tampilDataKomisi('tb_komisi_tutor')->result();

				$this->load->view('AdminView/header');
				$this->load->view('AdminView/sidebar', $data);
				$this->load->view('AdminView/komisi', $data);
				$this->load->view('AdminView/footer');
			} else{
				redirect('Home');
			}
		}

		public function Tambah_Komisi()
		{
			$nama = $this->input->post('nama_lengkap_tutor');
			$email = $this->input->post('email_tutor');
			$total_komisi = $this->input->post('total_komisi');
			$kategori_komisi = $this->input->post('kategori_komisi');
			$tanggal = date('d-m-Y');

			$where = array(
				'nama_lengkap_tutor' => $nama,
				'email_tutor' => $email
			);

			$query = "SELECT * FROM tb_tutor WHERE nama_lengkap_tutor = '".$nama."' AND email_tutor = '".$email."'";
			$datatutor = $this->db->query($query)->result();
			// echo count($datatutor);
			// var_dump($datatutor);
			if( count($datatutor) == 0 ){
				echo "<script>
					alert('Data Tutor Tidak Ditemukan');
					window.location.href = '".base_url('Administrator/Komisi')."';
				</script>";
			} else{
				foreach( $datatutor as $tutor ) :
					$id = $tutor->id_tutor;
					
					$data = array(
						'id_tutor' => $id,
						'total_komisi' => $total_komisi,
						'tanggal_komisi' => $tanggal,
						'status_komisi' => 'Belum Diklaim',
						'kategori_komisi' => $kategori_komisi
					);

					$this->Admin_Model->tambahData($data, 'tb_komisi_tutor');
					$this->session->set_flashdata('pesan','
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<i class="fa fa-check-square mr-2"></i> 
							Data Komisi Berhasil Di Tambahkan ! 
							<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
					redirect('Administrator/Komisi');
				endforeach;
			}
		}

		public function Ganti_Status($id)
		{
			$data = array('status_pengiriman' => 'Selesai', 'status_komisi' => 'Selesai');
			$where = array('id_komisi' => $id);

			$this->Admin_Model->update_data($where, $data, 'tb_komisi_tutor');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Komisi Berhasil Diganti ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Komisi');
		}
		public function hapuskomisi($id)
		{
			$where = array('id_komisi' => $id);

			$this->Admin_Model->deleteAdmin($where, 'tb_komisi_tutor');

			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-trash mr-2"></i> 
					Data Komisi Berhasil Di Hapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Komisi');
		}

	}

?>