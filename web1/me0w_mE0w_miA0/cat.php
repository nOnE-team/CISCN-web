<?php
error_reporting(0);
include('../waf.php');

session_start();
/*Login check*/
if(!$_SESSION['islogin'])
{
    die('Who are you?');

}else{
    //class is waf~
    echo "<h4 align='center'>Hello,ctfer</h4>";
    echo "<h4 align='center'>But I am only a little cat......really?</h4>";
    echo '<br><div align="center"><img src="../images/cat2.jpg" align="center" /></div></br>';
    $a=new waf();
    spl_autoload_register();

    if(isset($_COOKIE["filenames"]))
    {
        $a->data=$_COOKIE["filenames"];
        $a->upload_check();
        echo "<h3 align='center'>The Winning Formula is complete!</h3>";
        $filenames=unserialize($_COOKIE["filenames"]);
    }else{
        $filenames='kee1ongz.meow';
        file_put_contents($filenames,' Meow~meow,meow~');
    }   
}

?>

<!-- vim is useful too,bro -->
