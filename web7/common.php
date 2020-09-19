<?php
//error_reporting(0);
include_once "config.php";
header("Content-Type:text/html; charset=utf-8");

session_start();

function getUser()
{
    if (!isset($_SESSION["token"])) {
        return -1;  //not login
    } else if ($_SESSION["token"] == "0") {
        return 0;   //Administrator
    } else {
        $key = base64_decode($_SESSION["token"]);
        $user = explode("|", $key)[0]; //user
        if (!$user) {
            return -1;
        }
        return $user;
    }
}

function setUser($username, $password)
{
    $ip = $_SERVER["REMOTE_ADDR"];
    if ($username == 'admin') {
        if ($ip == "::1" || $ip == "127.0.0.1"){
            $_SESSION["token"] = 0;     //Administrator
        }else{
            die('修罗！隐忍！！！');
        }
    } else {
        $key = $username . "|" . $password;
        $_SESSION["token"] = base64_encode($key);
    }
}

function getCache()
{
    if (isset($_COOKIE['cache'])) {
        try {
            $cbc = new CBCCrypt();
            $data = $cbc->decrypt($_COOKIE["cache"]);
            $data = json_decode($data);
            return $data;
        } catch (Exception $e) {
        }
    }
    return false;
}

function setCache($username, $contents)
{
    $cache = json_encode(['username' => $username, 'contents' => $contents]);
    $cbc = new CBCCrypt();
    $cipher = $cbc->encrypt($cache);
    setcookie('cache', $cipher);
}

?>
