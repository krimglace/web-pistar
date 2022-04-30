<?php

	class Biayales extends CI_Controller{

		public function index()
		{
			$namaprogram = $this->ProgramLes_Model->namaprogram()->result();
			$data = array(
				'programname' => $namaprogram
			);
			$data['tentang'] = $this->Utama_Model->tampilData('tb_tentang_pistar')->result();

			$this->load->view('header', $data);
			$this->load->view('biayales', $data);
			$this->load->view('footer', $data);
		}

		public function Filter()
		{
			$namaprogram = $this->ProgramLes_Model->namaprogram()->result();
			$data = array(
				'programname' => $namaprogram
			);
			$data['tentang'] = $this->Utama_Model->tampilData('tb_tentang_pistar')->result();

			$nama = $this->input->post('namaprogram');
			$jumlah = $this->input->post('jumlah');
			$sistem = $this->input->post('sistempembelajaran');

			if( $nama == '00' ){
				echo '<script>
					alert("Tidak Ada Nama Program Yang Anda Pilih");
					window.location.href = "'.base_url('BiayaLes').'";
				</script>';
			} else {
				if($nama == 'TK' || $nama == 'SD' || $nama == 'SMP'){
					if( $nama =='TK' ){
						$where = array(
							'nama_program' => $nama,
							'sistem_pembelajaran' => $sistem
						);
						$ini = $this->ProgramLes_Model->filterdata($where, 'tb_filterbiayales')->result(); 
						foreach( $ini as $program ){
							$data['hargareg'] = (int)$program->harga_regullar;
							$data['diskonreg'] = (int)$program->diskon_regullar;
							$data['hargasup'] = (int)$program->harga_super;
							$data['diskonsup'] = (int)$program->diskon_super;
							$data['hargain'] = (int)$program->harga_intensif;
							$data['diskonin'] = (int)$program->diskon_intensif;
							$data['hargasupin'] = (int)$program->harga_superintensif;
							$data['diskonsupin'] = (int)$program->diskon_superintensif;
							$data['jumlah'] = (int)$jumlah;

							$this->load->view('header', $data);
							$this->load->view('biayalesfilter', $data);
							$this->load->view('footer', $data);
						} 
					} elseif( $nama =='SD' ){
						$kelassd = $this->input->post('kelassd');

						$where = array(
							'nama_program' => $nama,
							'sistem_pembelajaran' => $sistem,
							'kelas' => $kelassd
						);
						$ini = $this->ProgramLes_Model->filterdata($where, 'tb_filterbiayales')->result(); 
						foreach( $ini as $program ){
							$data['hargareg'] = (int)$program->harga_regullar;
							$data['diskonreg'] = (int)$program->diskon_regullar;
							$data['hargasup'] = (int)$program->harga_super;
							$data['diskonsup'] = (int)$program->diskon_super;
							$data['hargain'] = (int)$program->harga_intensif;
							$data['diskonin'] = (int)$program->diskon_intensif;
							$data['hargasupin'] = (int)$program->harga_superintensif;
							$data['diskonsupin'] = (int)$program->diskon_superintensif;
							$data['jumlah'] = (int)$jumlah;

							$this->load->view('header', $data);
							$this->load->view('biayalesfilter', $data);
							$this->load->view('footer', $data);
						} 
					} elseif( $nama =='SMP' ){
						$kelassmp = $this->input->post('kelassmp');

						$where = array(
							'nama_program' => $nama,
							'sistem_pembelajaran' => $sistem,
							'kelas' => $kelassmp
						);
						$ini = $this->ProgramLes_Model->filterdata($where, 'tb_filterbiayales')->result(); 
						foreach( $ini as $program ){
							$data['hargareg'] = (int)$program->harga_regullar;
							$data['diskonreg'] = (int)$program->diskon_regullar;
							$data['hargasup'] = (int)$program->harga_super;
							$data['diskonsup'] = (int)$program->diskon_super;
							$data['hargain'] = (int)$program->harga_intensif;
							$data['diskonin'] = (int)$program->diskon_intensif;
							$data['hargasupin'] = (int)$program->harga_superintensif;
							$data['diskonsupin'] = (int)$program->diskon_superintensif;
							$data['jumlah'] = (int)$jumlah;

							$this->load->view('header', $data);
							$this->load->view('biayalesfilter', $data);
							$this->load->view('footer', $data);
						} 
					}
				}
			}
		}
	}


?>