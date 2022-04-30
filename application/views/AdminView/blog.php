<?php  ?>
<style type="text/css">
	*{font-family: arial}
	.content-header{ margin-top: -40px; position: relative; z-index: 10000}
	.page-header{ border-radius: 10px; box-shadow: -10px 10px 0 1px black; border: 1px solid black; }
	.content-header a { text-decoration: none; }
	.content-content{ border-radius: 10px; }
	@media screen and (max-width: 750px){
		.content-header h5{ font-size: 100%;}
		.section-3{
		  overflow-y:hidden;
		  -ms-overflow-style:-ms-autohiding-scrollbar;
		}
		.section-3 table td, .section-3 table th{
		  white-space:nowrap; 
		}
	}
</style>
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header mr-5 ml-5">
			<div class="page-header bg-white pt-2 pb-1 pl-4 pr-4">
				<h5>
					<b>
						<i class="fa fa-file mr-1"></i>
						Postingan / Blog
					</b>
				</h5>
			</div>
			<br>
			<a href="<?= base_url('Administrator/Blog/TambahBlog') ?>">
				<div class=" tambah-blog alert alert-success">
					<i class="fa fa-plus mr-2"></i> 
					Tambah Blog 
				</div>
			</a>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<h5 class="text-center"><strong>Post / Article</strong></h5>
			<div class="table-post section-3">
				<table class="table table-striped table-bordered">
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Author</th>
						<th>Tanggal Terbit</th>
						<th colspan="3" class="text-center">Aksi</th>
						<th>Comment</th>
					</tr>
					<?php
						$no = 1;
						foreach( $Blog as $artikel ) :
					?>
					<tr class="text-center">
						<td><?= $no++ ?></td>
						<td class="text-left"><strong><?= $artikel->judul_artikel ?></strong></td>
						<td class="text-left"><?= $artikel->author ?></td>
						<td class="text-left">Terakhir Diubah : <br><?= $artikel->tanggal_upload ?></td>
						<td><a href="<?= base_url('Administrator/Blog/Read/'.$artikel->id_blog) ?>"><h3><i class="text-success fa fa-eye"></i></h3></a></td>
						<td><a href="<?= base_url('Administrator/Blog/Edit/'.$artikel->id_blog) ?>"><h3><i class="fa fa-edit"></i></h3></a></td>
						<td><a href="<?= base_url('Administrator/Blog/Delete/'.$artikel->id_blog) ?>"><h3><i class="text-danger fa fa-trash"></i></h3></a></td>
						<td><a href="<?= base_url('Administrator/Blog/Comment/'.$artikel->id_blog) ?>"><h3><i class="text-secondary fa fa-comment"></i></h3></a></td>
					</tr>
					<?php
						endforeach;
					?>
				</table>
			</div>
		</div>
	</div>
</div>