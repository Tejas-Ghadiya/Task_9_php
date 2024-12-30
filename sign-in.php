<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/sign-up.css">
</head>

<body>
    <div class="container">
        <div class="form">
            <div class="title">SIGN IN</div>
            <form method="POST">
                <div><input type="text" placeholder=" Email" name="email" /></div>
                <br />
                <div>
                    <input type="password" name="pass" placeholder="Password" />
                </div>
                <br />
                <br />
                <div><button id="Sign-In">Sign In</button></div>
                <br>
                <center>
                    <p>create a new accounta <a href="sign-up.php">sign up</a> </p>
                </center>

            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </script>
</body>

</html>
<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $res = $result->fetch_assoc();
        if (password_verify($pass, $res['password'])) {
            session_start();
            $_SESSION['name'] = $res['name'];
            $_SESSION['email'] = $res['email'];
            $_SESSION['uid'] = $res['uid'];
            $_SESSION['img'] = $res['image'];
            header("location:index.php");
            exit;
        } else {
            echo "<script>alert('Invalid password')</script>";
        }
    } else {
        echo "<script>alert('Email ID does not exist')</script>";
    }
}
?>