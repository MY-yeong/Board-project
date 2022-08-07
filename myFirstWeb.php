<?php session_start(); ?>
<html lang="ko"> 
    <head>
        <title> 가입 창</title>
        <link rel="stylesheet" type="text/css" href="./css/default.css" />
        <meta charset = "utf-8">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<div class="simple-login-container">
    <h2>~ Welcome ~</h2>
    <form action="myFirstLogin.php" method="post" >

    <div class="row">
        <div class="col-md-12 form-group">
            <input type="text" class="form-control" name="id"  placeholder="ID">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <input type="password" name="pw" id="pw" placeholder="Password" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <input type="submit"  name="login" value="Login"class="btn btn-block btn-login" placeholder="Enter your Password" >
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="member_find.php">비밀번호 찾기</a><br>
            <a href="myFirstRegister.php">회원가입</a>
        </div>
    </div>
</div>
</form>
    </body>
</html>