<?PHP
require('../config.php');

$bid = $_POST['bid'];

$delet = $conn->query("DELETE FROM `blog` WHERE b_id = '$bid'");
if ($delet) {
    $dlike = $conn->query("DELETE FROM `like` WHERE b_id = '$bid'");
    if ($dlike) {
        $dcomment = $conn->query("DELETE FROM `comment` WHERE b_id = '$bid'");
    }
}
