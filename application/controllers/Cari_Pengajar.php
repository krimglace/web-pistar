<?php

	class Cari_Pengajar extends CI_Controller{

		public function index()
		{
			$data['tentang'] = $this->Utama_Model->tampilData('tb_tentang_pistar')->result();

			$where = array('setujui_tutor' => 'ya');
			$data['pengajar'] = $this->Pengajar_Model->tampilDataDESC($where, 'tb_tutor', 'DESC')->result();

			$this->load->view('header', $data);
			$this->load->view('caripengajar', $data);
			$this->load->view('footer', $data);
		}
		public function Filter()
		{
			$mapel = $this->input->post('mata_pelajaran');
			$kab = $this->input->post('kabupaten');
			$data['tentang'] = $this->Utama_Model->tampilData('tb_tentang_pistar')->result();

			if( $mapel == '' ){
				if( $kab == '' ){
					echo '<script>
							alert("Masukkan Kata Kunci Terlebih Dahulu");
							window.location.href = "'.base_url('Cari_Pengajar').'";
						</script>';
				} else{
					$where = array('setujui_tutor' => 'ya', 'kabupaten_kota' => $kab);
					
					$data['pengajar'] = $this->Pengajar_Model->tampilDataDESC($where, 'tb_tutor', 'DESC')->result();
					$count = $this->Pengajar_Model->tampilDataCount($where, 'tb_tutor');

					if( $count == 0 || $count == NULL ){
						echo '<script>
							alert("Pengajar di Kabupaten Anda Tidak Tersedia");
							window.location.href = "'.base_url('Cari_Pengajar').'";
						</script>';
					} else{
						$this->load->view('header', $data);
						$this->load->view('caripengajarfilter', $data);
						$this->load->view('footer', $data);
					}
				}
			} else {
				if( $kab == '' ){
					$where = array('setujui_tutor' => 'ya', 'matapelajaran_tempuh' => $mapel);
					$data['pengajar'] = $this->Pengajar_Model->tampilDataDESC($where, 'tb_tutor', 'DESC')->result();
					
					$count = $this->Pengajar_Model->tampilDataCount($where, 'tb_tutor');

					if( $count == 0 || $count == NULL ){
						echo '<script>
							alert("Pengajar Mata Pelajaran yang Anda Cari Tidak Tersedia");
							window.location.href = "'.base_url('Cari_Pengajar').'";
						</script>';
					} else{
						$this->load->view('header', $data);
						$this->load->view('caripengajarfilter', $data);
						$this->load->view('footer', $data);
					}
				} else {
					$where = array('setujui_tutor' => 'ya', 'kabupaten_kota' => $kab, 'matapelajaran_tempuh' => $mapel);
					$data['pengajar'] = $this->Pengajar_Model->tampilDataDESC($where, 'tb_tutor', 'DESC')->result();
					$count = $this->Pengajar_Model->tampilDataCount($where, 'tb_tutor');

					if( $count == 0 || $count == NULL ){
						echo '<script>
							alert("Pengajar yang Anda Cari Tidak Tersedia");
							window.location.href = "'.base_url('Cari_Pengajar').'";
						</script>';
					} else{
						$this->load->view('header', $data);
						$this->load->view('caripengajarfilter', $data);
						$this->load->view('footer', $data);
					}
				}
			}
		}
		public function tutor($id)
		{
			$data['tentang'] = $this->Utama_Model->tampilData('tb_tentang_pistar')->result();

			// $data['pengajar'] = $this->Pengajar_Model->tampilDataDESC($where, 'tb_tutor', 'DESC')->result();
			$where = array( 'id_tutor' => $id );

			$data['pengajar'] = $this->Pengajar_Model->tampilData($where, 'tb_tutor')->result();

			$this->load->view('header', $data);
			$this->load->view('datacaripengajar', $data);
			$this->load->view('footer', $data);
		}
	}

?>