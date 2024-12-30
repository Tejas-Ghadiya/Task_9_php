<?php
require 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <title>HOME</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <header>
        <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16" aria-label="Home">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
                        </svg>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="add_blog.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16" aria-label="Add Blog">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </svg>
                    </a>
                </li>

                <li class="nav-item">
                    <?php if (empty($_SESSION['uid'])) { ?>
                        <a class="nav-link" href="sign-up.php">Login</a>
                    <?php } else { ?>
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo htmlspecialchars($_SESSION['img']); ?>" height="40px" width="40px" class="rounded-circle" alt="User Image">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="logout.php" style="color: red; font-weight: 500;">LOGOUT</a></li>
                            </ul>
                        </div>
                    <?php } ?>
                </li>
            </ul>
        </nav>
    </header>

    <section>
        <?php
        // Using a prepared statement to avoid SQL injection
        $stmt = $conn->prepare("SELECT * FROM blog");
        $stmt->execute();
        $blog = $stmt->get_result();

        foreach ($blog as $res) {
            $name = htmlspecialchars($res['name']);
            $stmt2 = $conn->prepare("SELECT * FROM blog WHERE name = ?");
            $stmt2->bind_param("s", $name);
            $stmt2->execute();
            $total_blog = $stmt2->get_result()->num_rows;

        ?>
            <div class="blogs">
                <div>
                    <p class="p" data-total="<?php echo $total_blog; ?>" data-name="<?php echo $name; ?>" data-image="<?php echo $res['u_image']; ?>">
                        <img src="<?php echo htmlspecialchars($res['u_image']); ?>" height="60px" width="60px" alt="<?php echo $name; ?>" class="rounded-circle writer_data">
                    </p>
                    <h2><?php echo htmlspecialchars($res['title']); ?></h2>
                    <a href="blog.php?b_id=<?php echo $res['b_id']; ?>">
                        <div class="fakeimg" style="height:200px;">
                            <img src="<?php echo htmlspecialchars($res['image']); ?>" height="200px" alt="Blog Image">
                        </div>
                    </a>
                    <br>
                    <div class="like" data-bid="<?php echo $res['b_id']; ?>">

                        <?php
                        if (!empty($_SESSION['uid'])) {
                            $uid = $_SESSION['uid'];
                            $bid = $res['b_id'];

                            $like_stmt = $conn->prepare("SELECT id FROM `like` WHERE u_id=? AND b_id=?");
                            $like_stmt->bind_param("ii", $uid, $bid);
                            $like_stmt->execute();
                            $like_result = $like_stmt->get_result();
                            $dis = $like_result->fetch_assoc();

                            if ($like_result->num_rows > 0) { ?>
                                <form method=" post">
                                    <input type="hidden" name="id" value="<?php echo $dis['id']; ?>">
                                    <input type="hidden" name="bid" value="<?php echo $res['b_id']; ?>">
                                    <button type="submit" class="rimove">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16" aria-label="Unlike">
                                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" style="color: red;" />
                                        </svg>
                                    </button>
                                </form>

                            <?php } else { ?>
                                <form method="post">
                                    <input type="hidden" name="uid" value="<?php echo htmlspecialchars($_SESSION['uid']); ?>">
                                    <input type="hidden" name="bid" value="<?php echo $res['b_id']; ?>">
                                    <input type="hidden" name="user" value="<?php echo htmlspecialchars($name); ?>">

                                    <button type="submit" class="add">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16" aria-label="Like">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                        </svg>
                                    </button>
                                </form>
                        <?php }
                        } ?>

                    </div>
                    <br>
                </div>
            </div>
        <?php } ?>
    </section>

    <!-- Writer Info Modal -->
    <div class="modal fade" id="writerInfoModal" tabindex="-1" aria-labelledby="writerInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="writerInfoModalLabel">Writer Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img id="writer-image" src="" alt="Writer Image" class="rounded-circle" style="width: 100px; height: 100px;">
                    </div>
                    <p><strong>Name: </strong><span id="writer-name"></span></p>
                    <p><strong>Total Blogs: </strong><span id="writer-total"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Show writer info modal
            $(".p").click(function() {
                var totalBlog = $(this).data("total");
                var name = $(this).data("name");
                var image = $(this).data("image");
                // Set data to modal
                $("#writer-name").text(name);
                $("#writer-total").text(totalBlog);
                $("#writer-image").attr("src", image);
                // Show modal
                $("#writerInfoModal").modal("show");
            });

            // Handle adding a like
            $(".add").click(function(e) {
                e.preventDefault();
                var form = $(this).closest("form");
                var uid = form.find('input[name="uid"]').val();
                var bid = form.find('input[name="bid"]').val();
                var user = form.find('input[name="user"]').val();
                var likeContainer = $(this).closest(".like"); // Target the specific .like container

                $.ajax({
                    type: "POST",
                    url: "ajax/like.php",
                    data: {
                        uid: uid,
                        bid: bid,
                        user: user,
                    },
                    success: function(data) {
                        // Reload only the specific .like container
                        likeContainer.load(location.reload(".add"));
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Error liking the post:", textStatus, errorThrown);
                    },
                });
            });

            // Handle removing a like
            $(".rimove").click(function(e) {
                e.preventDefault();
                var form = $(this).closest("form");
                var id = form.find('input[name="id"]').val();
                var bid = form.find('input[name="bid"]').val();
                var likeContainer = $(this).closest(".like"); // Target the specific .like container

                $.ajax({
                    type: "POST",
                    url: "ajax/dlike.php",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        // Reload only the specific .like container
                        likeContainer.load(location.reload(".remove"));
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Error disliking the post:", textStatus, errorThrown);
                    },
                });
            });
        });
    </script>
</body>

</html>