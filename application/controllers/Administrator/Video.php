<?php

	class Video extends CI_Controller{

		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$id = $this->session->userdata('id');
				$where = array( 'id' => $id );

				$data['admin'] = $this->Admin_Model->GetAdmin($where, 'tb_admin')->result();
				$data['pistar'] = $this->Admin_Model->tampilData('tb_panduan_jadipengajar')->result();

				$this->load->view('AdminView/header');
				$this->load->view('AdminView/sidebar', $data);
				$this->load->view('AdminView/video', $data);
				$this->load->view('AdminView/footer');
			} else{
				redirect('Home');
			}
		}
		public function update()
		{
		    $link_sebelumnya = $this->input->post('linkprev');
		    $link = $this->input->post('link');
		    $where = array('link' => $link_sebelumnya);
		    $pistar = $this->Admin_Model->GetAdmin($where, 'tb_panduan_jadipengajar')->result();
		    foreach( $pistar as $ptr ){
		        $id = $ptr->id_panduan_jadipengajar;
		        
		        $data = array('link' => $link);
		        
    			$where2 = array('id_panduan_jadipengajar' => $id);
    
    			$this->Admin_Model->update_data($where, $data, 'tb_panduan_jadipengajar');
    			$this->session->set_flashdata('pesan','
    				<div class="alert alert-success alert-dismissible fade show" role="alert">
    					<i class="fa fa-check-square mr-2"></i> 
    					Video Berhasil Diganti ! 
    					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
    						<span aria-hidden="true">&times;</span>
    					</button>
    				</div>');
    			redirect('Administrator/Video');
		    }
		}
	}
?>