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
    <title>Home</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body id="body-pd">
    <header class="header" id="header">
      <div class="header_toggle">
        <i class="bx bx-menu" id="header-toggle"></i>
      </div>
      <div class="header_img">
        <img src="<?PHP echo $_SESSION['img'] ?>" alt="" />
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
            <a href="index.php" class="nav_link active">
              <i class="bx bx-grid-alt nav_icon"></i>
              <span class="nav_name">HOME</span>
            </a>
            <a href="user.php" class="nav_link">
              <i class="bx bx-user nav_icon"></i>
              <span class="nav_name">Users</span>
            </a>
            <a href="coment_list.php" class="nav_link ">
              <i class="bx bx-message-square-detail nav_icon"></i>
              <span class="nav_name">Messages</span>
            </a>
            <a href="like.php" class="nav_link">
              <i class="bx bx-bookmark nav_icon"></i>
              <span class="nav_name">Lick</span>
            </a>
            <a href="blog.php" class="nav_link">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-check-fill" viewBox="0 0 16 16">
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m1.354 4.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708" />
              </svg>
              <span class="nav_name">blog</span>
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
      <div class="page">
        <div class="data">
          <div class="user">
            <?PHP
            $user = $conn->query("SELECT * FROM users");
            $result = $user->num_rows;
            echo "<p>" . $result . "</p>";
            ?>
            <h1>Users</h1>
          </div>
          <div class="user">
            <?PHP
            $user = $conn->query("SELECT * FROM blog");
            $result = $user->num_rows;
            echo "<p>" . $result . "</p>";
            ?>
            <h1>Blogs</h1>
          </div>
        </div>
      </div>

    </div>
    <script src="js/script.js"></script>
  </body>

  </html>
<?PHP
} else {
  header("location:sign-in.php");
}
?>