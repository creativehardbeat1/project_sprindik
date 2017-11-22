<section>
     <div class="container">
        <h1 style="font-size:20pt">Data Calon Peserta</h1>

        <br />
<!--         <button class="btn btn-success" onclick="add_calon()"><i class="glyphicon glyphicon-plus"></i> Tambah Calon</button>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br /> -->
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID User</th>
                    <th>ID Diklat</th>
                    <th>Status</th>
<!--                    <th style="width:125px;">Action</th> -->
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
            "url": "<?php echo site_url('calon/ajax_list')?>",
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



function add_calon()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Calon'); // Set Title to Bootstrap modal title
}

function edit_calon(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('calon/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="id_user"]').val(data.id_user);
            $('[name="id_diklat"]').val(data.id_diklat);                      
            $('[name="status"]').val(data.status);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Ubah Calon'); // Set title to Bootstrap modal title

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
        url = "<?php echo site_url('calon/ajax_add')?>";
    } else {
        url = "<?php echo site_url('calon/ajax_update')?>";
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

function delete_calon(id)
{
    if(confirm('Anda yakin menghapus data ini?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('calon/ajax_delete')?>/"+id,
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
                alert('Error deleting data');
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
                <h3 class="modal-title">Form Calon Peserta</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">ID User</label>
                            <div class="col-md-9">
                                <input name="id_user" placeholder="ID User" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">ID Diklat</label>
                            <div class="col-md-9">
                                <input name="id_diklat" placeholder="ID Diklat" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>                     
                        <div class="form-group">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-9">
                                <select name="status" class="form-control">
                                    <option value="">--Pilih Status--</option>
                                    <option value="0">Calon Baru</option>
                                    <option value="1">Persetujuan 1</option>
                                    <option value="2">Persetujuan 2</option>
                                    <option value="3">Disetujui</option>
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
        