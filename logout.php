<?PHP
session_start();
$_SESSION['name'];
$_SESSION['email'];
$_SESSION['uid'];
$_SESSION['img'];
session_destroy();
header('Location: index.php');
