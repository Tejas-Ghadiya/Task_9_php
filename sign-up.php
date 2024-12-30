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
            <div class="title">SIGN UP</div>
            <form method="POST" enctype="multipart/form-data">
                <div><input type="text" placeholder="User  name" name="name" /></div>
                <br />
                <div>
                    <input type="email" name="email" placeholder="Email" id="" />
                </div>
                <br />
                <div>
                    <input type="password" name="pass" placeholder="Password" />
                </div>
                <br />
                <div>
                    <input type="password" name="cpass" placeholder="Confirm password" />
                </div>
                <br />
                <div>
                    <input type="file" name="image" accept="image/*" />
                </div>
                <br />
                <div><button id="Sign-Up">Sign Up</button></div><br>
                <center>
                    <p>Click here to <a href="sign-in.php">sign in</a> </p>
                </center>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="js/sign-up.js"></script>
</body>

</html>

<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    // Check if the image is uploaded
    if ($_FILES['image']['error'] == 0) {
        $image = $_FILES['image'];
        $imageName = $image['name'];
        $imageTmpName = $image['tmp_name'];
        $imageSize = $image['size'];
        $imageType = $image['type'];

        // Check if the image is valid
        if ($imageType == 'image/jpeg' || $imageType == 'image/png' || $imageType == 'image/gif') {
            // Upload the image to the "images" folder
            $uploadPath = 'user_images/';
            $imageName = time() . '_' . $imageName;
            move_uploaded_file($imageTmpName, $uploadPath . $imageName);

            // Store the image path in the database
            $imagePath = $uploadPath . $imageName;
        } else {
            echo "<script>alert('Invalid image type')</script>";
            exit;
        }
    } else {
        $imagePath = '';
    }

    if ($pass != $cpass) {
        echo "<script>alert('Password and confirm password should be same')</script>";
        exit; // Add this to prevent further execution
    } else {
        $hpass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = $conn->query("SELECT name, email FROM users WHERE name='$name' AND email='$email' ");
        if ($sql->num_rows > 0) {
            echo "<script>alert('Username and email are already here')</script>";
        } else {
            $sql = $conn->query("INSERT INTO users (name, email, password, image) VALUES ('$name', '$email', '$hpass', '$imagePath')");
            if ($sql) {
                $res = $conn->query("SELECT * FROM users WHERE email='$email'")->fetch_assoc();
                session_start();
                $_SESSION['name'] = $res['name'];
                $_SESSION['email'] = $res['email'];
                $_SESSION['uid'] = $res['uid'];
                $_SESSION['img'] = $res['image'];
                header("location:index.php");
                exit; // Add this to prevent further execution
            } else {
                echo "<script>alert('Error creating user: " . $conn->error . "')</script>";
            }
        }
    }
}
?>