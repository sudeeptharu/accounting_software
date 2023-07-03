<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $name }}</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    {{--fontawesome 6--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    {{--<!-- Font Awesome -->--}}
    <link rel="stylesheet" href="{{url('/backend/plugins/fontawesome-free/css/all.min.css')}}">
    {{--<!-- Ionicons -->--}}
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    {{--<!-- Tempusdominus Bootstrap 4 -->--}}
    <link rel="stylesheet"
          href="{{url('/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    {{--<!-- iCheck -->--}}
    <link rel="stylesheet" href="{{url('/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    {{--<!-- JQVMap -->--}}
    <link rel="stylesheet" href="{{url('/backend/plugins/jqvmap/jqvmap.min.css')}}">
    {{--<!-- overlayScrollbars -->--}}
    {{--<link rel="stylesheet" href="{{url('/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">--}}
    {{--Datatables--}}
    <link rel="stylesheet" href="{{url('/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    {{--select 2--}}
    <link rel="stylesheet" href="{{url('/backend/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    {{--<!-- Daterange picker -->--}}
    <link rel="stylesheet" href="{{url('/backend/plugins/daterangepicker/daterangepicker.css')}}">

    @if ($name == "Report")
    <script src="{{ url("/backend/plugins/google-chart/loader.js") }}"></script>
    <script>google.charts.load('current', { 'packages': ['corechart'] });</script>
    @endif

    {{--<!-- jQuery -->--}}
    <script src="{{url('/backend/plugins/jquery/jquery.min.js')}}"></script>

    {{--<!-- Toastr -->--}}
    <script src="{{ url('/backend/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ url('/backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <link rel="stylesheet" href="{{ url('/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ url('/backend/plugins/toastr/toastr.min.css') }}">

    {{--custom style--}}
    <link rel="stylesheet" href="{{url('/backend/dist/css/custom-style.css')}}">

    {{--<!-- Theme style -->--}}
    <link rel="stylesheet" href="{{url('/backend/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{url('/backend/dist/css/custom-style.css')}}">

    {{--<!-- jQuery UI 1.11.4 -->--}}
    <script src="{{url('/backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">

