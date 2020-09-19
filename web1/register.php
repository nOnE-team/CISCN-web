<?php
    session_start();
    
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
        <form action="register.php" class="form_all" method="POST">

            <div class="title_word">Account</div>
            <div class="input_box">
                <input name="username" id="username" type="text" class="input_1"/>
            </div>
            <div class="blank_1"></div>
            <div class="title_word">PassWord</div>
			<div class="input_box">
                <input name="password" type="password" id="password" class="input_1"/>
            </div>

			<div class="blank_1"></div>
            <div class="title_word">Confirm PassWord</div>
            <div class="input_box">
                <input name="confirmPassword" type="password" id="password" class="input_1"/>
            </div>

            <div class="login"><input type="submit" name='register' value="注册" /></div>

			<div class="login"><input type="button" value="Go to login!" onclick='window.open("index.php")'/></div>
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
    if( isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['confirmPassword']))//注册
    {
		if(isset($_SESSION[ $_POST['username'] ])){
            echo "<script>alert('Sorry,User already exists');</script>";
            die();

		}
		if($_POST['password']!=$_POST['confirmPassword']){
            echo "<script>alert('The password and the confirmation you typed do not match.');</script>";
            die();

		} else{
			$_SESSION[ $_POST['username'] ] = $_POST['password'];
			echo "<script>alert('Register success.');</script>";
		
		}
	}
	
?>
</html>