<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
} else {
    $loggedin = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>

<style>
    
        .navbar {
            padding: 15px;
        }

        .user{
          border: #C3C4C5 2px solid;
          border-radius: 8px;
          padding: 8px;
        }

        img {
            margin-right: 8px;
        }

        h5 {
            font-size: 28px;
        }
</style>
</head>

<body>

    <?php
    echo '
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="/ecomweb/">
          <div class="d-flex flex-row justify-content-start">
            <img src="https://i.imgur.com/RV41OkU.png" height="45px">
            <div class="d-flex flex-column justify-content-end">
              <strong><h5>Music Masti</h5></strong>
            </div>
          </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/ecomweb/welcome.php">Home</a>
            </li>';

    if (!$loggedin) {
        echo '<li class="nav-item">
              <a class="nav-link" href="/ecomweb/login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/ecomweb/signup.php">Sign Up</a>
            </li>';
    }

    if ($loggedin) {
        echo 
        '<li class="nav-item">
            <a class="nav-link" href="/ecomweb/logout.php">Logout</a>
            </li>
            </ul>
            <div class="user d-flex">
            <img src="https://cdn-icons-png.flaticon.com/512/9131/9131529.png" height="30px">
            <div class="d-flex flex-column justify-content-center">
            <strong>';
          echo $_SESSION['Name'];
          echo'
          </strong>
          </div>
          </div>';
          }
        echo
        '
        </div>
      </div>
    </nav>';
    ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get the current URL path
            var path = window.location.pathname;

            // Extract the last part of the path (filename)
            var page = path.split("/").pop();

            // Select the corresponding navbar item based on the current page
            var activeNavItem = document.querySelector('a[href="/ecomweb/' + page + '"]');

            // Add the "active" class to the selected navbar item
            if (activeNavItem) {
                activeNavItem.classList.add('active');
            }
        });
    </script>
</body>

</html>
