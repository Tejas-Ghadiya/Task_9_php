<?PHP
require 'config.php';
session_start();
$b_id = $_GET['b_id']
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/blog.css">

</head>

<body>

    <header>
        <nav>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16" aria-label="Home">
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
    <?PHP
    $sql = $conn->query("SELECT * FROM blog WHERE b_id = '$b_id'")->fetch_assoc();
    ?>
    <div class="conten">
        <div class="leftcolumn">
            <div class="card">
                <div class="card-body">
                    <a href="javascript:history.back()" class="btn btn-secondary mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                            <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z" />
                            <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                        </svg></a> <!-- Back Button -->
                    <center>
                        <h1><?PHP echo $sql['title'] ?></h1>
                        <br><br>
                        <img src="<?PHP echo $sql['image'] ?>" height="500px" alt="">
                    </center><br><br><br>
                    <h4><?PHP echo nl2br(htmlspecialchars($sql['bloge'])); ?></h4>
                    <br><br><br><br>
                    <div class="image">
                        <img src="<?PHP echo $sql['u_image']; ?>" height="100px" width="100px" alt="">
                        <p>Writer name: <?PHP echo $sql['name']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>