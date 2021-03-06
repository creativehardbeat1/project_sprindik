<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Aplikasi Sistem Perekaman Diklat</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?php echo assets_url();?>/login_regis/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo assets_url();?>/login_regis/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo assets_url();?>/login_regis/css/form-elements.css">
        <link rel="stylesheet" href="<?php echo assets_url();?>/login_regis/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?php echo assets_url();?>/login_regis/assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo assets_url();?>/login_regis/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo assets_url();?>/login_regis/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo assets_url();?>/login_regis/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo assets_url();?>/login_regis/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>SPRINDIK </strong>Sistem Perekaman &amp; dan Informasi Diklat</h1>
                            <div class="description">
                            	<p>
	                            	
                            	</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Login to our site</h3>
	                            		<p>Enter username and password to log on:</p>
										<?php
										  $success_msg= $this->session->flashdata('success_msg');
										  $error_msg= $this->session->flashdata('error_msg');

											  if($success_msg){
												?>
												<div class="alert alert-success">
												  <?php echo $success_msg; ?>
												</div>
											  <?php
											  }
											  if($error_msg){
												?>
												<div class="alert alert-danger">
												  <?php echo $error_msg; ?>
												</div>
												<?php
											  }
											  ?>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-key"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="<?php echo base_url().index_page();?>/Welcome/login_user" method="post" class="login-form">
				                    	<div class="form-group">											
											<label class="sr-only" for="form-first-name">Username</label>
				                        	<input type="text" name="form-username" placeholder="Username Minimal 4 karakter dan maksimal 15 karakter" class="form-first-name form-control" id="form-first-name">
											
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="form-password" placeholder="Password..." class="form-first-name form-control" id="form-first-name">
				                        </div>
				                        <button type="submit" class="btn">Sign in!</button>
				                    </form>
			                    </div>
		                    </div>
		                
		                	<!-- <div class="social-login">
	                        	<h3>...or login with:</h3>
	                        	<div class="social-login-buttons">
		                        	<a class="btn btn-link-1 btn-link-1-facebook" href="#">
		                        		<i class="fa fa-facebook"></i> Facebook
		                        	</a>
		                        	<a class="btn btn-link-1 btn-link-1-twitter" href="#">
		                        		<i class="fa fa-twitter"></i> Twitter
		                        	</a>
		                        	<a class="btn btn-link-1 btn-link-1-google-plus" href="#">
		                        		<i class="fa fa-google-plus"></i> Google Plus
		                        	</a>
	                        	</div>
	                        </div> -->
	                        
                        </div>
                        
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                        	
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Sign up now</h3>
	                            		<p>Fill in the form below to get instant access:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="<?php echo base_url().index_page();?>/Auth/register_user" method="post" class="registration-form">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-first-name">Username</label>
				                        	<input type="text" name="user_name" placeholder="Username Minimal 4 karakter dan maksimal 15 karakter" class="form-first-name form-control" id="form-first-name">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only">Nomor Handphone</label>
				                        	<input type="text" class="input-medium bfh-phone form-control" data-format="+62 (ddd) ddd-dddd" name="user_mobile" placeholder="Nomor Handphone..." id="form-last-name">
				                        </div>
										<div class="form-group">
				                        	<input type="hidden" name="status" value="3">
				                        </div>
										<div class="form-group">
				                        	<input type="hidden" name="flag" value="1">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-email">Email</label>
				                        	<input type="text" name="user_email" placeholder="Email..."  class="form-first-name form-control" id="form-first-name">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">Password</label>
				                        	<input type="password" name="user_password" placeholder="Password..."  class="form-first-name form-control" id="form-first-name">
				                        </div>
				                        
				                        <button type="submit" class="btn">Sign me up!</button>
				                    </form>
			                    </div>
                        	</div>
                        	
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p>Made by Kelompok I at <a href="http://ojo-lali.com" target="_blank"><strong>WISMA HIJAU</strong></a> 
        					having a lot of fun. <i class="fa fa-smile-o"></i></p>
        			</div>
        			
        		</div>
        	</div>
        </footer>

        <!-- Javascript -->
        <script src="<?php echo assets_url();?>/login_regis/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo assets_url();?>/login_regis/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo assets_url();?>/login_regis/js/jquery.backstretch.min.js"></script>
        <script src="<?php echo assets_url();?>/login_regis/js/scripts.js"></script>
        <script src="<?php echo assets_url();?>/login_regis/js/bootstrap-formhelpers-phone.js"></script>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>