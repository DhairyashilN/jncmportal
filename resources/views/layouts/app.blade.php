<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{-- <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/AdminLTE.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css') }}">
    <!-- DATA TABLES -->
    <link href="{{ asset('assets/css/datatables/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <!--Datepicker -->
    <link href="{{ asset('assets/css/datepicker/datepicker.css')}}" rel="stylesheet">
    <!--Select2 -->
    <link href="{{ asset('assets/css/select2/select2.min.css')}}" rel="stylesheet">
    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
</head>
<body class="skin-black">
        {{-- <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav> --}}

    @yield('content')

    <!-- Scripts -->
    {{-- <script src="{{ asset('assets/js/app.js') }}"></script> --}}
    
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/js/AdminLTE/app.js') }}" type="text/javascript"></script>
    <!-- Datepicker  -->
    <script src="{{ asset('assets/js/plugins/datepicker/datepicker.js') }}" type="text/javascript"></script>
    <!-- Select2  -->
    <script src="{{ asset('assets/js/plugins/select2/select2.min.js') }}" type="text/javascript"></script>
    <!--custom validations-->
    <script src="{{ asset('assets/js/validations.js') }}" type="text/javascript"></script>
    <!-- page script -->
    <script type="text/javascript">
        $(function() {
            $("#example1").dataTable();
            $('#example2').dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false
            });
        });
        // When the document is ready
        $(document).ready(function () {
            $('#enq_date,#followupdate').datepicker({
                format: "dd/mm/yyyy"
            });
            //select2 
            $('select').select2();                 
        });
        $('#machines').change(function(){
            $.ajax({
                type:'POST',
                data:{_token: '{{ csrf_token() }}',id:this.value},
                url:'{{url('/')}}'+'/getcount',
                success:function(data){
                    $('#machineCount').text(data);
                }
            });
        });
        $('#countries').change(function(){
            $.ajax({
                type:'POST',
                data:{_token: '{{ csrf_token() }}',id:this.value},
                url:'{{url('/')}}'+'/getcustomerbyCountry',
                success:function(data){
                    $('#CountryCustomersCount').text(data);
                }
            });
        });
        $('#cities').change(function(){
            $.ajax({
                type:'POST',
                data:{_token: '{{ csrf_token() }}',id:this.value},
                url:'{{url('/')}}'+'/getcustomerbyCity',
                success:function(data){
                    $('#CityCustomersCount').text(data);
                }
            });
        });
        //check for email availability
        $("#user_email").on('blur',function(){
            var email = $('#user_email').val();
            $.ajax({
                url:'{{url('/')}}'+'/checkuseremail',
                data:{_token: '{{ csrf_token() }}',email:email},
                type:'POST',
                success:function(data){
                    $('#email-warning').text(data);  
                }
            });
        });
        
    </script>
</body>
</html>
