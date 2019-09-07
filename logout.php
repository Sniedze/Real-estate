<?php

session_start();

session_destroy();
header('Location: seller-login.php');