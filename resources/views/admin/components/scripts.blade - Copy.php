<script src="{{ asset('admin-assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin-assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin-assets/libs/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('admin-assets/libs/datatables/datatables.min.js') }}"></script>
{{-- <script src="{{ asset('admin-assets/libs/chart.js/Chart.min.js') }}"></script> --}}
{{-- <script src="{{ asset('admin-assets/js/demo/chart-area-demo.js') }}"></script> --}}
{{-- <script src="{{ asset('admin-assets/js/demo/chart-pie-demo.js') }}"></script> --}}
<script src="{{ asset('admin-assets/js/custom.js') }}"></script>
<script src="{{ asset("admin-assets/js/sweetalert2.all.min.js") }}"></script>
<script src="{{ asset("admin-assets/js/pages/common.js") }}"></script>
<script src="{{ asset("admin-assets/js/pages/modals.js") }}"></script>
<script src="{{ asset("admin-assets/js/select2.full.min.js") }}"></script>
@yield('script')
@stack('script')