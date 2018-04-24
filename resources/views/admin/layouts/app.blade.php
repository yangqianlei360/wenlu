<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>网站后台管理模版</title>
    <link rel="stylesheet" type="text/css" href="../../static/admin/layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="../../static/admin/css/admin.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.css"/>

    @yield('css')
</head>
<body>
@yield('content')
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('static/admin/layui/layui.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('static/admin/js/common.js')}}" type="text/javascript" charset="utf-8"></script>
<script>
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
</script>
@yield('js')
</body>
</html>
