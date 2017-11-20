<?php
//header.php

?>

<!DOCTYPE html>
<html>
<head>
<title>Aplikasi Sistem Perekaman Diklat</title>
<link href="<?php echo assets_url();?>/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" />
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Aplikasi Sistem Perekaman Diklat</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pengguna<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url().index_page();?>/user">List</a></li>
		  <li><a href="<?php echo base_url().index_page();?>/user">List</a></li>
        </ul>
      </li>
      <li><a href="<?php echo base_url().index_page();?>/user">Pengguna</a></li>
      <li><a href="<?php echo base_url().index_page();?>/Person">Pegawai</a></li>
    </ul>
  </div>
</nav>
