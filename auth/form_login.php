
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="../public/css/login.css">
</head>

<body>
  <div class="login-wrap">
    <div class="login-card">
      <h1>Sign In</h1>
      <div class="input-container">
        <form action="action/login.php" method="post">
          <p>Username</p>
          <div class="icon-wrapper">
            <?php include '../public/assets/images/logo/user.svg'; ?>
          </div>
          <input type="text" name="username" placeholder="Enter Username" autocomplete="off">
          <p>Password</p>
          <div class="icon-wrapper">
            <?php include '../public/assets/images/logo/lock.svg'; ?>
          </div>
          <input type="password" name="password" placeholder="Enter Password" id="pass">
          <div class="checkbox">
            <label for="show-password">Show Password</label>
            <input type="checkbox" onclick="show()" id="show-password">
          </div>
          <input type="submit" value="Sign In" name="submit" class="btn-login">
        </form>
      </div>
    </div>
    <div class="right-section">
      <p>Welcome, Admin! Please log in to access the dashboard and manage your settings.</p>
    </div>
  </div>
</body>

</html>

<script>
  function show() {
    var x = document.getElementById("pass");
    if (x.type == "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>