<?php
require 'config.php';
session_start();

// Pagination settings
$results_per_page = 5; // Change this to the number of results you want per page
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
  $current_page = (int)$_GET['page'];
} else {
  $current_page = 1; // Default to first page
}

// Calculate total number of results
$stmt = $conn->prepare("SELECT COUNT(*) FROM blog");
$stmt->execute();
$stmt->bind_result($total_results);
$stmt->fetch();
$stmt->close();

// Calculate total pages
$total_pages = ceil($total_results / $results_per_page);

// Calculate the starting limit for the results
$offset = ($current_page - 1) * $results_per_page;

// Fetch results for the current page
$stmt = $conn->prepare("SELECT * FROM blog LIMIT ?, ?");
$stmt->bind_param("ii", $offset, $results_per_page);
$stmt->execute();
$blog = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <title>HOME</title>
  <link rel="stylesheet" href="css/style.css" />
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

  <section>
    <?php
    foreach ($blog as $res) {
      $name = htmlspecialchars($res['name']);
      // Additional code to fetch blog details
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
                    <input type="hidden" name="title" value="<?php echo $res['title']; ?>">
                    <input type="hidden" name="user" value="<?php echo $_SESSION['name'] ?>">

                    <button type="submit" class="add">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16" aria-label="Like">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                      </svg>
                    </button>
                  </form>
                <?php } ?>

                <form method="post" action="comment.php">
                  <input type="hidden" name="blog_id" value="<?php echo $res['b_id']; ?>">
                  <input type="hidden" name="title" value="<?php echo $res['title']; ?>">
                  <input type="hidden" name="name" value="<?php echo $res['name']; ?>">
                  <button type="submit" class="comment">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-left-dots-fill" viewBox="0 0 16 16">
                      <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                    </svg>
                  </button>
                </form>



              <?PHP } ?>
            </div>
            <!-- Like and comment forms here -->
          </div>
          <br>
        </div>
      </div>
    <?php } ?>

    <!-- Pagination Links -->
    <nav aria-label="Page navigation">
      <ul class="pagination">
        <?php if ($current_page > 1) { ?>
          <li class="page-item">
            <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
        <?php } ?>

        <?php for ($page = 1; $page <= $total_pages; $page++) { ?>
          <li class="page-item <?php if ($page === $current_page) echo 'active'; ?>">
            <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
          </li>
        <?php } ?>

        <?php if ($current_page < $total_pages) { ?>
          <li class="page-item">
            <a class="page-link" href="?page=<?php echo $current_page + 1; ?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        <?php } ?>
      </ul>
    </nav>
  </section>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>