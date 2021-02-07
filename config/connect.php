<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'flutter_crud');

$con = mysqli_connect(HOST, USER, PASS, DB) or die('unable to connect');
