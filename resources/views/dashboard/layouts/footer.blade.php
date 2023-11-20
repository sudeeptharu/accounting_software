<footer class="main-footer">
    <strong>Copyright &copy; 2021-{{ now()->format('Y') }} <a href="http://innovations.prabidhee.com" target="_blank">Prabidhee Innovations</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
{{--    <!-- Control sidebar content goes here -->--}}
</aside>
{{--<!-- /.control-sidebar -->--}}
</div>
{{--<!-- ./wrapper -->--}}


{{--<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->--}}
{{--<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>--}}
{{--<!-- Bootstrap 4 -->--}}
<script src="{{url('/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
{{--<!-- ChartJS -->--}}
<script src="{{url('/backend/plugins/chart.js/Chart.min.js')}}"></script>

{{-- XLSX libraby --}}
<script src="{{ url('/backend/plugins/xlsx/xlsx.full.min.js') }}"></script>

{{--<!-- daterangepicker -->--}}
<script src="{{url('/backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('/backend/plugins/daterangepicker/daterangepicker.js')}}"></script>

{{--<!-- Tempusdominus Bootstrap 4 -->--}}
<script src="{{ url('/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

{{--Datatables--}}
<script src="{{url('/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
{{--select 2--}}
<script src="{{url('/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{url('/backend/plugins/select2/js/select2.full.min.js')}}"></script>

{{--<script src="{{url('/backend/plugins/bootstrap-toggle/js/bootstrap-toggle.js')}}"></script>--}}

{{--<script src="{{url('js/forms/validation/jqBootstrapValidation.js')}}"></script>
<script src="{{url('js/forms/validation/form-validation.js')}}"></script>--}}
{{--form validation--}}

{{--<!-- Bootstrap Switch -->--}}
<script src="{{url('/backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
{{--<!-- Summernote -->--}}
{{--<script src="{{url('/backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
--}}{{--<!-- overlayScrollbars -->--}}{{--
<script src="{{url('/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>--}}

{{--<!-- AdminLTE App -->--}}
<script src="{{url('/backend/dist/js/adminlte.js')}}"></script>
{{--<!-- AdminLTE dashboard demo (This is only for demo purposes) -->--}}
{{--<script src="{{url('dist/js/pages/dashboard.js')}}"></script>--}}
<script src="{{url('/backend/dist/js/sweetalert.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/requirejs@2.3.6/require.js"></script>

<script src="{{url('backend/dist/js/shared.js')}}"></script>

<script>
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @php
        Session::forget('success');
    @endphp
    @endif

    @if(Session::has('customError'))
    toastr.error("{{ Session::get('customError') }}");
    @php
        Session::forget('CustomError');
    @endphp
    @endif

    @if(Session::has('update'))
    toastr.success("{{ Session::get('update') }}");
    @php
        Session::forget('update');
    @endphp
    @endif

    @if(Session::has('destroy'))
    toastr.success("{{ Session::get('destroy') }}");
    @php
        Session::forget('destroy');
    @endphp
    @endif

    @if($errors->any())
    @foreach( array_reverse($errors->all()) as $error )
    toastr.error("{{ $error }}");
    @endforeach
    @endif

</script>

</body>
</html>
