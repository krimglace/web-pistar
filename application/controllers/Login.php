<?php 

	class Login extends CI_Controller{

		public function proses_login()
		{
			$this->form_validation->set_rules('email','Email','required',[
				'required' => 'Email wajib diisi !'
			]);
			$this->form_validation->set_rules('password','Password','required',[
				'required' => 'Password wajib di isi !'
			]);
			if ($this->form_validation->run() == FALSE ) {
				redirect('home');
			}else{
				$email_user = $this->input->post('email');
				$password_user = $this->input->post('password');

				$radio = $this->input->post('radio');

				$email = $email_user;
				$pass = md5($password_user);

				if($radio == 'siswa'){

					$cek = $this->Login_Model->cek_loginsiswa($email, $pass, 'tb_siswawali_user');
					if ($cek->num_rows() > 0){

						foreach ($cek->result() as $ck){
							$id = $ck->id_siswawali;
							// echo $id;
							$data_session = array(
								'id_siswawali' => $id,
								'nama' => $email,
								'status' =>'login'
							);
							$this->session->set_userdata($data_session);
						}
							redirect('Siswa/Dashboard');
					}else{
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Email Atau Password Salah !
								</div>');
						redirect('home');
					}
				} else if($radio == 'guru'){

					$setujui_tutor = 'Ya';
					$data = array(
						'email_tutor' => $email,
						'password_tutor' => $pass,
						'setujui_tutor' => $setujui_tutor
					);
					$cek = $this->Login_Model->cek_logintutor('tb_tutor', $data);
					$dataa = $cek->result();
					// var_dump($dataa);
					// echo $cek;

					if ($cek->num_rows() > 0){

						// foreach ($cek->result() as $ck){
						// 	$id = $ck->id_tutor;
						// 	$sess_data['email'] = $ck->email_tutor;
						// 	$user_data = $this->Login_Model->get_logintutor($id);
						
						foreach( $dataa as $dt ){
							$id = $dt->id_tutor;
							// echo $id;
							$data_session = array(
								'id_tutor' => $id,
								'nama' => $email,
								'status' =>'login'
							);
							$this->session->set_userdata($data_session);
						}
							redirect('Tutor/Dashboard');	
						// }
					}else{
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Email Atau Password Salah / Belum Disetujui !
								</div>');
						redirect('home');
					}
				} else {
					$this->session->set_flashdata('pesanlogin', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Pilih Jenis Login Anda !
								</div>');
						redirect('home');
				}
			}
		}
		public function lupa_password()
		{
			$this->load->view('lupapassword_user');
		}
		public function proses_lupapassword()
		{
		    $config = [
	            'mailtype'  => 'html',
	            'charset'   => 'utf-8',
	            'protocol'  => 'smtp',
	            'smtp_host' => 'pistarlesdanprivat.com',
	            'smtp_user' => 'adminpistar@pistarlesdanprivat.com',  // Email gmail
	            'smtp_pass'   => 'pistar123',  // Password gmail
	            'smtp_crypto' => 'ssl',
	            'smtp_port'   => 465,
	            'crlf'    => "\r\n",
	            'newline' => "\r\n"
	        ];
	        $token = base64_encode(random_bytes(32));
	        
			$email = $this->input->post('email');
			$status = $this->input->post('status');
    
            if($status == 'siswa'){
			    $where = array('email_user' => $email);
			    $cek = $this->Admin_Model->GetData($where, 'tb_siswawali_user');
			    if( $cek->num_rows() > 0 ){
    	            $this->load->library('email', $config);
    	            $this->email->from('pistar@gmail.com', 'pistarlesdanprivat.com');
    
                    $this->email->to($email);
                    $this->email->subject('Reset Password');
                    $this->email->message('Perbaharui password pistar anda dengan klik link berikut :'.base_url().'Login/tokenuser?email='.$email.'&&token='.$token);
    	        
    	            if ($this->email->send()) {
    	                $this->session->set_flashdata('pesan', '<div class="alert alert-success 					alert-dismissible fade show" role="alert">Silahkan Cek Email Untuk Melakukan Reset Password
    							</div>');
    	                redirect('Login/lupa_password');
    	            } else {
    	                $this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Email '.$email.' tidak terdaftar
    							</div>');
    	                redirect('Login/lupa_password');
    	            }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Email '.$email.' tidak terdaftar
    							</div>');
    	               redirect('Login/lupa_password');
                }
			    
            } else{
                $where2 = array('email_tutor' => $email);   
                $cek2 = $this->Admin_Model->GetData($where2, 'tb_tutor');
                if( $cek2->num_rows() > 0 ){
    	            $this->load->library('email', $config);
    	            $this->email->from('pistar@gmail.com', 'pistarlesdanprivat.com');
    
                    $this->email->to($email);
                    $this->email->subject('Reset Password');
                    $this->email->message('Perbaharui password pistar anda dengan klik link berikut :'.base_url().'Login/tokentutor?email='.$email.'&&token='.$token);
    	        
    	            if ($this->email->send()) {
    	                $this->session->set_flashdata('pesan', '<div class="alert alert-success 					alert-dismissible fade show" role="alert">Silahkan Cek Email Untuk Melakukan Reset Password
    							</div>');
    	                redirect('Login/lupa_password');
    	            } else {
    	                $this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Email '.$email.' tidak terdaftar
    							</div>');
    	                redirect('Login/lupa_password');
    	            }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Email '.$email.' tidak terdaftar
    							</div>');
    	               redirect('Login/lupa_password');
                }
            }
		}
		public function tokenuser()
		{
		    $email = $this->input->get('email');
			$token = $this->input->get('token');
			$where = array('email_user' => $email);
			if( $token == '' ){
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Silahkan Melakukan Reset Password Terlebih Dahulu
							</div>');
	            redirect('Login/lupa_password');
			} else {
			 	$data['token'] = $token;
				$data['siswa'] = $this->Admin_Model->GetData($where, 'tb_siswawali_user')->result();

				$this->load->view('gantipassword-user', $data);
			}
		}
		public function tokentutor()
		{
		    $email = $this->input->get('email');
			$token = $this->input->get('token');
			$where = array('email_tutor' => $email);
			if( $token == '' ){
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Silahkan Melakukan Reset Password Terlebih Dahulu
							</div>');
	            redirect('Login/lupa_password');
			} else {
			 	$data['token'] = $token;
				$data['tutor'] = $this->Admin_Model->GetData($where, 'tb_tutor')->result();

				$this->load->view('gantipassword-tutor', $data);
			}
		}
		public function proses_gantipassword_user()
		{
			$id = $this->input->post('id_siswawali');
			$password = $this->input->post('password');
			$confirmpass = $this->input->post('confirmpass');

		 	$where = array('id_siswawali' => $id);

			$data['siswa'] = $this->Admin_Model->GetData($where, 'tb_siswawali_user')->result();

			foreach ( $data['siswa'] as $c ) {
				if( $c->password_user == md5($password) ){
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Password anda sudah pernah digunakan !
							</div>');
					$this->load->view('gantipassword-user', $data);
				} elseif( $password != $confirmpass ){
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Konfirmasi password anda salah !
							</div>');
					$this->load->view('gantipassword-user', $data);
				} else{
					$dataUpdate = array('password_user' => md5($password));
					$this->Admin_Model->update_data($where, $dataUpdate, 'tb_siswawali_user');
					echo '<script>
							alert("Password Berhasil Diganti");
							window.location.href = "'.base_url('Home').'";
						</script>';
				}
			}
		}
		public function proses_gantipassword_tutor()
		{
			$id = $this->input->post('id_tutor');
			$password = $this->input->post('password');
			$confirmpass = $this->input->post('confirmpass');

		 	$where = array('id_tutor' => $id);

			$data['tutor'] = $this->Admin_Model->GetData($where, 'tb_tutor')->result();

			foreach ( $data['tutor'] as $c ) {
				if( $c->password_user == md5($password) ){
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Password anda sudah pernah digunakan !
							</div>');
					$this->load->view('gantipassword-tutor', $data);
				} elseif( $password != $confirmpass ){
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Konfirmasi password anda salah !
							</div>');
					$this->load->view('gantipassword-tutor', $data);
				} else{
					$dataUpdate = array('password_user' => md5($password));
					$this->Admin_Model->update_data($where, $dataUpdate, 'tb_siswawali_user');
					echo '<script>
							alert("Password Berhasil Diganti");
							window.location.href = "'.base_url('Home').'";
						</script>';
				}
			}
		}

	}

?>