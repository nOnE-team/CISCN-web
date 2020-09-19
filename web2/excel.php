<?php
error_reporting(0);
require 'vendor/autoload.php';
$r = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
$r->setReadDataOnly(TRUE);
$fileInfo = $_FILES["filename"];
$filePath = $fileInfo["tmp_name"];
try {
$data = $r->load($filePath)->getSheet(0)->toArray(); 
}
catch (Exception $e) {
die('illegal xlsx file!');
}
$s = '';
$s = $s.'<table>';
foreach($data as $a)
    {
    $s = $s.'<tr>';
    foreach($a as $i)
    {
        $s = $s."<td style=\"text-align:center\"><h2>".$i."</h2></td>";
    }
    $s = $s.'</tr>';
    }
$s = $s.'</table>';
stream_wrapper_unregister('php');
chdir('users/');
$fd = $_SERVER['REMOTE_ADDR'];
mkdir($fd);
chdir($fd);
file_put_contents('profile',$s);
$f = basename(getcwd()).'/profile';
chdir('..');
if(!stripos(file_get_contents($f),'<?') && !stripos(file_get_contents($f),'php') && !stripos(file_get_contents($f),'.')) {
	include($f);
}
else die('no!');
?>

