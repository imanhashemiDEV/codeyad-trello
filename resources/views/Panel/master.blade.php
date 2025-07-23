<!DOCTYPE html>
<html class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" data-assets-path="assets/" data-template="vertical-menu-template-starter" data-theme="theme-default" dir="rtl" lang="fa">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قالب مدیریت</title>
    <meta content="" name="description"/>
    <!-- Favicon -->
    <link href="{{url('assets/img/favicon/favicon.ico')}}" rel="icon" type="image/x-icon"/>
    <link href="{{url('assets/vendor/fonts/tabler-icons.css')}}" rel="stylesheet"/>
    <!-- Core CSS -->
    <link class="template-customizer-core-css" href="{{url('assets/vendor/css/rtl/core.css')}}" rel="stylesheet"/>
    <link class="template-customizer-theme-css" href="{{url('assets/vendor/css/rtl/theme-default.css')}}" rel="stylesheet"/>
    <link href="{{url('assets/css/demo.css')}}" rel="stylesheet"/>
    <!-- Vendors CSS -->
    <link href="{{url('assets/vendor/libs/node-waves/node-waves.css')}}" rel="stylesheet"/>
    <link href="{{url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{url('assets/vendor/libs/animate-css/animate.css')}}" />
    <link rel="stylesheet" href="{{url('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="{{url('assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{url('assets/js/config.js')}}"></script>
    <!-- Better experience of RTL -->
    <link href="{{url('assets/css/rtl.css')}}" rel="stylesheet"/>
    @livewireStyles

</head>

<body class="p-4">
<!-- Layout wrapper -->
<!-- Layout container -->
         {{$slot}}
<!-- / Layout wrapper -->
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{url('assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{url('assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{url('assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{url('assets/vendor/libs/node-waves/node-waves.js')}}"></script>
<script src="{{url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{url('assets/vendor/libs/hammer/hammer.js')}}"></script>
<script src="{{url('assets/vendor/js/menu.js')}}"></script>
<!-- endbuild -->
<!-- Vendors JS -->
<!-- Main JS -->
<script src="{{url('assets/js/main.js')}}"></script>
<script src="{{url('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<!-- Page JS -->
@livewireScripts
<script src="{{url('assets/js/livewire-sortable.js')}}"></script>
</body>
</html>
