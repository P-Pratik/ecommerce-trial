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

<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link rel="stylesheet" href="styles/login.css">

</head>

<body>
  <?php include('partials/_nav.php') ?>

  <?php
  if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error! </strong>' . $showError . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>

<div class="container">
<div class="d-flex flex-row justify-content-center">
    <div class="container1">
      <h1>Login</h1>
      <div class="d-flex flex-row justify-content-center">
        <!-- Login Form -->
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
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
