<?php

require('../config.php');
if (isset($_POST['user']) && isset($_POST['uid']) && isset($_POST['bid'])) {
    $user = $_POST['user'];
    $title = $_POST['title'];
    $uid = $_POST['uid'];
    $bid = $_POST['bid'];
    $query = "INSERT INTO `like` (u_id, b_id, title, user, like_date) VALUES ('$uid', '$bid', '$title', '$user', NULL)";
    $stmt = $conn->query($query);

    if ($stmt) {
        echo "Like Added";
    } else {
        echo "Error: ";
    }
} else {
    echo "Error: Missing required data";
}
