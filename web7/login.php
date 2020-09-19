<?php
include "config.php";
include "common.php";
if(isset($_POST["username"]) && isset($_POST["password"])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("select username, password from users where username='${username}' and password='${password}'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        setUser($username, $password);
        echo "登录成功";
        header('Location: index.php');
    }else {
        echo "<script>alert('用户名或密码不正确');location.href='login.html'</script>";
    }
}else{
    header("Location: login.html");
    exit();
}
