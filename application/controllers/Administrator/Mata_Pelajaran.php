<?php

	class Mata_Pelajaran extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$id = $this->session->userdata('id');
				$where = array( 'id' => $id );

				$data['admin'] = $this->Admin_Model->GetAdmin($where, 'tb_admin')->result();
				$data['mapel'] = $this->Blog_Model->tampilData('tb_mapel')->result();

				$this->load->view('AdminView/header');
				$this->load->view('AdminView/sidebar');
				$this->load->view('AdminView/mapel', $data);
				$this->load->view('AdminView/footer');
			} else{
				redirect('home');
			}
		}
		public function Filter()
		{
			$tingkatan = $this->input->post('namaprogram');
			$where = array('tingkatan' => $tingkatan);
			$data['mapel'] = $this->ProgramLes_Model->filterdata($where, 'tb_mapel')->result();

			$this->load->view('AdminView/header');
			$this->load->view('AdminView/sidebar');
			$this->load->view('AdminView/mapelfilter', $data);
			$this->load->view('AdminView/footer');
		}
		public function TambahPelajaran()
		{
			$tingkatan = $this->input->post('tingkatan');
			$mapel = $this->input->post('mapel');

			$data = array('tingkatan' => $tingkatan, 'nama_mapel' => $mapel);
			$this->Blog_Model->tambahKategori($data,'tb_mapel');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Mata Pelajaran Berhasil Di Tambahkan ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Mata_Pelajaran');
		}
		public function hapusPelajaran($id)
		{
			$where = array('id_mapel' => $id);

			$this->Admin_Model->deleteAdmin($where, 'tb_mapel');

			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-trash mr-2"></i> 
					Mata Pelajaran Berhasil Di Hapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Mata_Pelajaran');
		}

	}

?>