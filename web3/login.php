<?php
    $cardid=$_POST['sfzh'];
    $name=$_POST['xm'];
    $phone=$_POST['sjh'];

    $rr='/(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X)/';
    $pp='/0?(13|14|15|17|18|19)[0-9]{9}/';
    $CH='/^[\x{4e00}-\x{9fa5}]+$/u';
    $flag=0;
    if(strlen($cardid)===18 and preg_match_all($rr,$cardid)===1){
        if(strlen($phone)===11 and preg_match_all($pp,$phone)===1){
            if($_FILES["file"]['size']>100) {
                 if(preg_match_all($CH,$name)){
                    include_once 'user.php';
                    $destination = "./img/" . time() . mt_rand(100, 900);
                    move_uploaded_file($_FILES["file"]["tmp_name"], $destination);
                    register($cardid, $name, $phone, $destination);
                }
            }
            else $flag=1;
       }else $flag=1;
    }else $flag=1;
    if($flag===1){
Header('Location: ./face.php');
exit;}

