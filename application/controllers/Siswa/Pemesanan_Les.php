<?php

	class Pemesanan_Les extends CI_Controller
	{
		
		public function index()
		{
			if($this->session->userdata('status')=="login"){

				$idsiswa = $this->session->userdata('id_siswawali');
				$where = array( 'id_siswawali' => $idsiswa );

				$data['siswawali'] = $this->AkunSiswa_Model->tampilData($where, 'tb_siswawali_user')->result();
				$data['pesanan'] = $this->AkunSiswa_Model->tampilData($where, 'tb_pesanan_les')->result();

				$this->load->view('SiswaView/header');
				$this->load->view('SiswaView/sidebar', $data);
				$this->load->view('SiswaView/pemesanan', $data);
				$this->load->view('SiswaView/footer');
			} else{
				redirect('Home');
			}
		}
		public function Tambah_Pemesanan()
		{
			if($this->session->userdata('status')=="login"){

				$idsiswa = $this->session->userdata('id_siswawali');
				$where = array( 'id_siswawali' => $idsiswa );

				$data['siswawali'] = $this->AkunSiswa_Model->tampilData($where, 'tb_siswawali_user')->result();
				foreach ($data['siswawali'] as $siswa ) {
					if(
					    $siswa->kelas == '' || $siswa->kelas == NULL || 
					    $siswa->pp_siswa =='' || $siswa->pp_siswa == NULL || 
					    $siswa->alamat_user =='' || $siswa->alamat_user == NULL 
					    ){
						echo "<script>
							alert('Lengkapi Profil Terlebih Dahulu');
							window.location.href = '".base_url('Siswa/Profil')."';
						</script>";
					} else{
					 $data['paket'] = $this->AkunSiswa_Model->tampilDataPesanan('tb_paket_belajar')->result();

 						$this->load->view('SiswaView/header');
 						$this->load->view('SiswaView/sidebar', $data);
						$this->load->view('SiswaView/tambahpesanan', $data);
						$this->load->view('SiswaView/footer');
					}
				}
			} else{
				redirect('Home');
			}
		}
		public function Tambah_Pesanan_Aksi()
		{
			$count = count($this->AkunSiswa_Model->cekdatapesanan()->result());
			$query = $this->AkunSiswa_Model->cekdatapesanan()->result();

			if($count <> 0){
            	foreach( $query as $que ){
            		$kode = intval($que->pesanan) + 1; 
            	}
        	} else{      
	            $kode = 1;  
	        }

	        $batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
			$kodetampil = "PLES".$batas;

			$idpesanan = $kodetampil;
			$idsiswa = $this->input->post('ids');
			$paket = $this->input->post('paket');
			$sistem = $this->input->post('sistem');
			$jk = $this->input->post('JK');
			$mapel = $this->input->post('mapel');
			$senin = $this->input->post('senin');
			$selasa = $this->input->post('selasa');
			$rabu = $this->input->post('rabu');
			$kamis = $this->input->post('kamis');
			$jumat = $this->input->post('jumat');
			$sabtu = $this->input->post('sabtu');
			$kode = $this->input->post('kode');
			$tanggal = $this->input->post('tanggal');
			$catatan = $this->input->post('catatan');
			$jumlah = $this->input->post('jumlah');
			$status = 'On Verified';

			$idsiswa = $this->session->userdata('id_siswawali');
			$where = array( 'id_siswawali' => $idsiswa );

			$siswawali = $this->AkunSiswa_Model->tampilData($where, 'tb_siswawali_user')->result();

			foreach( $siswawali as $siswa ){
				$kelas = $siswa->kelas;
				$where2 = array('kelas' => $kelas, 'sistem_pembelajaran' => $sistem);
				$packet = $this->AkunSiswa_Model->tampilData($where2,'tb_filterbiayales')->result();
				foreach ($packet as $pkt) {
					$hargaakhirregullar = ((int)$pkt->harga_regullar * (100 - (int)$pkt->diskon_regullar)/100) * $jumlah;
					$hargaakhirsuper = ((int)$pkt->harga_super * (100 - (int)$pkt->diskon_super)/100) * $jumlah;
					$hargaakhirintensif = ((int)$pkt->harga_intensif * (100 - (int)$pkt->diskon_intensif)/100) * $jumlah;
					$hargaakhirsuperintensif = ((int)$pkt->harga_superintensif * (100 - (int)$pkt->diskon_superintensif)/100) * $jumlah;
					if( $paket == 'Paket Regular 1X' ){
						$data = array(
							'id_siswawali' => $idsiswa,
							'id_pesanan' => $idpesanan,
							'nama_paket' => $paket,
							'sistem_pembelajaran' => $sistem,
							'jk_guru' => $jk,
							'mata_pelajaran' => $mapel,
							'hari_senin' => $senin,
							'hari_selasa' => $selasa,
							'hari_rabu' => $rabu,
							'hari_kamis' => $kamis,
							'hari_jumat' => $jumat,
							'hari_sabtu' => $sabtu,
							'hari_senin' => $senin,
							'kode_referral' => $kode,
							'tanggal_mulai' => $tanggal,
							'jumlah_siswa' => $jumlah,
							'catatan' => $catatan,
							'status' => $status,
							'total_bayar' => $hargaakhirregullar.'k'
						);
					} elseif( $paket == 'Paket Super 4X' ){
						$data = array(
							'id_siswawali' => $idsiswa,
							'id_pesanan' => $idpesanan,
							'nama_paket' => $paket,
							'sistem_pembelajaran' => $sistem,
							'jk_guru' => $jk,
							'mata_pelajaran' => $mapel,
							'hari_senin' => $senin,
							'hari_selasa' => $selasa,
							'hari_rabu' => $rabu,
							'hari_kamis' => $kamis,
							'hari_jumat' => $jumat,
							'hari_sabtu' => $sabtu,
							'hari_senin' => $senin,
							'kode_referral' => $kode,
							'tanggal_mulai' => $tanggal,
							'jumlah_siswa' => $jumlah,
							'catatan' => $catatan,
							'status' => $status,
							'total_bayar' => $hargaakhirsuper.'k'
						);
					} elseif( $paket == 'Paket Intensif 8X' ){
						$data = array(
							'id_siswawali' => $idsiswa,
							'id_pesanan' => $idpesanan,
							'nama_paket' => $paket,
							'sistem_pembelajaran' => $sistem,
							'jk_guru' => $jk,
							'mata_pelajaran' => $mapel,
							'hari_senin' => $senin,
							'hari_selasa' => $selasa,
							'hari_rabu' => $rabu,
							'hari_kamis' => $kamis,
							'hari_jumat' => $jumat,
							'hari_sabtu' => $sabtu,
							'hari_senin' => $senin,
							'kode_referral' => $kode,
							'tanggal_mulai' => $tanggal,
							'jumlah_siswa' => $jumlah,
							'catatan' => $catatan,
							'status' => $status,
							'total_bayar' => $hargaakhirintensif.'k'
						);
					} elseif( $paket == 'Paket Super Intensif 12X' ) {
						$data = array(
							'id_siswawali' => $idsiswa,
							'id_pesanan' => $idpesanan,
							'nama_paket' => $paket,
							'sistem_pembelajaran' => $sistem,
							'jk_guru' => $jk,
							'mata_pelajaran' => $mapel,
							'hari_senin' => $senin,
							'hari_selasa' => $selasa,
							'hari_rabu' => $rabu,
							'hari_kamis' => $kamis,
							'hari_jumat' => $jumat,
							'hari_sabtu' => $sabtu,
							'hari_senin' => $senin,
							'kode_referral' => $kode,
							'tanggal_mulai' => $tanggal,
							'jumlah_siswa' => $jumlah,
							'catatan' => $catatan,
							'status' => $status,
							'total_bayar' => $hargaakhirsuperintensif.'k'
						);
					}
				}
			}
			

			$this->AkunSiswa_Model->tambahPesanan($data,'tb_pesanan_les');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fa fa-check-square mr-2"></i> 
					Pesanan Berhasil Di Tambahkan ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Siswa/Pemesanan_Les');
		}
		public function konfirmasi_pembayaran()
		{
			$id = $this->input->get('id_pesanan');
			if($this->session->userdata('status')=="login"){
				$idsiswa = $this->session->userdata('id_siswawali');
				$where = array( 'id_siswawali' => $idsiswa );
				$wherepesanan = array( 'id_pesanan' => $id );

				$data['siswawali'] = $this->AkunSiswa_Model->tampilData($where, 'tb_siswawali_user')->result();
				$data['pesanan'] = $this->AkunSiswa_Model->tampilData($wherepesanan, 'tb_pesanan_les')->result();
				$data['rekening'] = $this->AkunSiswa_Model->tampilDataPesanan('tb_rekeningpistar')->result();
				$data['id_pesanan'] = $id;

				$this->load->view('SiswaView/header');
				$this->load->view('SiswaView/sidebar', $data);
				$this->load->view('SiswaView/bayarpesanan', $data);
				$this->load->view('SiswaView/footer');
			} else{
				redirect('home');
			}
		}
		public function kirim_pembayaran()
		{
			$id_pesanan = $this->input->post('id_pesanan');

        	$config['allowed_types']	= 'jpg|jpeg|png|svg';
			$config['upload_path']		= "assets/mystyle/img/buktibayar";

        	$this->load->library('Upload');
			$this->upload->initialize($config);
			// var_dump($this->upload->do_upload('bukti_pembayaran'));
			if( ! $this->upload->do_upload('bukti_pembayaran'))
			{
				$this->session->set_flashdata('pesan','
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="fa fa-window-close mr-2"></i> 
					'.$this->upload->display_errors('', '').'
					<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('Siswa/Pemesanan_Les/konfirmasi_pembayaran?id_pesanan='.$id_pesanan);
			} else {
				$file = $this->upload->data();
				$bukti_pembayaran = $file['file_name'];

				$data = array( 'bukti_pembayaran' => $bukti_pembayaran );
				$where = array( 'id_pesanan' => $id_pesanan );
			 
				$this->AkunSiswa_Model->update_data($where,$data,'tb_pesanan_les');
				$this->session->set_flashdata('pesan','
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="fa fa-check-square mr-2"></i> 
						Berhasil Konfirmasi Pembayaran ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close> 
							<span aria-hidden="true">&times;</span>
						</button>
					</div>');
				redirect('Siswa/Pemesanan_Les/konfirmasi_pembayaran?id_pesanan='.$id_pesanan);
			}
		}
        function __construct() {
			parent:: __construct();
			$this->load->library('Pdf');
			$this->load->database();
			$this->load->helper('url');
		}
		public function ExportPDF($id)
		{
			$idsiswa = $this->session->userdata('id_siswawali');
			// echo $id.''.$idsiswa;
			$no = 1;
			$where = array('id_pesanan' => $id);
			$where2 = array('id_siswawali' => $idsiswa);
			$pesanan = $this->AkunSiswa_Model->tampilData($where, 'tb_pesanan_les')->result();
			$Profil = $this->AkunSiswa_Model->tampilData($where2, 'tb_siswawali_user')->result();
			$rekening = $this->AkunSiswa_Model->tampilDataPesanan('tb_rekeningpistar')->result();
			$tentang = $this->AkunSiswa_Model->tampilDataPesanan('tb_tentang_pistar')->result();
			$date = date('l, d / M / Y');

			foreach( $pesanan as $pesan ) {
				foreach( $Profil as $prof ) {
					foreach( $tentang as $ttg ) {
						$gambar = '<img src="'.base_url("assets/mystyle/img/".$ttg->logo_pistar).'"';
					$bayaran = (int)$pesan->total_bayar.'000';
					$pdf = new FPDF('L','mm',array(150,205));
					$pdf->AddPage();
					$pdf->SetFont('Arial', 'B', 16);
					$pdf->Cell(190,7,'Konfirmasi Pembayaran',0,1,'C');
					$pdf->Cell(10,10,'',0,1);
					$pdf->Image('assets/mystyle/img/'.$ttg->logo_pistar,120,30,65,30);
					$pdf->Cell(10,10,'',0,1);
					$pdf->SetFont('Arial', 'B', 14);
					$pdf->Cell(40,7,'ID Pesanan',0,0);
					$pdf->Cell(10,7,':',0,0,'C');
					$pdf->SetFont('Arial', 'I', 14);
					$pdf->Cell(100,7, $pesan->id_pesanan,0,1);
					$pdf->SetFont('Arial', 'B', 14);
					$pdf->Cell(40,7,'Tanggal',0,0);
					$pdf->Cell(10,7,':',0,0,'C');
					$pdf->SetFont('Arial', 'I', 14);
					$pdf->Cell(100,7, $date,0,1);
					$pdf->SetFont('Arial', 'B', 14);
					$pdf->Cell(40,7,'Nama Pemesan',0,0);
					$pdf->Cell(10,7,':',0,0,'C');
					$pdf->SetFont('Arial', 'I', 14);
					$pdf->Cell(100,7, $prof->nama_lengkap_user,0,1);
					$pdf->Cell(10,10,'',0,1);

					$pdf->SetFont('Arial', 'B', 12);
					$pdf->Cell(10,7,'No',1,0,'C');
					$pdf->Cell(55,7,'Nama Pesanan',1,0,'C');
					$pdf->Cell(55,7,'Harga',1,0,'C');
					$pdf->Cell(60,7,'Status',1,1,'C');

					$pdf->SetFont('Arial', '', 10);
					$pdf->Cell(10,6,$no++,1,0,'C');
					$pdf->Cell(55,6,$pesan->nama_paket,1,0,'C');
					$pdf->Cell(55,6,'Rp '.$bayaran,1,0,'C');
					if( $pesan->bukti_pembayaran == '' || $pesan->bukti_pembayaran == NULL ){
						$pdf->SetFont('Arial', 'I'.'B', 10);
						$pdf->Cell(60,6,'Belum Bayar', 1,1,'C');
					} else {
						$pdf->SetFont('Arial', 'B', 10);
						$pdf->Cell(60,6,'Menunggku Konfirmasi', 1,1,'C');
					}
					$pdf->Cell(10,10,'',0,1);

					$pdf->SetFont('Arial', 'B', 10);
					$pdf->Cell(40,7,'Pilihan Pembayaran',0,0);
					$pdf->Cell(10,7,':',0,0,'C');
					$pdf->SetFont('Arial', 'B', 12);
					$pdf->Cell(120,7,$date,0,1,'R');
					$pdf->Cell(10,5	,'',0,1);
					foreach ($rekening as $rek ) {
						$pdf->SetFont('Arial', 'B', 10);
						$pdf->Cell(40,7,$rek->jenis_bank.' - '.$rek->nomor_rekening.' ('.$rek->atas_nama.')',0,0);
						$pdf->Cell(10,5,'',0,1);
					}
					$pdf->SetFont('Arial', 'B', 12);
					$pdf->Cell(165,7,'PISTAR',0,1,'R');

					$pdf->Output();
					}
				}
			}
		}
	}

?>