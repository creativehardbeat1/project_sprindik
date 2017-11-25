<?php

$user_id=$this->session->userdata('id_user');

if(!$user_id){
    redirect(base_url().index_page().'/Welcome');
}else{
    $username=$this->session->userdata('user_name');
    //echo '<h2 style="font-size:20pt">Username :'.$username.'</h1>';
    $status=$this->session->userdata('user_status');
    // echo '<h2 style="font-size:20pt">Level User :'.$status.'</h1>';
    $user_id=$this->session->userdata('id_user');
    //echo '<h2 style="font-size:20pt">User Id :'.$user_id.'</h1>';
} 
?>
<section>
     <div class="container">
        <h1 style="font-size:20pt">Data Peserta Diklat</h1>

        <br />
<!--         <button class="btn btn-success" onclick="add_calon()"><i class="glyphicon glyphicon-plus"></i> Tambah Calon</button>-->
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br /> 
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nama Peserta</th>
                    <th>Nama Diklat</th>
                    <th>Tgl Mulai</th>
                    <th>Tgl Selesai</th>
                    <th>Status Diklat</th>
                    <th>Status Peserta</th>
                    <th>Status Kegiatan</th>
        <?php
            if($status=="1"){ //level admin
        ?>
            <th style="width:125px;">Action</th>
            <?php
            }elseif($status=="2"){ //level pegawai sesuai id_usernya
            ?>
            <th style="width:125px;">Action</th>
        <?php   
            }elseif($status=="3"){ //level umum sesuai id_usernya
        ?>
            <!--<th style="width:125px;">Action</th> -->
        <?php   
            }else{
        ?>
        <?php
            };
        ?>                    
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
            "url": "<?php echo site_url('Peserta_diklat/ajax_list')?>",
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



// function add_calon_peserta()
// {
//     save_method = 'add';
//     $('#form')[0].reset(); // reset form on modals
//     $('.form-group').removeClass('has-error'); // clear error class
//     $('.help-block').empty(); // clear error string
//     $('#modal_form').modal('show'); // show bootstrap modal
//     $('.modal-title').text('Tambah calon_peserta'); // Set Title to Bootstrap modal title
// }

function edit_peserta_diklat(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('peserta_diklat/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="id_user"]').val(data.id_user);
            $('[name="id_diklat"]').val(data.id_diklat);                      
            $('[name="nama"]').val(data.nama);
            $('[name="umur"]').val(data.umur);
            $('[name="alamat"]').val(data.alamat);
            $('[name="email"]').val(data.email);
            $('[name="url_dok_ktp"]').val(data.url_dok_ktp);
            // $('[name="url_dok_ijazah"]').val(data.url_dok_ijazah);
            $('[name="no_mobile"]').val(data.no_mobile);
            $('[name="keterangan"]').val(data.keterangan);
            $('[name="tgl_mulai"]').datepicker('update',data.tgl_mulai);
            $('[name="tgl_selesai"]').datepicker('update',data.tgl_selesai);  
            $('[name="status_diklat"]').val(data.status_diklat);                      
            $('[name="catatan"]').val(data.catatan);
            $('[name="status_peserta"]').val(data.status_peserta);
            $('[name="status_kegiatan"]').val(data.status_kegiatan);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Persetujuan Dokumen'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
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
        // url = "<?php echo site_url('peserta_diklat/ajax_add')?>";
    } else {
        url = "<?php echo site_url('peserta_diklat/ajax_update')?>";
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

// function delete_calon_peserta(id)
// {
//     if(confirm('Anda yakin menghapus data ini?'))
//     {
//         // ajax delete data to database
//         $.ajax({
//             url : "<?php echo site_url('calon/ajax_delete')?>/"+id,
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
                <h3 class="modal-title">Form Peserta Diklat</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                                <input name="id" type="hidden">
                                <input name="id_user" type="hidden">
                                <input name="id_diklat" type="hidden">                    
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Peserta</label>
                            <div class="col-md-9">
                                <input name="nama" class="form-control" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Diklat</label>
                            <div class="col-md-9">
                                <input name="keterangan"  class="form-control" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Mulai</label>
                            <div class="col-md-9">
                                <input name="tgl_mulai" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">                                
                            <label class="control-label col-md-3">Tanggal Selesai</label>
                            <div class="col-md-9">
                                <input name="tgl_selesai" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Status Diklat</label>
                            <div class="col-md-9">
                                <input name="status_diklat"  class="form-control" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-md-3">Status Peserta</label>
                            <div class="col-md-9">
                                <select name="status_peserta" class="form-control">
                                    <option value="">--Pilih Status--</option>
                                    <option value="Hadir">Hadir</option>
                                    <option value="Tidak Hadir">Tidak Hadir</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>                                
                        <div class="form-group">
                            <label class="control-label col-md-3">Status Kegiatan</label>
                            <div class="col-md-9">
                                <select name="status_kegiatan" class="form-control">
                                    <option value="">--Pilih Status--</option>
                                    <option value="Sesuai Jadwal">Sesuai Jadwal</option>
                                    <option value="Ditunda">Ditunda</option>
                                    <option value="Dibatalkan">Dibatalkan</option>
                                </select>
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