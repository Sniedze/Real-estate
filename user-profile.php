<?php
session_start();
print_r($_SESSION);
require_once(__DIR__.'/functions.php');
$sPageTitle = 'User Login';
$sClassActive = 'user-login';

$jData = getDataAsJson('data.json');
$sUserId = $_SESSION['id'];
$_SESSION['jUser'] = $jData->users->$sUserId;
$jUser = $_SESSION['jUser'];



require_once(__DIR__.'/components/top.php');
echo "Welcome, $jUser->name";
?>

<h2>Upload Property</h2>
<a href="upload.php">Upload new property</a>




<a href="logout.php">Log out</a>
    
</body>
</html>