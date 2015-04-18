<!-- BEGIN CORE PLUGINS  -->
    <!--[if lt IE 9]>
    <script src="{{asset('assets')}}/global/plugins/respond.min.js"></script>
    <![endif]--> 
    <script src="{{asset('assets')}}/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="{{asset('assets')}}/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="{{asset('assets')}}/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="{{asset('assets')}}/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS  -->
    <!--<script src="{{asset('assets')}}/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>--><!-- slider for products -->
	<script src="{{asset('assets')}}/frontend/layout/scripts/layout.js" type="text/javascript"></script>
	<script src="{{asset('assets')}}/global/scripts/metronic-frontend.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init(); 
            Metronic.init();   
            Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
            //Layout.initNavScrolling();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
    @section('js')
    @show