<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{asset('assets')}}/global/plugins/respond.min.js"></script>
<script src="{{asset('assets')}}/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="{{asset('assets')}}/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{asset('assets')}}/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('assets')}}/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   //Demo.init(); // init demo(theme settings page)
   //Index.init(); // init index page
   //Tasks.initDashboardWidget(); // init tash dashboard widget
});
</script>