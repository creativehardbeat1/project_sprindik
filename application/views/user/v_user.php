<section>
<?php

$user_id=$this->session->userdata('id_user');
$status=$this->session->userdata('user_status');

if(!$user_id){
	redirect(base_url().index_page().'/Welcome');
}else{
	$username=$this->session->userdata('user_name');
	//echo '<h2 style="font-size:20pt">Username :'.$username.'</h1>';
	$status=$this->session->userdata('user_status');
//	echo '<h2 style="font-size:20pt">Level User :'.$status.'</h1>';
	$user_id=$this->session->userdata('id_user');
//	echo '<h2 style="font-size:20pt">User Id :'.$user_id.'</h1>';

} 
?>
	 <div class="container">
        <h1 style="font-size:20pt"><?php echo $judul ?></h1>
        <br/>
		
		
		<?php if ($status=="1"){?>
		<button class="btn btn-success" onclick="add_user()"><i class="glyphicon glyphicon-plus"></i> Tambah Pengguna</button>
		<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>

		<?php }elseif ($status=="2"){ ?>
		<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
		<?php }elseif ($status=="3"){ ?>
		<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
		<?php }else{ ?>
			
		<?php } ?> 
     
	
        <br/>
        <br/>
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

<script src="<?php echo assets_url();?>/datatables/jquery/jquery-2.1.4.min.js"></script>
<script src="<?php echo assets_url();?>/datatables/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo assets_url();?>/datatables/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo assets_url();?>/datatables/datatables/js/dataTables.bootstrap.js"></script>
<script src="<?php echo assets_url();?>/datatables/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo assets_url();?>/login_regis/js/bootstrap-formhelpers-phone.js"></script>


<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('user/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

});



function add_user()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Pengguna'); // Set Title to Bootstrap modal title
}

function edit_user(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('user/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id_user);
            $('[name="username"]').val(data.username);
			$('[name="password"]').val(data.password);
			$('[name="status"]').val(data.status);
            $('[name="email"]').val(data.email);
            $('[name="no_mobile"]').val(data.no_mobile);
			$('[name="flag_status"]').val(data.flag_status);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Pengguna'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Gagal Menampilkan Data');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('user/ajax_add')?>";
    } else {
        url = "<?php echo site_url('user/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_user(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('user/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Gagal menghapus data');
            }
        });

    }
}

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				
				<h3 class="modal-title">Form User Pengguna</h3>
               
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Username</label>
                            <div class="col-md-9">
                                <input name="username" placeholder="Username Minimal 4 karakter dan maksimal 15 karakter " class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-9">
                                <input name="password" placeholder="Password" class="form-control" type="password">
                                <span class="help-block"></span>
                            </div>
                        </div>
						<?php if ($status=="1"){?>
						<div class="form-group">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-9">
                                <select name="status" class="form-control">
                                    <option value="">--Pilih Status--</option>
                                    <option value="1">Administrator</option>
									 <option value="2">Pegawai</option>
                                    <option value="3">Umum</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>

						<?php }elseif ($status=="2"){ ?>
							
						<?php }elseif ($status=="3"){ ?>
							
						<?php }else{ ?>
							
						<?php } ?> 
						

                        
                        <div class="form-group">
                            <label class="control-label col-md-3">E-mail</label>
                            <div class="col-md-9">
                                <textarea name="email" placeholder="E-mail" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3">Nomor Handphone</label>
                            <div class="col-md-9">
                            <input type="text" class="input-medium bfh-phone form-control" data-format="+62 (ddd) ddd-dddd" name="no_mobile" placeholder="Nomor Handphone..." >
<!--                                 <textarea name="no_mobile" placeholder="Nomor Handphone" class="form-control"></textarea> -->
                                <span class="help-block"></span>
                            </div>
                        </div>
						<?php if ($status=="1"){?>
						<div class="form-group">
                            <label class="control-label col-md-3">Flag Status</label>
                            <div class="col-md-9">
                                <select name="flag_status" class="form-control">
                                    <option value="">--Pilih Flag Status--</option>
                                    <option value="1">Aktif</option>
                                    <option value="2">Non Aktif</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>

						<?php }elseif ($status=="2"){ ?>
							
						<?php }elseif ($status=="3"){ ?>
							
						<?php }else{ ?>
							
						<?php } ?> 
						
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
	
</section>
		