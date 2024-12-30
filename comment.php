    <?php
    require('config.php');
    session_start();
    $b_id = $_POST['blog_id']; // Safely get the blog ID from POST
    $title = $_POST['title'];
    $name = $_POST['name'];
    if (!isset($_SESSION['email'])) {
        // Redirect to login or display a message
        echo "You need to be logged in to comment.";
        exit;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Comment</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

        <link rel="stylesheet" href="css/comment.css">
    </head>

    <body>

        <header>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="index.php"> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16" aria-label="Home">
                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
                            </svg></a></li>
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
        <?php
        // Fetch blog details using prepared statement
        $stmt = $conn->query("SELECT * FROM blog WHERE b_id = ' $b_id'");
        $sql = $stmt->fetch_assoc();
        ?>

        <div class="conten">
            <div class="leftcolumn">
                <div class="card">
                    <center><br><br>
                        <h1><?php echo htmlspecialchars($sql['title']); ?></h1>
                        <br><br>
                        <a href="blog.php?b_id=<?php echo htmlspecialchars($b_id); ?>">
                            <img src="<?php echo htmlspecialchars($sql['image']); ?>" height="500px" alt="">
                        </a>
                    </center><br><br><br>

                    <div class="comments-container">
                        <?php
                        // Fetch comments using prepared statement
                        $stmt = $conn->prepare("SELECT * FROM `comment` WHERE b_id = ?");
                        $stmt->bind_param("s", $b_id);
                        $stmt->execute();
                        $coment = $stmt->get_result();

                        while ($row = $coment->fetch_assoc()) {
                        ?>
                            <div class="data">
                                <p class="email">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z" />
                                        </svg>
                                    </span>
                                    <?php echo htmlspecialchars($row['email']); ?>
                                </p>

                                <p class="comment">
                                    <br><br><br>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-left-fill" viewBox="0 0 16 16">
                                            <path d="M2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                        </svg>
                                    </span>
                                    <?php echo htmlspecialchars($row['comment']); ?>
                                </p>
                            </div>
                        <?php } ?>
                    </div>

                    <!-- Input Section for New Comment -->
                    <div class="input-section">
                        <form method="post" id="commentForm">
                            <input type="hidden" name="bid" value="<?php echo htmlspecialchars($b_id); ?>">
                            <input type="hidden" name="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" required />
                            <input type="hidden" name="title" value="<?PHP echo $title;  ?>">
                            <input type="hidden" name="name" value="<?PHP echo $name;  ?>">
                            <div><textarea name="message" cols="150" placeholder="Your comment" required></textarea></div>
                            <div><button type="submit" class="send">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                                        <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z" />
                                    </svg>
                                </button>
                                <a href="index.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708" />
                                    </svg>
                                </a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/comment.js">
    </script>

    </html>