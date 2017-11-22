<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajax CRUD with Bootstrap modals and Datatables</title>
    <link href="<?php echo assets_url();?>/datatables/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	</head>

<section>
	 <div class="container">
        <h1 style="font-size:20pt"><?php echo $judul ?></h1>
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Nomor Handphone</th>
					<th>Status</th>
                    <th style="width:125px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
	
</section>
<footer>						
			
</footer>
	</div>
</body>
</html>
	