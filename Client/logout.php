<?php
session_start();
// log out ~ SESSION['username'] == NULL
$_SESSION['userId'] = NULL;
$_SESSION['username'] = NULL;
// redirect

require('common.php');
