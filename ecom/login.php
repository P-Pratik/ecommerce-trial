<?php
$login = false;
$showError = false;
$Name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include("partials/_dbconnect.php");
  $Email = $_POST["Email"];
  $Passwrd = $_POST["Passwrd"];

  $sql = "SELECT * FROM users WHERE Email='$Email' AND Passwrd='$Passwrd'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);

  if ($num == 1) {
    session_destroy();
    $login = true;
    $row = mysqli_fetch_assoc($result);
    $Name = $row['Name'];
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['Email'] = $Email;
    $_SESSION['Name'] = $Name;
    header('Location: welcome.php');
  } else {
    $showError = "Invalid Credentials";
  }
}
?>
<?php include('partials/_nav.php') ?>

<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link rel="stylesheet" href="styles/login.css">
</head>

<body>

  <?php
  if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error! </strong>' . $showError . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>

  <!-- <div class="container">
    <div class="d-flex flex-row justify-content-center">
      <div class="container1">
        <h1>Login</h1>
        <div class="d-flex flex-row justify-content-center">

          <form id="loginForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-group">
              <label for="Email">Email:</label>
              <input type="email" id="Email" name="Email" required>
            </div>
            <div class="form-group">
              <label for="Passwrd">Password:</label>
              <input type="password" id="Passwrd" name="Passwrd" required>
            </div>
            <div class="form-group d-flex flex-row justify-content-center">
              <input class="btn btn-primary" type="submit" value="Login">
            </div>
          </form>

        </div>
        <div class="d-flex flex-row justify-content-center">
          <div class="switch-link">
            <p>Don't have an account? <a href="signup.php">Register now!</a></p>
          </div>
        </div>
      </div>
    </div>
  </div> -->


  <main class="form-signin w-100 m-auto d-flex flex-column justify-content-center align-items-center py-5 mt-5" style="max-width: 400px; ">
    <form id="loginForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

      <h1 class="h3 mb-3 fw-normal">Sign In</h1>

      <div class="form-floating mb-3">
        <input class="form-control" type="email" id="Email" name="Email" placeholder="abc@email.com" required>
        <label for="Email">Email address</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="Passwrd">
        <label for="floatingPassword">Password</label>
      </div>
      <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>

    </form>

    <div class="switch-link">
      <p>Don't have an account? <a href="signup.php">Register now!</a></p>
    </div>
  </main>


</body>

</html>