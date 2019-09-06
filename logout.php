<?php

session_start();
$_SESSION['jUser'] = '';
session_destroy();
header('Location: user-login.php');