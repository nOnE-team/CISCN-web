<?php
    session_start();
    error_reporting(0);
    if($_SESSION['islogin'])
    {
        header("location:upload.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>炫酷UI,登录就送</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="js/jquery.min.js"></script>

</head>
<body class="body_bg">
    <div class="content">
        <div class="title">年薪百万前端跑路，临走还不忘rm -rf</div>
        <form action="index.php" class="form_all" method="POST">

            <div class="title_word">用户名</div>
            <div class="input_box">
                <input name="username" id="username" type="text" class="input_1"/>
            </div>
            <div class="blank_1"></div>
            <div class="title_word">密码</div>
            <div class="input_box">
                <input name="password" type="password" id="password" class="input_1"/>
            </div>

            <div class="login"><input type="submit" name='login' value="login" /></div>

            <div class="login"><input type="button" value="Go to Register!" onclick='window.open("register.php")'/></div>
            </br>
        </form>
    </div>
</body>
<script>
    $(function() {
    $(window).on('load resize',function(){
        var w_height = $(window).height();
        var w_width = $(".content").height();
        //alert(w_height/2-w_width/2);
        $('.content').css({'top':w_height/2-w_width/2+'px'},100);
    });
})
</script>
 <?php
    if(isset($_POST['login']))
    {
        if($_SESSION[$_POST['username']]===$_POST['password'])
        {
            $_SESSION['islogin']=true;
            //var_dump($_SESSION);
            echo "<script>alert('Login success.')</script>";
            echo "<script>location.href='upload.php?name=".$_POST['username']."';</script>";
        }else{
            echo "<script>alert('ERROR:invalid username or password.')</script>";
        }
	}
	
?>

</html>