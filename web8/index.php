<?php

// Kickstart the framework
$f3=require('lib/base.php');

if ((float)PCRE_VERSION<8.0)
    trigger_error('PCRE version is out of date');

$f3->route('GET /',
    function($f3) {
        echo "fatfree again and again!<br>Still /?flag=";
    }
);

unserialize($_GET['flag']);

$f3->run();
