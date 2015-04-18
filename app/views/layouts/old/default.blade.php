<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
  @include('includes.head')
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">
    <!-- BEGIN TOP BAR -->
    @include('includes.topbar')
    <!-- END TOP BAR -->
    <!-- BEGIN HEADER -->
    @include('includes.header')
    <!-- Header END -->

    <!-- BEGIN SLIDER -->
    <!-- END SLIDER -->

    <div class="main">
      <div class="container first-main-container">
      @yield('content')
      </div>
    </div>

    @include('includes.footer')

    @include('includes.footerjs')
</body>
<!-- END BODY -->
</html>