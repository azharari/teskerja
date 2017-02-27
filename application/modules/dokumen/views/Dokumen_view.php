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
                    <strong><h4>Data Dokumen Mobil</strong>
                </div>
				
                <div class="box-body">
					<p>
						<button class="btn btn-success" onclick="tambah_mobil()"><i class="glyphicon glyphicon-plus"></i> Tambah Dokumen</button>
						<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
						<!--<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>-->
					</p>
					<table id="table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Id</th>
								<th>Jenis Dokumen</th>
								<th>Id Mobil</th>
								<th>File</th>
								<th>Keterangan</th>
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
                    <strong><h4></strong>
                </div>
					
					<?php echo site_url('')?>
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
                <h3 class="modal-title">Tambah Dokumen</h3>
            </div>
            <div class="modal-body form">
                <form method="POST" enctype="multipart/form-data" id="form" action="<?php echo site_url('Dokumen/Dokumen/tambah')?>" class="form-horizontal">
                    <div class="form-body">
						<div class="form-group" id="status" >
                            <label class="control-label col-md-3">ID Mobil</label>
                            <div class="col-md-9">
                                <select name="id_mobil" class="form-control">
									<?php
									foreach($Id_Mobil as $row)
									{
									?>
                                    <option value="<?php echo $row->Id_Mobil ?>"><?php echo $row->Id_Mobil ?> - <?php echo $row->Nama_Mobil ?></option>
									<?php
									}
									?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
						
                        <div class="form-group" id="status" >
                            <label class="control-label col-md-3">Jenis Dokumen</label>
                            <div class="col-md-9">
                                <select name="jenis_dokumen" class="form-control">
                                    <option value="BPKB">BPKB</option>
                                    <option value="STNK">STNK</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
						
                        <div class="form-group">
                            <label class="control-label col-md-3">Keterangan</label>
                            <div class="col-md-9">
                                <input name="keterangan" placeholder="Keterangan" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-md-3">File</label>
                            <div class="col-md-9">
                                <input type="file" name="file" class="form-control">
                            </div>
                        </div>
						
						
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
			</form>
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
            "url": "<?php echo site_url('Dokumen/Dokumen/ajax_list')?>",
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
    
    $('#modal_form').modal('show'); // show bootstrap modal
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
            url : "<?php echo site_url('Dokumen/Dokumen/delete')?>/"+Id_Mobil,
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

