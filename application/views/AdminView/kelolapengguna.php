<?php  ?>
<script type="text/javascript" src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
<style type="text/css">
	*{font-family: arial}
	.content-header{ margin-top: -40px; position: relative; z-index: 10000}
	.page-header{ border-radius: 10px; box-shadow: -10px 10px 0 1px black; border: 1px solid black; }
	.content-header a { text-decoration: none; }
	.content-content{ border-radius: 10px; }
	.administrator-pengguna, .teacher-pengguna, .student-pengguna{ margin: 1.5%; ; border-radius: 10px; border: 1px solid black; }
	.administrator-pengguna a.kelola{ background-color: green; color: white; }
	.teacher-pengguna a.kelola{ background-color: blue; color: white; }
	.student-pengguna a.kelola{ background-color: gray; color: white; }

	@media screen and (min-width: 751px){
		.administrator-pengguna:hover{ background-color: green; transition: .5s }
		.teacher-pengguna:hover{ background-color: blue; transition: .5s }
		.student-pengguna:hover{ background-color: gray; transition: .5s }

		.administrator-pengguna:hover > a.kelola { background-color: white; color: green }
		.teacher-pengguna:hover > a.kelola { background-color: white; color: blue }
		.student-pengguna:hover > a.kelola { background-color: white; color: gray }
		.administrator-pengguna, .teacher-pengguna, .student-pengguna{ float: left; width: 30%; margin: 1.5%; ; border-radius: 10px; border: 1px solid black; transition: .5s }
	}
</style>
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header mr-5 ml-5">
			<div class="page-header bg-white pt-2 pb-1 pl-4 pr-4">
				<h5>
					<b>
						<i class="fa fa-users mr-1"></i>
						Kelola Pengguna
					</b>
				</h5>
			</div>
			<?= $this->session->flashdata('pesan') ?>
		</div>
		<div class="content-content bg-white pt-4 pr-3 pl-3 pb-3">
			<div class="administrator-pengguna text-center p-3">
				<a href="<?= base_url('Administrator/Kelola_Pengguna/Admin') ?>">
					<img src="<?= base_url('assets/mystyle/img/administrator_icon.jpg') ?>" width="100%">
					<br>
					<a class="btn kelola">Kelola Administrator</a>
					<br>
				</a>
			</div>
			<div class="teacher-pengguna text-center p-3">
				<a href="<?= base_url('Administrator/Kelola_Pengguna/Guru') ?>">
					<img src="<?= base_url('assets/mystyle/img/teacher_icon.png') ?>" width="100%">
					<br>
					<a class="btn kelola">Kelola Tutor/Guru</a>
					<br>
				</a>
			</div>
			<div class="student-pengguna text-center p-4">
				<a href="<?= base_url('Administrator/Kelola_Pengguna/Siswa') ?>">
					<img src="<?= base_url('assets/mystyle/img/student_icon.png') ?>" width="100%">
					<br>
					<a class="btn kelola mt-3">Kelola Siswa</a>
					<br>
				</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>