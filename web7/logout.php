<?php
setcookie('cache');
setcookie('PHPSESSID');
session_destroy();
header('Location: login.html');