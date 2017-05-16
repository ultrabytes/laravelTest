<!--
/********************************************************************************
 * laravel With ajax 
 *********************************************************************************
 * Author: Ultra Bytes
 * Email: 
 * Website: http://www.bytesultra.com/
 *
 * File:app.blade.php (admin header and footer)
 * Version: 1.0
 * Copyright: (c) 2017 - Ultra Bytes
 * You are free to use, distribute, and modify this software
 * under the terms of the GNU General Public License. See the
 * included license.txt file.
 *
 ********************************************************************************/
 -->


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

    <title>Reviews</title>
 <!-- Latest compiled and minified CSS -->
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ URL::asset('admin/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('admin/css/metisMenu.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('admin/css/sb-admin-2.css')}}">
<link rel="stylesheet" href="{{ URL::asset('admin/css/font-awesome.min.css')}}">
<script src="{{ URL::asset('admin/js/jquery.min.js')}}"></script>
  	<!-- include the BotDetect layout stylesheet -->

</head>
<body>
    <div id="wrapper">
 <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               
              
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                   
                        <li class="divider"></li>
                        <li><a href="{{url('/admin/logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                    
                        <li>
                            <a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
               
                        <li>
                            <a href="{{url('admin/reviews')}}"><i class="fa fa-table fa-fw"></i> Reviews</a>
                        </li>
                    
                    
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


    @yield('content')

</div>
</body>

<!-- jQuery library -->

<script src="{{ URL::asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('admin/js/metisMenu.min.js')}}"></script>
<script src="{{ URL::asset('admin/js/sb-admin-2.js')}}"></script>

@yield('scripts')

</html>