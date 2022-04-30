<?php

	class Pemesanan extends CI_Controller{
		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$id = $this->session->userdata('id');
				$where = array( 'id' => $id );
				$data['admin'] = $this->Admin_Model->GetAdmin($where, 'tb_admin')->result();
				$querypemesanan = "SELECT * FROM tb_pesanan_les ORDER BY id_pesanan DESC";

				$data['pemesanan'] = $this->db->query($querypemesanan)->result();

				$this->load->view('AdminView/header');
				$this->load->view('AdminView/sidebar', $data);
				$this->load->view('AdminView/pemesanan', $data);
				$this->load->view('AdminView/footer');
			} else{
				redirect('home');
			}
		}
		public function PilihTutor($id){
			$id_pesanan = $id;
			$namatutor = $this->input->post('tutor');

			$wheretutor = array('nama_lengkap_tutor' => $namatutor);
			$tutor = $this->Admin_Model->GetData($wheretutor, 'tb_tutor')->result();

			foreach ($tutor as $guru ) {
				$id_tutor = $guru->id_tutor;
				$data = array('id_tutor' => $id_tutor);
				$where = array('id_pesanan' => $id_pesanan);

				$this->Admin_Model->update_data($where, $data, 'tb_pesanan_les');
				$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Berhasil Di Update ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
				redirect('Administrator/Pemesanan');
			}
		}
		public function SuccessReferral($id){
			$id_pesanan = $id;

			$diskon = $this->input->post('diskon');
			$kode = $this->input->post('kode_referral');
			$total_bayar = $this->input->post('total_bayar');
			$tanggal = date('d-m-Y');
            $bayar = (int)$total_bayar.'000';
            
			$harga_sekarang = ($diskon/100) * (int)$bayar;
			$where = array('id_pesanan' => $id_pesanan);
			$data = array('kode_referral' => 'Success', 'total_bayar' => $harga_sekarang);
            
            $where2 = array('kode_referral' => $kode);
            $tutor = $this->Admin_Model->GetData($where2, 'tb_tutor')->result();
            foreach( $tutor as $ttr ) {
            $data2 = array(
					'id_tutor' => $ttr->id_tutor,
					'total_komisi' => ((int)$bayar * 0.05),
					'tanggal_komisi' => $tanggal,
					'status_komisi' => 'Belum Diklaim',
					'kategori_komisi' => 'Bonus Referral'
				);
				
				$this->Admin_Model->tambahData($data2, 'tb_komisi_tutor');
            }
            
			$this->Admin_Model->update_data($where, $data, 'tb_pesanan_les');
				$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Berhasil Di Update ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Pemesanan');
		}
		public function FailedReferral($id){
			$id_pesanan = $id;

			$where = array('id_pesanan' => $id_pesanan);
			$data = array('kode_referral' => 'No Data');

			$this->Admin_Model->update_data($where, $data, 'tb_pesanan_les');
				$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Berhasil Di Update ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Pemesanan');
		}
		public function Payment($id){
			$id_pesanan = $id;

			$where = array('id_pesanan' => $id_pesanan);
			$data = array('status' => 'On Process');

			$this->Admin_Model->update_data($where, $data, 'tb_pesanan_les');
				$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Berhasil Di Update ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Pemesanan');
		}

		public function OnPayment($id){
			$id_pesanan = $id;

			$where = array('id_pesanan' => $id_pesanan);
			$data = array('status' => 'Success');

			$this->Admin_Model->update_data($where, $data, 'tb_pesanan_les');
				$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Berhasil Di Update ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Pemesanan');
		}
		public function SudahBayar($id){
		    $id_pesanan = $id;

			$where = array('id_pesanan' => $id_pesanan);
			$data = array('status' => 'Success');

			$this->Admin_Model->update_data($where, $data, 'tb_pesanan_les');
				$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Berhasil Di Update ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Pemesanan');
		}
		public function hapusPesanan($id)
		{
			$where = array('id_pesanan' => $id);

			$this->Admin_Model->deleteAdmin($where, 'tb_pesanan_les');

			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-trash mr-2"></i> 
					Data Pesanan Berhasil Di Hapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/pemesanan');
		}

	}

?>