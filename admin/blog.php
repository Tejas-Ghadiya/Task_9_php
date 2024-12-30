<?PHP
require('../config.php');
session_start();
$aid = $_SESSION['aid'];

if ($aid) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Blog List</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/coment.css" />
    </head>

    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle">
                <i class="bx bx-menu" id="header-toggle"></i>
            </div>
            <div class="header_img">
                <img src="<?PHP echo $_SESSION['img']; ?>" alt="" />
            </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="index.php" class="nav_logo">
                        <i class="bx bx-layer nav_logo-icon"></i>
                        <span class="nav_logo-name">LOGO</span>
                    </a>
                    <div class="nav_list">
                        <a href="index.php" class="nav_link">
                            <i class="bx bx-grid-alt nav_icon"></i>
                            <span class="nav_name">HOME</span>
                        </a>
                        <a href="user.php" class="nav_link">
                            <i class="bx bx-user nav_icon"></i>
                            <span class="nav_name">Users</span>
                        </a>
                        <a href="coment_list.php" class="nav_link">
                            <i class="bx bx-message-square-detail nav_icon"></i>
                            <span class="nav_name">Messages</span>
                        </a>
                        <a href="like.php" class="nav_link">
                            <i class="bx bx-bookmark nav_icon"></i>
                            <span class="nav_name">Like</span>
                        </a>
                        <a href="blog.php" class="nav_link active">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-check-fill" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m1.354 4.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708" />
                            </svg>
                            <span class="nav_name">Blog</span>
                        </a>
                    </div>
                </div>
                <a href="logout.php" class="nav_link">
                    <i class="bx bx-log-out nav_icon"></i>
                    <span class="nav_name">SignOut</span>
                </a>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100 bg-light">
            <table class="comment-table">
                <thead>
                    <tr>
                        <th colspan="5">
                            <h1 style="color: white;">Blog List</h1>
                        </th>
                    </tr>
                    <tr>
                        <th>Writer Image</th>
                        <th>Blog Image</th>
                        <th>Blog Title</th>
                        <th>Writer Name</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Display comments ordered by `b_id`
                    $comment = $conn->query("SELECT * FROM `blog` ORDER BY u_id");
                    while ($res = $comment->fetch_assoc()) { ?>
                        <tr>
                            <td><img src="../<?php echo htmlspecialchars($res['u_image']); ?>" height="50px" width="50px" alt=""></td>
                            <td><img src="../<?php echo htmlspecialchars($res['image']); ?>" height="50px" width="50px" alt=""></td>
                            <td><?php echo htmlspecialchars($res['title']); ?></td>
                            <td><?php echo htmlspecialchars($res['name']); ?></td>
                            <td>
                                <form method="post" class="delete-form">
                                    <input type="hidden" name="b_id" value="<?php echo $res['b_id']; ?>">
                                    <button type="button" class="delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <script src="js/script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/blog_dilit.js"></script>
    </body>

    </html>

<?PHP
} else {
    header("location:sign-in.php");
    exit; // Make sure to exit after redirection
}
?>