

        </div><!-- ./wrapper -->
		

        <!-- Bootstrap -->
		<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
		
        <!-- jQuery UI 1.10.3 -->
		<script src="<?= base_url('assets/js/jquery-ui-1.10.3.min.js') ?>"></script>
        <!-- daterangepicker -->
		<script src="<?= base_url('assets/js/plugins/daterangepicker/daterangepicker.js') ?>"></script>

        <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- Director App -->
		<script src="<?= base_url('assets/js/Director/app.js') ?>"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
		<script src="<?= base_url('assets/js/Director/dashboard.js') ?>"></script>

        <!-- Director for demo purposes -->
        <script type="text/javascript">
            $('input').on('ifChecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().addClass('highlight');
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().removeClass('highlight');
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });

        </script>
        <script>
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
</script>
<!-- PIE Chart -->
	<script src="<?= base_url('assets/js/pie-chart/pie-chart-inc.js') ?>"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-3d.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
<!-- PIE Chart -->
</body>
</html>