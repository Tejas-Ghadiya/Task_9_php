<?PHP
session_start();
$_SESSION['name'];
$_SESSION['email'];
$_SESSION['aid'];
$_SESSION['img'];
session_destroy();
header('Location: sign-in.php');
