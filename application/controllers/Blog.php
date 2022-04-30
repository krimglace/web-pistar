<?php

	class Blog extends CI_Controller{

		public function index()
		{
			$data['tentang'] = $this->Utama_Model->tampilData('tb_tentang_pistar')->result();
			$data['blog'] = $this->Utama_Model->tampilData('tb_blog')->result();
			
			$this->load->view('header', $data);
			$this->load->view('blog', $data);
			$this->load->view('footer', $data);
		}
		public function Read($id)
		{
			$id_blog = $id;
			$where = array('id_blog' => $id_blog);
			$data['tentang'] = $this->Utama_Model->tampilData('tb_tentang_pistar')->result();
			$data['blog'] = $this->Utama_Model->tampilDataByID($where, 'tb_blog')->result();
			
			$this->load->view('header', $data);
			$this->load->view('readblog', $data);
			$this->load->view('footer', $data);
		}
		public function Add_Comment($id)
		{
			$id_blog = $id;
			$email = $this->input->post('email_comment');
			$komentar = $this->input->post('comment');

			$data = array(
				'id_blog' => $id_blog,
				'email_comment' => $email,
				'isi_komentar' => $komentar
			);

			$this->Utama_Model->tambahBlog($data, 'tb_blog_comment');
			echo "<script>
						alert('komentar Berhasil di Kirim');
						window.location.href = '".base_url('Blog/Read/'.$id_blog)."';
					</script>";
		}

	}

?>