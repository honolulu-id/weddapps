    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/plugins/bower_components/jquery/dist/jquery.min.js')?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')?>"></script>
    <!--Counter js -->
    <script src="<?php echo base_url('assets/plugins/bower_components/waypoints/lib/jquery.waypoints.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/bower_components/counterup/jquery.counterup.min.js')?>"></script>
    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url('assets/js/jquery.slimscroll.js')?>"></script>
    
    <!--Wave Effects -->
    <script src="<?php echo base_url('assets/js/waves.js')?>"></script>
    <!-- Vector map JavaScript -->
    <script src="<?php echo base_url('assets/plugins/bower_components/vectormap/jquery-jvectormap-2.0.2.min.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/bower_components/vectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/bower_components/vectormap/jquery-jvectormap-in-mill.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/bower_components/vectormap/jquery-jvectormap-us-aea-en.js')?>"></script>
    <!-- chartist chart -->
    <script src="<?php echo base_url('assets/plugins/bower_components/chartist-js/dist/chartist.min.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')?>"></script>
    <!-- sparkline chart JavaScript -->
    <script src="<?php echo base_url('assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js')?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/js/custom.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/dashboard3.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js')?>"></script>
    <script src="<?php echo base_url();?>assets/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script src="<?php echo base_url();?>assets/js/toastr.js"></script>


    <!--Style Switcher -->
    <script src="<?php echo base_url('assets/plugins/bower_components/sweetalert/sweetalert.min.js') ?>"></script>
    <script src="<?php echo base_url('js/header.js') ?>"></script>
    <script>var base_url = '<?php echo base_url() ?>';</script>
    

    <!-- DATA TABLE HERE -->
    <script src="<?php echo base_url();?>assets/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->

    <script src="<?php echo base_url();?>assets/plugins/bower_components/moment/moment.js"></script>
    
    <script src="<?php echo base_url();?>assets/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
    <!-- TinyMCE script -->
    <script src='<?= base_url(); ?>resources/tinymce/tinymce.min.js'></script>
    <script src="<?php echo base_url();?>js/cbpFWTabs.js"></script>
    
    <!-- Script -->
    <script>
        tinymce.init({ 
          selector:'textarea',
          theme: 'modern',
          height: 200,
          setup: function (editor) {
        editor.on('change', function () {
            tinymce.triggerSave();
        });
    }
      });
    
  </script>



  <!--Style Switcher -->
  <!-- END DATA TABLE HERE -->
</body>

</html>