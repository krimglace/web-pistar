<?php

	class Register extends CI_Controller{

		public function proses_register()
		{
			$count = count($this->Register_Model->cekdatasiswa()->result());
			$query = $this->Register_Model->cekdatasiswa()->result();

			$count2 = count($this->Register_Model->cekdatatutor()->result());
			$query2 = $this->Register_Model->cekdatatutor()->result();

			if($count <> 0){
            	foreach( $query as $que ){
            		$kode = intval($que->id_siswa) + 1; 
            	}
        	} else{      
	            $kode = 1;  
	        }
	        if($count2 <> 0){
            	foreach( $query2 as $que2 ){
            		$kode2 = intval($que2->id_tutor) + 1; 
            	}
        	} else{      
	            $kode2 = 1;  
	        }

	        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
	        $batas2 = str_pad($kode2, 3, "0", STR_PAD_LEFT);
			$kodetampil = "PTR".$batas;
			$kodetutor = "PST".$batas2;

			$idsiswa = $kodetampil;
			$idtutor = $kodetutor;
			$namalengkap = $this->input->post('fullname');
			$namapanggilan = $this->input->post('nickname');
			$email = $this->input->post('email');
			$no_whatsapp = $this->input->post('no_whatsapp_user');
			$password = $this->input->post('password');
			$confirm = $this->input->post('confirmpassword');
			$radio = $this->input->post('radioregister');

			if( $radio == 'siswa' ){
				if( $password != $confirm ){
					$this->session->set_flashdata('pesanconfirm', '<div class="alert alert-danger 				alert-dismissible fade show" role="alert">Password tidak sama !
						</div>');
					redirect('Home');
				} else {
					$data = array(
						'id_siswawali' => $idsiswa,
						'nama_lengkap_user' => $namalengkap,
						'nama_panggilan_user' => $namapanggilan,
						'email_user' => $email,
						'no_whatsapp_user' => $no_whatsapp,
						'password_user' => md5($password)
					);

					$this->Pengajar_Model->tambahData($data,'tb_siswawali_user');

					echo "<script>
						alert('Data Anda Berhasil di Daftarkan');
						window.location.href = '".base_url('Home')."';
					</script>";
				}
			} elseif ( $radio == 'guru' ){
				if( $password != $confirm ){
					$this->session->set_flashdata('pesanconfirm', '<div class="alert alert-danger 				alert-dismissible fade show" role="alert">Password tidak sama !
						</div>');
					redirect('Home');
				} else{
					$data = array(
						'id_tutor' => $idtutor,
						'nama_lengkap_tutor' => $namalengkap,
						'nama_panggilan_tutor' => $namapanggilan,
						'email_tutor' => $email,
						'no_whatsapp_tutor' => $no_whatsapp,
						'password_tutor' => md5($password)
					);

					$this->Pengajar_Model->tambahData($data,'tb_tutor');

					echo "<script>
						alert('Data Anda segera Diproses');
						window.location.href = '".base_url('Home')."';
					</script>";
				}
			}  else {
				$this->session->set_flashdata('pesanregister', '<div class="alert alert-danger 				alert-dismissible fade show" role="alert">Pilih Jenis Register Anda !
						</div>');
				redirect('Home');
			}
		}

	}

?>