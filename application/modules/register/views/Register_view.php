<?php
$this->load->view('template/head');
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
		
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header">
						<center><strong><h2>New Customer Register Form</strong></center>
                </div>
				
                <div class="box-body">
					<form method="POST" enctype="multipart/form-data" id="form" action="#" class="form-horizontal">
					<div class="form-group">
                      <label for="exampleInputEmail1">Nama Lengkap</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" Name="Nama" >
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" Name="Username" >
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Password</label>
                      <input type="password" class="form-control" id="exampleInputEmail1" Name="Password" >
                    </div>
					</form>
					<center><button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                </div><!-- /.box-body-->
            </div>  
        </div><!--/.col (right) -->
		
    </div>


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
  
    var url;
 
    url = "<?php echo site_url('Register/Register/ajax_add')?>";
 
 
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
				swal("Success", "Silahkan menuju halaman login", "success");
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

</script>
<?php
$this->load->view('template/js');
?>
    
<?php
$this->load->view('template/foot');
?>

