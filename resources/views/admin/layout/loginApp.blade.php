
<!--
/********************************************************************************
 * laravel With ajax 
 *********************************************************************************
 * Author: Ultra Bytes
 * Email: 
 * Website: http://www.bytesultra.com/
 *
 * File:loginApp.blade.php (for login header)
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
    
</head>

<body>

    @yield('content')
   


</body>

<!-- jQuery library -->

<script src="{{ URL::asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('admin/js/metisMenu.min.js')}}"></script>
<script src="{{ URL::asset('admin/js/sb-admin-2.js')}}"></script>

</html>