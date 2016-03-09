<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!--Head-->
<head>
    <meta charset="utf-8" />
    <title>Login Page</title>

    <meta name="description" content="login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/admin/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="assets/admin/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="assets/admin/css/font-awesome.min.css" rel="stylesheet" />

    <!--Beyond styles-->
    <link id="beyond-link" href="assets/admin/css/beyond.min.css" rel="stylesheet" />
    <link href="assets/admin/css/demo.min.css" rel="stylesheet" />
    <link href="assets/admin/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="assets/admin/js/skins.min.js"></script>
</head>
<!--Head Ends-->
<!--Body-->
<body>
<div class="login-container animated fadeInDown" style="height: auto !important;">
    <form method="post">
        {!! csrf_field() !!}
        <div class="loginbox bg-white" style="height: auto !important;">
            <div class="loginbox-title">后台登录</div>
            <div class="loginbox-textbox">
                <input type="text" name="name" class="form-control" placeholder="用户名" />
            </div>
            <div class="loginbox-textbox">
                <input type="password" name="password" class="form-control" placeholder="密码" />
            </div>
            <div class="loginbox-submit">
                <input type="submit" class="btn btn-primary btn-block" value="登录">
            </div>
        </div>
        <div class="logobox">
        </div>
    </form>
</div>

<!--Basic Scripts-->
<script src="assets/admin/js/jquery-2.0.3.min.js"></script>
<script src="assets/admin/js/bootstrap.min.js"></script>

<!--Beyond Scripts-->

</body>
<!--Body Ends-->
</html>
