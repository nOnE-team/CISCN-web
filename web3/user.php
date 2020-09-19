<?php
    class user{
        private $name;
        private $phone;
        private $cardID;
        private $level;
        private $pic;
        public function getName()
        {
            return $this->name;
        }
        public function getPhone()
        {
            return $this->phone;
        }
        public function getCardID()
        {
            return $this->cardID;
        }
        public function getPic()
        {
            return $this->pic;
        }
        public function getLevel()
        {
            return $this->level;
        }
        public function setValue($cardid,$name,$phone,$level,$pic){
            $this->cardID=$cardid;
            $this->name=$name;
            $this->phone=$phone;
            $this->level=$level;
            $this->pic=$pic;
        }

    }

    function register($cardID,$name,$phone,$pic){
        include_once "conn.php";
        $q="select*from user where cardid=".$cardID.";";
        $result=mysqli_query($conn,$q);
        $level=0;
        if(mysqli_num_rows($result)>0){
            $level=mysqli_fetch_assoc($result)['level'];
            $u="update user set cardid='".$cardID."',name='".$name."',phone='".$phone."',pic='".$pic."' where cardid='".$cardID."';";
            mysqli_query($conn,$u);
        }
        else{
            $level=mt_rand(0,2);
            $i="insert into user values ('".$cardID."','".$name."','".$phone."','".$level."','".$pic."');";
            mysqli_query($conn,$i);
        }
        $user=new user();
        $user->setValue($cardID,$name,$phone,$level,$pic);
        $_SESSION['user']=serialize($user);
    }