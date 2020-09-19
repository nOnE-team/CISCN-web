<?php
include_once("common.php");
$user = getUser();
if($user == -1){
    header("Location: login.html");
    die('请先登录');
}
if($user!==0){
    die("即日起，逐出苏家！！");
}
if($_FILES && $_FILES["pic"]["error"] == 0) {
    if($_FILES["pic"]['size'] > 0 && $_FILES["pic"]['size'] < 102400 * 5) {
        $typeAccepted = ["image/jpeg", "image/gif", "image/png"];
        if(!in_array($_FILES["pic"]['type'], $typeAccepted)) {
            exit("非法文件！");
        }

        $blackexts = ["ph", "ht", "ini", "php", "php5", "php4", "php3", "phtml", "pht", "jsp", "jspa", "jspx", "jsw", "jsv", "jspf", "jtml", "asp", "aspx", "asa", "asax", "ascx", "ashx", "asmx", "cer", "swf", ".htaccess", "ini",'phphpp'];
        $extension = substr($_FILES["pic"]["name"], strrpos($_FILES["pic"]["name"], '.'));
        foreach ($blackexts as $blackext){
            if (strpos($extension, $blackext) !== false){
                die("非法文件！");
            }
        }
        $result = $conn->query("select upload from users where username='admin'");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            //区区普通用户也想有专属上传路径，你也配？？
            $upload_path = "config/admin/${row['upload']}";
        }else {
            echo "出错了!";
        }
        $filename = "${upload_path}/pro".$extension;
        if(move_uploaded_file($_FILES["pic"]["tmp_name"], $filename)) {
            echo "上传成功";
            header("Location: index.php");
        } else {
            echo "upload error!";
        }
    }else{
        echo "文件过大 > 500kb";
    }
} else {
    echo "没有上传文件";
}

