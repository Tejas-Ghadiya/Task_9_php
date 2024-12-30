<?php
require 'config.php';
session_start();

if (!isset($_SESSION['uid']) || !isset($_SESSION['name'])) {
    // Redirect or show an error if user is not logged in
    echo "User not logged in!";
    exit;
}

$u_id = $_SESSION['uid'];
$name = $_SESSION['name'];
$u_img = $_SESSION['img']
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/add_blog.css">
</head>

<body>
    <header>
        <nav>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="index.php"> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16" aria-label="Home">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
                        </svg></a>
                </li>
                <li class="nav-item"><a class="nav-link" href="add_blog.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16" aria-label="Add Blog">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </svg></a></li>
                <li class="nav-item">
                    <?php if (empty($_SESSION['uid'])) { ?>
                        <a class="nav-link" href="sign-up.php">Login</a>
                    <?php } else { ?>
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo htmlspecialchars($_SESSION['img']); ?>" height="40px" width="40px" class="rounded-circle" alt="User Image">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="logout.php" style="color: red; font-weight: 500;">LOGOUT</a></li>
                            </ul>
                        </div>
                    <?php } ?>
                </li>
            </ul>
        </nav>
    </header>
    <br><br><br>
    <form method="post" enctype="multipart/form-data">
        <div><input type="text" placeholder="Title" name="title" required></div>
        <div><input type="file" name="image" accept="image/*"></div>
        <div><textarea name="blog" placeholder="Blog" required></textarea></div>
        <div><button type="submit" name="add_blog">Submit</button></div>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>



</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $blog = $_POST['blog'];

    // Validate uploaded image
    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image = $_FILES['image'];
        $imageName = $image['name'];
        $imageTmpName = $image['tmp_name'];
        $imageSize = $image['size'];
        $imageType = mime_content_type($imageTmpName);

        // Check if the image type is valid
        $validTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($imageType, $validTypes)) {
            $uploadPath = 'blog_image/';
            $imageName = time() . '_' . basename($imageName);
            if (move_uploaded_file($imageTmpName, $uploadPath . $imageName)) {
                $imagePath = $uploadPath . $imageName;
            } else {
                echo "<script>alert('Error uploading image.')</script>";
                exit;
            }
        } else {
            echo "<script>alert('Invalid image type. Only JPEG, PNG, and GIF are allowed.')</script>";
            exit;
        }
    }

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO blog (b_id, name, u_image, title, image, bloge, u_id) VALUES (NULL, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssi', $name, $u_img, $title, $imagePath, $blog, $u_id);

    if ($stmt->execute()) {
        echo "<script>alert('Blog added successfully.'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "')</script>";
    }

    $stmt->close();
}
?>