<?php

$user_id=$this->session->userdata('id_user');

if(!$user_id){
	redirect(base_url().index_page().'/Welcome');
}else{
	$username=$this->session->userdata('user_name');
	//echo '<h2 style="font-size:20pt">Username :'.$username.'</h1>';
	$status=$this->session->userdata('user_status');
	//echo '<h2 style="font-size:20pt">Level User :'.$status.'</h1>';
	$user_id=$this->session->userdata('id_user');
	//echo '<h2 style="font-size:20pt">User Id :'.$user_id.'</h1>';

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

<!-- <nav class="navbar navbar-default">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="#">Aplikasi Sistem Perekaman Diklat</a>
		</div>
		<ul class="nav navbar-nav">
			<li class="active"><a href="<?php echo base_url().index_page();?>/web/home">Home</a></li>
		<?php
			if($status=="1"){ //level admin
		?>
		<li><a href="<?php echo base_url().index_page();?>/web/pengguna">Pengguna</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/pegawai">Pegawai</a></li>
		<?php
			}elseif($status=="2"){ //level pegawai sesuai id_usernya
		?>
		<li><a href="<?php echo base_url().index_page();?>/web/pengguna">Pengguna</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/calon_peserta">Calon Peserta</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/diklat">Diklat</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/persetujuan_dokumen">Persetujuan Dokumen</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/persetujuan_peserta">Persetujuan Peserta</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/peserta_diklat">Peserta Diklat</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/peserta">Peserta</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/laporan_diklat">Laporan Diklat</a></li>
		<?php	
			}elseif($status=="3"){ //level umum sesuai id_usernya
		?>
		<li><a href="<?php echo base_url().index_page();?>/web/pengguna">Pengguna</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/calon_peserta">Calon Peserta</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/profil">Profil Peserta</a></li>			
		<li><a href="<?php echo base_url().index_page();?>/web/permohonan_diklat">Permohonan Diklat</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/peserta_diklat">Peserta Diklat</a></li>
		<?php	
			}else{
		?>
		<?php
		};
		?> 
		<li><a href="<?php echo base_url().index_page();?>/Welcome/user_logout">Logout</a></li> 
		</ul>
	  </div>
</nav> -->
<!-- <img src="http://localhost/project_sprindik/assets/header-50TH-LIPI.png" class="img-responsive" /> -->
<!-- <div class="row" id="header">
    <div class="col-md-3 col-md-offset-3">
        <img src="http://localhost/project_sprindik/assets/header-50TH-LIPI.png" class="img-responsive"/>
    </div>
</div> -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">SPRINDIK</a>
    </div>

<!-- <div class="row" id="header">
    <div class="col-md-1 col-md-offset-3">
        <img src="http://localhost/project_sprindik/assets/header-50TH-LIPI.png" style="display: inline-block;" class="img-responsive"/>
    </div>
</div> -->
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url().index_page();?>/web/home">Home <span class="sr-only">(current)</span></a></li>
        <!-- <li><a href="<?php echo base_url().index_page();?>/web/home">Home</a></li> -->

		<?php
			if($status=="1"){ //level admin
		?>
		<li><a href="<?php echo base_url().index_page();?>/web/pengguna">Pengguna</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/pegawai">Pegawai</a></li>
		<?php
			}elseif($status=="2"){ //level pegawai sesuai id_usernya
		?>
		<li><a href="<?php echo base_url().index_page();?>/web/pengguna">Pengguna</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/calon_peserta">Calon Peserta</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/peserta">Peserta</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/diklat">Diklat</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Persetujuan <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url().index_page();?>/web/persetujuan_dokumen">Persetujuan Dokumen</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url().index_page();?>/web/persetujuan_peserta">Persetujuan Peserta</a></li>
          </ul>
        </li>		
		<li><a href="<?php echo base_url().index_page();?>/web/peserta_diklat">Peserta Diklat</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/laporan_diklat">Laporan Diklat</a></li>
		<?php	
			}elseif($status=="3"){ //level umum sesuai id_usernya
		?>
		<li><a href="<?php echo base_url().index_page();?>/web/pengguna">Pengguna</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/profil">Profil Peserta</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/calon_peserta">Calon Peserta</a></li>		
		<li><a href="<?php echo base_url().index_page();?>/web/permohonan_diklat">Permohonan Diklat</a></li>
		<li><a href="<?php echo base_url().index_page();?>/web/peserta_diklat">Peserta Diklat</a></li>
		<?php	
			}else{
		?>
		<?php
		};
		?> 

<!--         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li> -->
      </ul>

      <ul class="nav navbar-nav navbar-right">
<!--       <img src="http://placehold.it/18x18" class="profile-image img-circle"> Username <b class="caret"></b></a>
        <li><a href="<?php echo base_url().index_page();?>/Welcome/user_logout">Logout</a></li>
        <li><a class="navbar-brand" href="#"></a></li>  -->

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="http://placehold.it/24x24" class="profile-image img-circle"><?php echo $username; ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url().index_page();?>/Welcome/user_logout">Logout</a></li>
            <li role="separator" class="divider"></li>
            <!-- <li><a href="#">One more separated link</a></li> -->
          </ul>
        </li>   

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<style type="text/css">
  body{
    background: url('http://localhost/project_sprindik/assets/header-50TH-LIPI.png') no-repeat center center fixed ;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: 50% auto;
    background-position: 70% 17%; 
    margin-top: 2%;    
    margin-left: 5%; 
    margin-right: 5%;
    /*opacity: 0.5;*/
}

#bg{
    background:url('http://localhost/project_sprindik/assets/header-50TH-LIPI.png') no-repeat center center;
    height: 500px;
    opacity: 0.5
}
</style>
</head>