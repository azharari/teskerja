<?php
$this->load->view('template/head');
?>

<?php
$this->load->view('template/topbar_no_collapse');
$this->load->view('template/sidebar');
?>


<!-- Content Header (Page header) -->
<section class="content-header">
   
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
   
    <div class="row">
        
       
    </div><!-- /.row -->
    
    <div class="row">
		
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header">
                    <strong><h4>Data Mobil Rental</strong>
                </div>
				
                <div class="box-body">
					<p>
						<button class="btn btn-success" onclick="tambah_mobil()"><i class="glyphicon glyphicon-plus"></i> Tambah Mobil</button>
						<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
						<a href="<?php echo site_url('Admin/Admin/excel')?>" class="btn btn-default" ><i class="glyphicon glyphicon-book"></i> Export to Excel</a>
						<!--<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>-->
					</p>
					<table id="table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Id Mobil</th>
								<th>Nama Mobil</th>
								<th>No Polisi</th>
								<th>Status</th>
								<th style="width:125px;">Action</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
 
					
					</table>
                </div><!-- /.box-body-->
            </div>  
        </div><!--/.col (right) -->
		<div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header">
                    <strong><h4>Approve Mobil</strong>
                </div>
						
                <div class="box-body">
				</div>
			</div>
		</div>
    </div>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Tambah Mobil</h3>
            </div>
            <div class="modal-body form">
                <form method="POST" enctype="multipart/form-data" id="form" action="#" class="form-horizontal">
                    <div class="form-body">
										
						<div class="form-group" Id="Id_Mobil" > 
                            <label class="control-label col-md-3">ID Mobil</label>
                            <div class="col-md-9">
                                <input name="Id_Mobil_Dis" class="form-control" type="text" disabled>
								<input name="Id_Mobil" class="form-control" type="hidden">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Mobil</label>
                            <div class="col-md-9">
                                <input name="Nama_Mobil" placeholder="Nama Mobil" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nomor Polisi</label>
                            <div class="col-md-9">
                                <input name="No_Polisi" placeholder="Nomor Polisi" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-md-3">Harga</label>
                            <div class="col-md-9">
                                <input name="Harga" placeholder="Harga" class="form-control" type="text">
                            </div>
                        </div>
						
						<div class="form-group" id="status" style="display:none;">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-9">
                                <select name="Status" class="form-control">
                                    <option value="Available">Available</option>
                                    <option value="Booking">Booking</option>
                                    <option value="Service">Service</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
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
    
</section><!-- /.content -->

<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Admin/Admin/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});

function tambah_mobil()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
	$('#Id_Mobil').hide();
    $('.modal-title').text('Tambah Mobil'); // Set Title to Bootstrap modal title
}

function tambah_dokumen()
{
	$('#modal_dokumen').modal('show');
	
}
function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
 
    if(save_method == 'add') {
        url = "<?php echo site_url('Admin/Admin/ajax_add')?>";
    } else {
        url = "<?php echo site_url('Admin/Admin/update')?>";
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
				swal("Success", "Transaksi data berhasil", "success");
                reload_table();
            }
 
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal("Oops...", "Terjadi kesalahan!", "error");
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}

function edit(Id_Mobil)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Admin/edit/')?>/" + Id_Mobil,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
			$('[name="Id_Mobil_Dis"]').val(data.Id_Mobil);
			$('[name="Id_Mobil"]').val(data.Id_Mobil);
            $('[name="Nama_Mobil"]').val(data.Nama_Mobil);
            $('[name="No_Polisi"]').val(data.No_Polisi);
			$('[name="Status"]').val(data.Status);
			 $('#status').show();
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Data Mobil'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            sweetAlert("Oops...", "Terjadi kesalahan!", "error");
        }
    });
}

function delete_mobil(Id_Mobil)
{
	swal({
		title: "Apa anda yakin ?",
		//text: "Data akan dihapus",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Ya, lanjutkan",
		cancelButtonText: "Tidak, batalkan",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm)
	{
		if (isConfirm) {
			$.ajax({
            url : "<?php echo site_url('Admin/delete')?>/"+Id_Mobil,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
				swal("Success", "Transaksi data berhasil", "success");
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                sweetAlert("Oops...", "Terjadi kesalahan!", "error");
            }
			});
			
		} 
		else 
		{
			swal("Batal", "Transaksi data dibatalkan", "error");
		}
	});
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
</script>
<?php
$this->load->view('template/js');
?>
    
<?php
$this->load->view('template/foot');
?>

