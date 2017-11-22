<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Sistem Perekaman Diklat</title>
    <link href="<?php echo assets_url();?>/datatables/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	</head>

<section>
	 <div class="container">
        <p style="text-align: center"><h1 style="font-size:20pt" align="center"><?php echo $title ?></h1></p>
		</br>
		</br>
		
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%" border="1">
            <thead>
				<tr>
                    <th align="right" colspan="5">Tanggal Cetak :<?php $tgl=date("Y-m-d h:i:sa");echo $tgl;?> </th>
                </tr>
                <tr>
                    <th align="center">No </th>
					<th align="left">Nama Peserta </th>
                    <th align="left">Nama Diklat</th>
                    <th align="center">Tanggal Mulai</th>
					<th align="center">Tanggal Selesai</th>
                    
                </tr>
				
            </thead>
            <tbody>
			<?php $no=0; foreach($qbarang as $rbarang){
				$no++;
				?>
				<tr>
					<td  align="center"><?php echo $no;?></td>
					<td align="left"><?php echo $rbarang->nama;?></td>
					<td align="left"><?php echo $rbarang->keterangan;?></td>
					<td align="center"><?php echo $rbarang->tgl_mulai;?></td>
					<td align="center"><?php echo $rbarang->tgl_selesai;?></td>
				</tr>
				<?php }?>
            </tbody>
        </table>
    </div>
	
</section>
<footer>						
			
</footer>
	</div>
</body>
</html>
	