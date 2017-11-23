<?php

$user_id=$this->session->userdata('id_user');

if(!$user_id){
	redirect(base_url().index_page().'/Welcome');
}else{
	$username=$this->session->userdata('user_name');
	echo '<h2 style="font-size:20pt">Username :'.$username.'</h1>';
	$status=$this->session->userdata('user_status');
	echo '<h2 style="font-size:20pt">Level User :'.$status.'</h1>';
	$user_id=$this->session->userdata('id_user');
	echo '<h2 style="font-size:20pt">User Id :'.$user_id.'</h1>';

} 
?>
<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Sistem Perekaman Diklat</title>
    <link href="<?php echo assets_url();?>/datatables/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo assets_url();?>/datatables/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo assets_url();?>/datatables/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="#">Aplikasi Sistem Perekaman Diklat</a>
		</div>
		<ul class="nav navbar-nav">
			<li class="active"><a href="<?php echo base_url().index_page();?>/web">Home</a></li>
		<?php
		if($status=="1"){ //level admin
		?>
		<li><a href="<?php echo base_url().index_page();?>/web/pengguna">Pengguna</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/pegawai">Pegawai</a></li>
		<?php
		}elseif($status=="2"){ //level pegawai sesuai id_usernya
		?>
		<li><a href="<?php echo base_url().index_page();?>/web/diklat">Diklat</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/pegawai">Pegawai</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/peserta">Peserta</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/setuju_dokumen">Persetujuan Dokumen</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/setuju_peserta">Persetujuan Peserta</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/peserta_diklat">Peserta Diklat</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/laporan_diklat">Laporan Diklat</a></li>

		<?php	
		}elseif($status=="3"){ //level umum sesuai id_usernya
		?>
			<li><a href="<?php echo base_url().index_page();?>/web/pengguna">Pengguna</a></li>
			<li><a href="<?php echo base_url().index_page();?>/web/profil">Profil</a></li>
			<li><a href="<?php echo base_url().index_page();?>/web/diklat">Diklat</a></li>
			<li><a href="<?php echo base_url().index_page();?>/web/permohonan_diklat">Permohonan Diklat</a></li>
			<li><a href="<?php echo base_url().index_page();?>/web/calon_peserta">Calon Peserta</a></li>
			<li><a href="<?php echo base_url().index_page();?>/web/peserta">Peserta</a></li>
			<li><a href="<?php echo base_url().index_page();?>/web/peserta_diklat">Peserta Diklat

		<?php	
		}else{
		?>

		<?php
		};
		?>
		<li><a href="<?php echo base_url().index_page();?>/web/about">About</a></li>
		<li><a href="<?php echo base_url().index_page();?>/Welcome/user_logout">Logout</a></li>
			<!-- <li><a href="<?php echo base_url().index_page();?>/web/pengguna">Pengguna</a></li>
			<li><a href="<?php echo base_url().index_page();?>/web/pegawai">Pegawai</a></li>
			<li><a href="<?php echo base_url().index_page();?>/web/profil">Profil</a></li>
			<li><a href="<?php echo base_url().index_page();?>/web/calon_peserta">Calon Peserta</a></li>
			<li><a href="<?php echo base_url().index_page();?>/web/diklat">Diklat</a></li>
			<li><a href="<?php echo base_url().index_page();?>/web/permohonan_diklat">Permohonan Diklat</a></li>
			<li><a href="<?php echo base_url().index_page();?>/web/setuju_dokumen">Persetujuan Dokumen</a></li>
			<li><a href="<?php echo base_url().index_page();?>/web/setuju_peserta">Persetujuan Peserta</a></li>
			<li><a href="<?php echo base_url().index_page();?>/web/peserta">Peserta</a></li>
			<li><a href="<?php echo base_url().index_page();?>/web/peserta_diklat">Peserta Diklat</a></li>
			<li><a href="<?php echo base_url().index_page();?>/web/laporan_diklat">Laporan Diklat</a></li>
			<li><a href="<?php echo base_url().index_page();?>/Welcome/user_logout">Logout</a></li> -->

		</ul>
	  </div>
</nav>



 
    </head>