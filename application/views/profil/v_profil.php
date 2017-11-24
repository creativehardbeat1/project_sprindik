<section>
     <div class="container">
        <h1 style="font-size:20pt">Profil</h1>

        <!-- <h3>Profil Data</h3> -->
        <br />
<!--         <button class="btn btn-success" onclick="add_profil()"><i class="glyphicon glyphicon-plus"></i> Tambah Profil</button>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br /> -->
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <!-- <th>Id User</th> -->
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>URL KTP</th>
                    <th>URL Ijazah</th>
                    <!-- <th>time creation</th> -->
                    <th>Nomor HP</th>
                    <th style="width:125px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

<!--             <tfoot>
            <tr>
                <th>Id User</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>URL KTP</th>
                <th>URL Ijazah</th>
                <th>time creation</th>
                <th>Action</th>
            </tr>
            </tfoot> -->
        </table>
<?php //var_dump($this->profil);?>
<?php //echo $profil->nama; ?>
<?php ?>
<div class="container">
<div class="row">
<div class="col-md-10 ">
<form class="form-horizontal">
<fieldset>
<!-- Form Name -->
<legend>Profil</legend> 
    <div class="form-group">
      <label class="col-md-4 control-label" for="Nama Lengkap">Nama Lengkap</label>  
      <div class="col-md-4">
     <div class="input-group">
           <div class="input-group-addon">
            <i class="fa fa-user"></i>
           </div>
           <input id="nama" name="Nama Lengkap" type="text" placeholder="Nama Lengkap" class="form-control input-md">
          </div>   
      </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label" for="Umur">Umur</label>  
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-addon">
                <i class="fa fa-birthday-cake"></i>
                </div>
                <input id="umur" name="Umur" type="text" placeholder="Umur" class="form-control input-md">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label col-xs-12" for="Alamat Rumah">Alamat Rumah</label>  
        <div class="col-md-4">
            <input id="alamat" name="Alamat Rumah" type="text" placeholder="Alamat Rumah" class="form-control input-md ">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label" for="Email Address">Email</label>  
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-addon">
                <i class="fa fa-envelope-o"></i>
                </div>
            <input id="email" name="Email Address" type="text" placeholder="Email Address" class="form-control input-md">
            </div>
        </div>
    </div>            
    <div class="form-group">
        <label class="col-md-4 control-label" for="Upload KTP">Upload KTP</label>
        <div class="col-md-4">
            <input id="ktp" name="Upload KTP" class="input-file" type="file">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label" for="Upload Ijazah">Upload Ijazah</label>
        <div class="col-md-4">
            <input id="ijazah" name="Upload Ijazah" class="input-file" type="file">
        </div>
    </div>    
    <div class="form-group">
        <label class="col-md-4 control-label" for="Nomor HP ">Nomor HP</label>  
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-addon">
                <i class="fa fa-phone"></i>
                </div>
                <input id="no_mobile" name="Nomor HP " type="text" placeholder="Nomor HP " class="form-control input-md">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" ></label>  
        <div class="col-md-4">
        <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Update</a>
<!--         <a href="#" class="btn btn-danger" value=""><span class="glyphicon glyphicon-remove-sign"></span> Cancel</a> -->
        </div>
    </div>

</fieldset>
</form>
</div>
<div class="col-md-2 hidden-xs">
    <img src="http://websamplenow.com/30/userprofile/images/avatar.jpg" class="img-responsive img-thumbnail ">
</div>
</div>
</div>

    </div>

<script src="<?php echo assets_url();?>/datatables/jquery/jquery-2.1.4.min.js"></script>
<script src="<?php echo assets_url();?>/datatables/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo assets_url();?>/datatables/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo assets_url();?>/datatables/datatables/js/dataTables.bootstrap.js"></script>
<script src="<?php echo assets_url();?>/datatables/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>


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
            "url": "<?php echo site_url('profil/ajax_list')?>",
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



// function add_profil()
// {
//     save_method = 'add';
//     $('#form')[0].reset(); // reset form on modals
//     $('.form-group').removeClass('has-error'); // clear error class
//     $('.help-block').empty(); // clear error string
//     $('#modal_form').modal('show'); // show bootstrap modal
//     $('.modal-title').text('Tambah Profil'); // Set Title to Bootstrap modal title
// }

function edit_profil(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('profil/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="id_user"]').val(data.id_user);
            $('[name="nama"]').val(data.nama);
            $('[name="umur"]').val(data.umur);
            $('[name="alamat"]').val(data.alamat);
            $('[name="email"]').val(data.email);
            $('[name="url_dok_ktp"]').val(data.url_dok_ktp);
            $('[name="url_dok_ijazah"]').val(data.url_dok_ijazah);
            $('[name="time_creation"]').datepicker('update',data.time_creation);
            $('[name="no_mobile"]').val(data.no_mobile);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Ubah Profil'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

// function reload_table()
// {
//     table.ajax.reload(null,false); //reload datatable ajax 
// }

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('profil/ajax_add')?>";
    } else {
        url = "<?php echo site_url('profil/ajax_update')?>";
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

// function delete_profil(id)
// {
//     if(confirm('Anda yakin menghapus data ini?'))
//     {
//         // ajax delete data to database
//         $.ajax({
//             url : "<?php echo site_url('profil/ajax_delete')?>/"+id,
//             type: "POST",
//             dataType: "JSON",
//             success: function(data)
//             {
//                 //if success reload ajax table
//                 $('#modal_form').modal('hide');
//                 reload_table();
//             },
//             error: function (jqXHR, textStatus, errorThrown)
//             {
//                 alert('Error deleting data');
//             }
//         });

//     }
// }

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Profil</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
<!--                         <div class="form-group">
                            <label class="control-label col-md-3">ID User</label>
                            <div class="col-md-9">
                                <input name="id_user" placeholder="ID User" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-9">
                                <input name="nama" placeholder="Nama" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Umur</label>
                            <div class="col-md-9">
                                <input name="umur" placeholder="Umur" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-9">
                                <textarea name="alamat" placeholder="Alamat" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input name="email" placeholder="Email" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Upload KTP</label>
                            <div class="col-md-9">
                                <input name="url_dok_ktp" placeholder="Upload KTP" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Upload Ijazah</label>
                            <div class="col-md-9">
                                <input name="url_dok_ijazah" placeholder="Upload Ijazah" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
<!--                         <div class="form-group">
                            <label class="control-label col-md-3">Time Creation</label>
                            <div class="col-md-9"> -->
                                <input name="time_creation" placeholder="yyyy-mm-dd" class="form-control datepicker" type="hidden">
<!--                                 <span class="help-block"></span>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label class="control-label col-md-3">Nomor HP</label>
                            <div class="col-md-9">
                                <input name="no_mobile" placeholder="Nomor HP" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
    
</section>
        