<?php

require('../config.php');
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $delet = "DELETE FROM `like` WHERE id = '$id'";
    $stmt = $conn->query($delet);

    if ($stmt) {
        echo "Like Added";
    } else {
        echo "Error: ";
    }
} else {
    echo "Error: Missing required data";
}
