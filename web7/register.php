<?php
include "config.php";
include "common.php";
if (isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = $conn->query("select username from users where username='${username}'");
    if ($result->num_rows > 0) {
        echo "<script>alert('此用户名已被注册');location.href='register.html'</script>";
        die("此用户名已被注册");
    } else {
        $sql = "INSERT INTO users (username, password, upload) VALUES ('${username}', '${password}', 'upload')";

        if ($conn->query($sql) === TRUE) {
            setUser($username, $password);
            if (!file_exists("config/".$_SESSION['token']."/upload")){
                if (!mkdir("config/".$_SESSION['token']."/upload", 0777, true)){
                    die("无法创建文件夹");
                }
            }
            copy('assets/pro.jpg',"config/".$_SESSION['token']."/upload/pro.jpg");
            file_put_contents("config/${_SESSION['token']}/profile","<?php define('THEME','light');?>");
            echo "<script>alert('注册成功');location.href='index.php'</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            //TODO:删掉
        }
    }
}