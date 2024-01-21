<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
} else {
  $loggedin = false;
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Music Masti</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<style>
  .navbar {
    padding: 15px;
  }

  .user,
  .cart {
    border: #C3C4C5 2px solid;
    border-radius: 8px;
    padding: 8px;
    height: 50px;
  }
  img {
    margin-right: 8px;
  }

  h5 {
    font-size: 28px;
  }
</style>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/website/ecom-website/ecom/">
        <div class="d-flex flex-row justify-content-start">
          <img src="https://i.imgur.com/RV41OkU.png" height="45px">
          <div class="d-flex flex-column justify-content-end">
            <strong>
              <h5>Music Masti</h5>
            </strong>
          </div>
        </div>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/website/ecom-website/ecom/welcome.php">Home</a>
          </li>

        <?php if (!$loggedin) : ?>
          <li class="nav-item">
            <a class="nav-link" href="/website/ecom-website/ecom/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/website/ecom-website/ecom/signup.php">Sign Up</a>
          </li>
        </ul>

        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="/website/ecom-website/ecom/logout.php">Logout</a>
          </li>
        </ul>

        <div class="cart me-4 p-2 px-4 d-flex">
          <a href="/website/ecom-website/ecom/cart.php" class="text-decoration-none text-light d-flex flex-column justify-content-center carttext">
            My Cart
          </a>
        </div>
        <div class="user d-flex">
          <img src="https://cdn-icons-png.flaticon.com/512/9131/9131529.png" height="30px">
          <div class="d-flex flex-column justify-content-center">
            <strong>
              <?php echo $_SESSION['Name']; ?>
            </strong>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </nav>

</body>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var path = window.location.pathname;
    var page = path.split("/").pop();
    var activeNavItem = document.querySelector('a[href="/website/ecom-website/ecom/' + page + '"]');
    if (activeNavItem) {
      activeNavItem.classList.add('active');
    }
  });
</script>