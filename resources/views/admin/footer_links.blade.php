<!-- latest jquery-->
    <script src="{{asset('admin/js/jquery.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('admin/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('admin/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('admin/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- scrollbar js-->
    <script src="{{asset('admin/js/scrollbar/simplebar.js')}}"></script>
    <script src="{{asset('admin/js/scrollbar/custom.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset('admin/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <script src="{{asset('admin/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('admin/js/sidebar-pin.js')}}"></script>
    <script src="{{asset('admin/js/slick/slick.min.js')}}"></script>
    <script src="{{asset('admin/js/slick/slick.js')}}"></script>
    <script src="{{asset('admin/js/header-slick.js')}}"></script>
    <script src="{{asset('admin/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{asset('admin/js/chart/apex-chart/stock-prices.js')}}"></script>
    <script src="{{asset('admin/js/chart/apex-chart/moment.min.js')}}"></script>
    <script src="{{asset('admin/js/chart/echart/esl.js')}}"></script>
    <script src="{{asset('admin/js/chart/echart/config.js')}}"></script>
    <script src="{{asset('admin/js/chart/echart/pie-chart/facePrint.js')}}"></script>
    <script src="{{asset('admin/js/chart/echart/pie-chart/testHelper.js')}}"></script>
    <script src="{{asset('admin/js/chart/echart/pie-chart/custom-transition-texture.js')}}"></script>
    <script src="{{asset('admin/js/chart/echart/data/symbols.js')}}"></script>
    <!-- calendar js-->
    <script src="{{asset('admin/js/datepicker/date-picker/datepicker.js')}}"></script>
    <script src="{{asset('admin/js/datepicker/date-picker/datepicker.en.js')}}"></script>
    <script src="{{asset('admin/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
    <script src="{{asset('admin/js/dashboard/dashboard_3.js')}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('admin/js/script.js')}}"></script>
    {{-- <script src="{{asset('admin/js/theme-customizer/customizer.js')}}"></script> --}}
    {{-- CK-EDITOR --}}
    <script>
        document.querySelectorAll('[id^="ckeditor"]').forEach(function(element){
            CKEDITOR.replace(element); 
        });
    </script>
    
  </body>
</html>