<?php

	class Packet_Belajar extends CI_Controller{
		public function index()
		{
			$data['paket'] = $this->PaketBelajar_Model->tampilData('tb_namaprogramles')->result();

			$this->load->view('AdminView/header');
			$this->load->view('AdminView/sidebar');
			$this->load->view('AdminView/packetbelajar', $data);
			$this->load->view('AdminView/footer');
		}
		public function Filter()
		{

			$namaprogram = $this->ProgramLes_Model->namaprogram()->result();
			$data = array(
				'programname' => $namaprogram
			);
			$data['tentang'] = $this->Utama_Model->tampilData('tb_tentang_pistar')->result();

			$nama = $this->input->post('namaprogram');

			if($nama == 'TK' || $nama == 'SD' || $nama == 'SMP'){
				if( $nama =='TK' ){
					$where = array(
						'nama_program' => $nama,
					);
					$data['filter'] = $this->ProgramLes_Model->filterdata($where, 'tb_filterbiayales')->result(); 
					$data['paket'] = $this->PaketBelajar_Model->tampilData('tb_namaprogramles')->result();

					$this->load->view('AdminView/header');
					$this->load->view('AdminView/sidebar');
					$this->load->view('AdminView/packetbelajarfilter', $data);
					$this->load->view('AdminView/footer');
				} elseif( $nama =='SD' ){
					$kelassd = $this->input->post('kelassd');

					$where = array(
						'nama_program' => $nama,
						'kelas' => $kelassd
					);
					$data['filter'] = $this->ProgramLes_Model->filterdata($where, 'tb_filterbiayales')->result();
					$data['paket'] = $this->PaketBelajar_Model->tampilData('tb_namaprogramles')->result();

					$this->load->view('AdminView/header');
					$this->load->view('AdminView/sidebar');
					$this->load->view('AdminView/packetbelajarfilter', $data);
					$this->load->view('AdminView/footer');
				} elseif( $nama =='SMP' ){
					$kelassmp = $this->input->post('kelassmp');

					$where = array(
						'nama_program' => $nama,
						'kelas' => $kelassmp
					);
					$data['filter'] = $this->ProgramLes_Model->filterdata($where, 'tb_filterbiayales')->result();
					$data['paket'] = $this->PaketBelajar_Model->tampilData('tb_namaprogramles')->result();

					$this->load->view('AdminView/header');
					$this->load->view('AdminView/sidebar');
					$this->load->view('AdminView/packetbelajarfilter', $data);
					$this->load->view('AdminView/footer');
				}
			}
		}
		public function Update()
		{
			$id_biaya = $this->input->post('id_biaya');
			$nama_program = $this->input->post('nama_program');
			$sistem_pembelajaran = $this->input->post('sistem_pembelajaran');
			$harga_regullar = $this->input->post('harga_regullar');
			$diskon_regullar = $this->input->post('diskon_regullar');
			$harga_super = $this->input->post('harga_super');
			$diskon_super = $this->input->post('diskon_super');
			$harga_intensif = $this->input->post('harga_intensif');
			$diskon_intensif = $this->input->post('diskon_intensif');
			$harga_superintensif = $this->input->post('harga_superintensif');
			$diskon_superintensif = $this->input->post('diskon_superintensif');

			$data = array(
				'nama_program' => $nama_program,
				'sistem_pembelajaran' => $sistem_pembelajaran,
				'harga_regullar' => $harga_regullar,
				'diskon_regullar' => $diskon_regullar,
				'harga_super' => $harga_super,
				'diskon_super' => $diskon_super,
				'harga_intensif' => $harga_intensif,
				'diskon_intensif' => $diskon_intensif,
				'harga_superintensif' => $harga_superintensif,
				'diskon_superintensif' => $diskon_superintensif
			);
		 
			$where = array(
				'id_biaya' => $id_biaya
			);
		 
			$this->Admin_Model->update_data($where,$data,'tb_filterbiayales');
			
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Berhasil Di Update ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Packet_Belajar');
		}

	}

?>