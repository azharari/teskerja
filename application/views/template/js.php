</div><!-- /.content-wrapper -->


</div>

<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js') ?>" ></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/slimScroll/jquery.slimScroll.min.js') ?>" ></script>
<!-- FastClick -->
<script src='<?php echo base_url('assets/AdminLTE-2.0.5/plugins/fastclick/fastclick.min.js') ?>'></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/app.min.js') ?>" ></script>

<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/flot/jquery.flot.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/flot/jquery.flot.resize.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/flot/jquery.flot.pie.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/flot/jquery.flot.categories.min.js') ?>"></script>

<script src="<?php echo base_url('assets/sweetalert/sweetalert.min.js') ?>"></script>

<!--Datatable-->
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js') ?>" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
	
<script type="text/javascript" charset="utf-8">
  $('#myDataTable').dataTable( {
        processing: true,
        serverSide: true,
        ajax: {
            "url": "delivery/barang_keluar/dataTable",
            "type": "POST"
        }
    }); </script>
    
<script type="text/javascript">
        function ajaxSearch() {
            var input_data = $('#search_data').val();
            if (input_data.length === 0) {
                $('#suggestions').hide();
            } else {

                var post_data = {
                    'search_data': input_data,
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>adk/performing_loan/main/autocomplete",
                    data: post_data,
                    success: function(data) {
                        // return success
                        if (data.length > 0) {
                            $('#suggestions').show();
                            $('#autoSuggestionsList').addClass('auto_list');
                            $('#autoSuggestionsList').html(data);
                        }
                    }
                });

            }
        }
</script>

    <script src="<?php echo base_url('assets/jquery.dataTables.js') ?>"></script>