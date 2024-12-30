<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/sign-up.css">
</head>

<body>
    <div class="container">
        <div class="form">
            <div class="title">SIGN IN</div>
            <form method="POST" action="">
                <div>
                    <input type="text" placeholder="Email" name="email" required />
                </div>
                <br />
                <div>
                    <input type="password" name="pass" placeholder="Password" required />
                </div>
                <br />
                <br />
                <div>
                    <button type="submit" id="Sign-In">Sign In</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
require '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM `admin` WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $res = $result->fetch_assoc();
        if (password_verify($pass, $res['password'])) {
            session_start();
            $_SESSION['name'] = $res['name'];
            $_SESSION['email'] = $res['email'];
            $_SESSION['aid'] = $res['aid'];
            $_SESSION['img'] = $res['image'];

            header("Location: index.php");
            exit;
        } else {
            echo "<script>alert('Invalid credentials, please try again.')</script>";
        }
    } else {
        echo "<script>alert('Invalid credentials, please try again.')</script>";
    }

    $stmt->close();
}
?>