<?php
$servername = "127.0.0.1";
$username = "r00t";
$password = "This_cant_b3_passwd";
$dbname = "easybase";
define('stopwords', 'union|sleep|load_file|delete|insert|truncate|char|into|iframe|script');
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset('latin1');
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

function zc_check($string)
{
    if (!is_array($string)) {
        if (get_magic_quotes_gpc()) {
            return $string;
        } else {
            return addslashes($string);
        }
    }
    foreach ($string as $k => $v) $string[$k] = zc_check($v);
    return $string;
}

if ($_REQUEST) {
    $_POST = zc_check($_POST);
    $_GET = zc_check($_GET);
}
function stopsqlin($str)
{
    if (!is_array($str)) {
        $str = strtolower($str);
        $sql_inj = explode("|", stopwords);
        for ($i = 0; $i < count($sql_inj); $i++) {
            if (@strpos($str, $sql_inj[$i]) !== false) {
                die("Loser~~");
            }
        }
    }
}


foreach ($_GET as $get_key => $get_var) {
    stopsqlin($get_var);
} /* 过滤所有GET过来的变量 */
foreach ($_POST as $post_key => $post_var) {
    stopsqlin($post_var);
}/* 过滤所有POST过来的变量 */
foreach ($_COOKIE as $cookie_key => $cookie_var) {
    stopsqlin($cookie_var);
}/* 过滤所有COOKIE过来的变量 */
foreach ($_REQUEST as $request_key => $request_var) {
    stopsqlin($request_var);
}/* 过滤所有request过来的变量 */