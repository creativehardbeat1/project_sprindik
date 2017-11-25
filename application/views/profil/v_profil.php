        <?php 
if (isset($query)){
		$c_nama=$query->nama;
		$c_umur=$query->umur;
		$c_alamat=$query->alamat;
		$c_email=$query->email;
		$c_nomorhp=$query->no_mobile;
		$c_urlktp=$query->url_dok_ktp;
}else{
	$c_nama='';
		$c_umur='';
		$c_alamat='';
		$c_email='';
		$c_nomorhp='';
		$c_urlktp='';
		
}
?>
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


    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                   <div class="row" >
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1>Profil</h1>
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
	                        		
	                        		<div class="form-top-right">
	                        			<i class="fa fa-key"></i>
	                        		</div>
	                            </div>
	                            
		                    </div> 
		                
		                	
	                        
                        </div>
                        
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                        	
                        <div class="col-sm-6">
						<div class="form-top-left">
	                        			
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
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Update Profil</h3>
	                            		<p>Isi data lengkap anda:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="<?php echo base_url().index_page();?>/web/insert_upload" method="post" class="registration-form" enctype="multipart/form-data">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-first-name">Nama Lengkap</label>
				                        	<input type="text" name="nama" placeholder="Nama Lengkap" class="form-first-name form-control" id="form-first-name"  value="<?php echo $c_nama;?>">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Umur</label>
				                        	<input type="text" name="umur" placeholder="Umur" class="form-last-name form-control" id="form-last-name"  value="<?php echo $c_umur;?>">
				                        </div>
										<div class="form-group">
				                        	<input type="hidden" name="status" value="3">
				                        </div>
										<div class="form-group">
				                        	<input type="hidden" name="flag" value="1">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-email">Alamat Rumah</label>
				                        	
											<textarea name="alamat" placeholder="Alamat Rumah" class="form-first-name form-control" id="form-first-name"><?php echo $c_alamat;?></textarea>
											
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">Email</label>
				                        	<input type="text" name="email" placeholder="Email" class="form-first-name form-control" id="form-first-name"  value="<?php echo $c_email;?>">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">Nomor Handphone</label>
				                        	<input type="text" name="nomorhp" placeholder="Nomor Handphone" class="form-first-name form-control" id="form-first-name"  value="<?php echo $c_nomorhp;?>">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">Upload KTP</label>
											<input id="form-first-name" name="ktp" class="input-file" type="file"><?=$c_urlktp?>
											
				                        </div>
										
				                        
				                        <button type="submit" class="btn">Update</button>
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
        				<p>Made by Anli Zaimi at <a href="http://azmind.com" target="_blank"><strong>AZMIND</strong></a> 
        					having a lot of fun. <i class="fa fa-smile-o"></i></p>
        			</div>
        			
        		</div>
        	</div>
        </footer>

        <!-- Javascript -->
        <script src="<?php echo assets_url();?>/login_regis/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo assets_url();?>/login_regis/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo assets_url();?>/login_regis/js/jquery.backstretch.min.js"></script>
       <!-- <script src="<?php echo assets_url();?>/login_regis/js/scripts.js"></script> -->
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>