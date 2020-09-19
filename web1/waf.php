<?php

class waf //Just a simple check
{
    public $data;

    public function upload_check()
    {
        $meow = $this->data;
        $blacklist = array("php", "php5", "php4", "php3", "phtml", "pht", "jsp", "jspa", "jspx","<",">","jsw", "jsv", "jspf","jtml", "asp", "aspx", "asa", "asax", "ascx", "ashx", "asmx", "cer","{","}", "swf", "htaccess", "ini");
        foreach ($blacklist as $blackitem) { 
            if (preg_match('/' . $blackitem . '/i', $meow)) { 
                echo '<img src="images/cat1.gif"/><br>';
                die("Meow,Meow,Meow! Are u a bad guy?");
            }
        } 
        return $this->data;
    }
}

class cat //Just a lovely cat
{
    public $test = "";
    
    function __wakeup()
    {
           echo '喵';
    }
}