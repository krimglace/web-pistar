<?php 

	class Blog extends CI_Controller
	{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$id = $this->session->userdata('id');
				$where = array( 'id' => $id );

				$data['admin'] = $this->Admin_Model->GetAdmin($where, 'tb_admin')->result();
				$data['Blog'] = $this->Blog_Model->tampilData('tb_blog')->result();

				$this->load->view('AdminView/header');
				$this->load->view('AdminView/sidebar');
				$this->load->view('AdminView/blog', $data);
				$this->load->view('AdminView/footer');
			} else{
				redirect('home');
			}
		}

		public function TambahBlog()
		{
			$data['Kategori'] = $this->Blog_Model->tampilKategori('tb_kategori_blog')->result();
			$data['Author'] = $this->Admin_Model->tampilData('tb_admin')->result();

			$this->load->view('AdminView/header');
			$this->load->view('AdminView/sidebar');
			$this->load->view('AdminView/tambahblog', $data);
			$this->load->view('AdminView/footer');
		}

		public function TambahBlogAksi()
		{
			$judul = $this->input->post('judul_artikel');
			$author = $this->input->post('author');
			$tanggal = $this->input->post('tanggal_upload');
			$kategori = $this->input->post('kategori_blog');
			$content = $this->input->post('content_blog');

			$config['upload_path']		= "assets/mystyle/img/blog";
        	$config['allowed_types']	= 'jpg|jpeg|png|svg';
        	$this->load->library('Upload');
			$this->upload->initialize($config);

			$this->upload->do_upload('featured_image');
			$file = $this->upload->data();

			$this->upload->do_upload('last_picture');
			$file2 = $this->upload->data();

			$featured = $file['file_name'];
			$lastpicture = $file2['file_name'];

			$data =	array(
				'judul_artikel' => $judul,
				'author' => $author,
				'tanggal_upload' => $tanggal,
				'kategori_blog' => $kategori,
				'content_blog' => $content,
				'featured_image' => $featured,
				'last_picture' => $lastpicture
			);

			$this->Blog_Model->tambahBlog($data,'tb_blog');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Artikel Berhasil Di Tambahkan ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Blog');
		}

		public function TambahKategori()
		{
			$category = $this->input->post('nama_kategori');

			$data =	array('nama_kategori' => $category);

			$this->Blog_Model->tambahKategori($data,'tb_kategori_blog');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Kategori Berhasil Di Tambahkan ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Blog/TambahBlog');
		}
		public function Edit($id)
		{
			$where = array('id_blog' => $id);
			$data['artikel'] = $this->Admin_Model->GetData($where, 'tb_blog')->result();
			$data['Kategori'] = $this->Blog_Model->tampilKategori('tb_kategori_blog')->result();
			$data['Author'] = $this->Admin_Model->tampilData('tb_admin')->result();

			$this->load->view('AdminView/header');
			$this->load->view('AdminView/sidebar');
			$this->load->view('AdminView/editblog', $data);
			$this->load->view('AdminView/footer');
		}

		public function EditAksi()
		{
			$id_blog = $this->input->post('id_blog');
			$judul = $this->input->post('judul_artikel');
			$author = $this->input->post('author');
			$tanggal = date('Y-m-d h:i:s');
			$kategori = $this->input->post('kategori_blog');
			$content = $this->input->post('content_blog');

			$config['upload_path']		= "assets/mystyle/img/blog";
        	$config['allowed_types']	= 'jpg|jpeg|png|svg';
        	$this->load->library('Upload');
			$this->upload->initialize($config);

			$this->upload->do_upload('featured_image');
			$file = $this->upload->data();

			$this->upload->do_upload('last_picture');
			$file2 = $this->upload->data();

			$featured = $file['file_name'];
			$lastpicture = $file2['file_name'];

			if( $featured != '' && $lastpicture != '' ){
				$data =	array(
					'judul_artikel' => $judul,
					'author' => $author,
					'tanggal_upload' => $tanggal,
					'kategori_blog' => $kategori,
					'content_blog' => $content,
					'featured_image' => $featured,
					'last_picture' => $lastpicture
				);
			} elseif( $featured == '' && $lastpicture != '' ){
				$data =	array(
					'judul_artikel' => $judul,
					'author' => $author,
					'tanggal_upload' => $tanggal,
					'kategori_blog' => $kategori,
					'content_blog' => $content,
					'last_picture' => $lastpicture
				);
			} elseif( $featured != '' && $lastpicture == '' ){
				$data =	array(
					'judul_artikel' => $judul,
					'author' => $author,
					'tanggal_upload' => $tanggal,
					'kategori_blog' => $kategori,
					'content_blog' => $content,
					'featured_image' => $featured
				);
			} elseif( $featured == '' && $lastpicture == '' ){
				$data =	array(
					'judul_artikel' => $judul,
					'author' => $author,
					'tanggal_upload' => $tanggal,
					'kategori_blog' => $kategori,
					'content_blog' => $content
				);
			}

			$where = array('id_blog' => $id_blog);
			$this->Admin_Model->update_data($where, $data,'tb_blog');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Data Artikel Berhasil Di Update ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Blog');
		}

		public function Read($id)
		{
			$where = array('id_blog' => $id);
			$data['artikel'] = $this->Admin_Model->GetData($where, 'tb_blog')->result();
			$data['Kategori'] = $this->Blog_Model->tampilKategori('tb_kategori_blog')->result();
			$data['Author'] = $this->Admin_Model->tampilData('tb_admin')->result();

			$this->load->view('AdminView/header');
			$this->load->view('AdminView/sidebar');
			$this->load->view('AdminView/readblog', $data);
			$this->load->view('AdminView/footer');
		}

		public function Delete($id)
		{
			$where = array('id_blog' => $id);

			$this->Admin_Model->deleteAdmin($where, 'tb_blog');

			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-trash mr-2"></i> 
					Artikel Berhasil Di Hapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Administrator/Blog');
		}

		public function Comment($id)
		{
			$where = array('id_blog' => $id);
			$data['komentar'] = $this->Admin_Model->GetData($where, 'tb_blog_comment')->result();

			$this->load->view('AdminView/header');
			$this->load->view('AdminView/sidebar');
			$this->load->view('AdminView/komentarblog', $data);
			$this->load->view('AdminView/footer');
		}

	}

?>