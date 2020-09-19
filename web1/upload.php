<?php
error_reporting(0);
include('waf.php');
session_start();
if($_GET['status']=='login out'){
    session_destroy();
    header("location:index.php");
}
if(!$_SESSION['islogin'])
{
    die('Who are you?');

}else{
    extract($_POST);
    if($_SESSION['islogin'])
    {
        echo "<h4 align='center'>Welcome,".$_GET['name']."<br>";
    }
    $cat = new waf();
    if(isset($_POST['submit'])) {
        if ($_FILES["file"]["error"] > 0)
        {
            echo "There is something werong:" . $_FILES["file"]["error"] . "<br>";
        }else{
            //I beg u will never find it~meow
            $dst = '/var/www/html/me0w_mE0w_miA0';
            $fileinfo = array($_FILES["file"]["name"],$dst);
            if (file_exists("$fileinfo[1]/$fileinfo[0]"))
            {
                echo $fileinfo[0] . " has already existed :)";
            }else
            {
                //security check
                $cat->data=$fileinfo[0];
                $cat->upload_check();
                //upload it
                move_uploaded_file($_FILES["file"]["tmp_name"],"$fileinfo[1]/$fileinfo[0]");
                //output fileinfo
                $msg="You file name is:%s";
                foreach($fileinfo as $key => $value){
                    $msg = sprintf($msg, $value);                  
                }
                echo $msg.".And all I can promise you is that :(";
            }

        }
	}
	echo "</h4>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Meow Upload</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        #live2dcanvas {
            border: 0 !important;
        }
        .both{
            width: 600px;border:
                   1px solid #ccc;
                   border-radius: 4px;
                   margin-top:40px;
                   margin-bottom: 40px
        }
	</style>
</head>

<body style="background: #f4ede3">
<div class="container both" >
	<img src="images/xhj.jpg"  style="width: 80px;height: 100px;border-radius: 5px;margin-top: 20px;margin-right: 40px"
		id="newImage" >	

	<form class="form-horizontal"><!--一个现在毫无意义得破烂表单-->
		<div class="form-group" style="margin-top: 20px;">
			<label for="username" class="col-sm-2 control-label">昵称</label>
			<div class="col-sm-10">
				<?php echo '<div  class="form-control" id="username" style="width: 180px" value="">'.$_GET['name'].'</div>' ?>	
			</div>
		</div>

		<div class="form-group">
			<label for="subject" class="col-sm-2 control-label">技能点</label>
			<div class="col-sm-10" style="width: 210px">
				<select class="form-control" id="subject">
					<option>ctf水平</option>
					<option>没人比我懂web,就是AK</option>
					<option>AUTO PWN,AUTO就完了</option>
				</select>
			</div>
		</div>
	
	</form>

	<form action="" method="POST" enctype="multipart/form-data"><!-- 这个功能没删,还可以用呢 -->
		<div class="form-group">
			<label for="file" class="col-sm-2 control-label"> 文件上传</label>
			<input type="file" name="file" id="file"><br>
			<label for="file" class="col-sm-2 control-label"> 上传按钮</label>
			<input type="submit" name="submit" value="上传、提交">
		<!-- zip -r is useful, and don't forget /var/www/html/***********/cat.php~ -->
		</div>
	</form>

</div>

	<div><center>老板让我一天把站恢复了，我太难了……</center></di>
	<form>
		<center><input type="submit" name="status" value="login out"/><center>
	</form>
</body>
</html>


