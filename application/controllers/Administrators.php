<?php

	class Administrators extends CI_Controller{

		public function index()
		{
			$this->load->view('admin-login');
		}
		public function proses_login()
		{
			$this->form_validation->set_rules('email','Email','required',[
				'required' => 'Email wajib diisi !'
			]);
			$this->form_validation->set_rules('password','Password','required',[
				'required' => 'Password wajib di isi !'
			]);
			if ($this->form_validation->run() == FALSE ) {
				$this->load->view('admin-login');
			}else{
				$email_admin = $this->input->post('email');
				$password_admin = $this->input->post('password');

				$email = $email_admin;
				$pass = md5($password_admin);

				$cek = $this->LoginAdmin_Model->cek_login($email, $pass, 'tb_admin');

				echo $email_admin;
				if ($cek->num_rows() > 0){

					foreach ($cek->result() as $ck){
						$sess_data['email'] = $ck->email_admin;
						$id = $ck->id;
							$data_session = array(
								'id' => $id,
								'email_admin' => $email,
								'status' =>'login'
							);
							$this->session->set_userdata($data_session);	
					}
					redirect('Administrator/Profil');
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Email Atau Password Salah !
							</div>');
					redirect('Administrators');
				}
			}
		}
		public function lupa_password()
		{
			$this->load->view('lupapassword_admin');
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

	        $email = $this->input->post('email');
	        $token = base64_encode(random_bytes(32));
            $where = array('email_admin' => $email);
            
            $query = $this->Admin_Model->GetAdmin($where, 'tb_admin');
            
            if( $query->num_rows() > 0 ){
    	        $this->load->library('email', $config);
    	        $this->email->from('pistar@gmail.com', 'pistarlesdanprivat.com');
    
                $this->email->to($email);
                $this->email->subject('Reset Password');
                $this->email->message('Perbaharui password pistar anda dengan klik link berikut :'.base_url().'Administrators/token?email='.$email.'&&token='.$token);
    	        
    	        if ($this->email->send()) {
    	            $this->session->set_flashdata('pesan', '<div class="alert alert-success 					alert-dismissible fade show" role="alert">Silahkan Cek Email Untuk Melakukan Reset Password
    							</div>');
    	            redirect('Administrators/lupa_password');
    	        } else {
    	            $this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Email '.$email.' tidak terdaftar
    							</div>');
    	            redirect('Administrators/lupa_password');
    	        }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Email '.$email.' tidak terdaftar
    							</div>');
    	            redirect('Administrators/lupa_password');
            }
		}
		public function token()
		{
			$email = $this->input->get('email');
			$token = $this->input->get('token');
			$where = array('email_admin' => $email);
			if( $token == '' ){
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Silahkan Melakukan Reset Password Terlebih Dahulu
							</div>');
	            redirect('Administrators/lupa_password');
			} else {
			 	$data['token'] = $token;
				$data['admin'] = $this->Admin_Model->GetData($where, 'tb_admin')->result();

				$this->load->view('gantipassword-admin', $data);
			}
		}
		public function proses_gantipassword()
		{
			$id = $this->input->post('id_admin');
			$password = $this->input->post('password');
			$confirmpass = $this->input->post('confirmpass');
			$token = $this->inpupt->post('token');
			
		 	$where = array('id' => $id);

			$data['admin'] = $this->Admin_Model->GetData($where, 'tb_admin')->result();

			foreach ( $data['admin'] as $c ) {
				if( $c->password_admin == md5($password) ){
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Password anda sudah pernah digunakan !
							</div>');
					$this->load->view('gantipassword-admin', $data);
				} elseif( $password != $confirmpass ){
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Konfirmasi password anda salah !
							</div>');
					$this->load->view('gantipassword-admin', $data);
				} else{
					$dataUpdate = array('password_admin' => md5($password));
					$this->Admin_Model->update_data($where, $dataUpdate, 'tb_admin');
					$this->session->set_flashdata('pesan', '<div class="alert alert-success 					alert-dismissible fade show" role="alert">Password anda berhasil diganti !
							</div>');
					$this->load->view('admin-login');
				}
			}
			// if( $cek->num_rows() > 0 ){
				
			// 	$data['admin'] = $cek->result();
			// 	$this->load->view('gantipassword-admin', $data);
			// } else{
			// 	$this->session->set_flashdata('pesan', '<div class="alert alert-danger 					alert-dismissible fade show" role="alert">Email '.$email.' tidak terdaftar
			// 				</div>');
			// 	redirect('Administrators/lupa_password');
			// }
		}
	}

?>