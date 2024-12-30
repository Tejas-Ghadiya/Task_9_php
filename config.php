<?PHP
error_reporting(E_ALL & ~E_WARNING);
$HOST = "localhost";
$USER = "root";
$PASSWORD = "";
$D_B = "task9";

$conn =  new mysqli($HOST, $USER, $PASSWORD, $D_B);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
