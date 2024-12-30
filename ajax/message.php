<?PHP

require('../config.php');
session_start();
// if (isset($_POST['send'])) {
$bid = $_POST['bid'];
$email = $_POST['email'];
$message = $_POST['message'];
$title = $_POST['title'];
$name = $_POST['name'];
$sql = $conn->query("INSERT INTO `comment` (id, b_id, email, title, name, comment) VALUES (NULL, '$bid', '$email', '$title', '$name', '$message')");
if ($sql) {
    echo "add";
}
// }
