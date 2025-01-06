<?php
session_start();
if (isset($_POST['submit'])) {
  include '../../connection.php';

  $query = "SELECT * FROM users WHERE username='$_POST[username]'";

  $login = mysqli_query($db_connection, $query);

  if (mysqli_num_rows($login) > 0) {
    $user = mysqli_fetch_assoc($login);
    if (password_verify($_POST['password'], $user['password'])) {

      $_SESSION['login'] = TRUE;
      $_SESSION['user_id'] = $user['user_id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['password'] = $user['password'];
      $_SESSION['role'] = $user['role'];
      $_SESSION['fullname'] = $user['fullname'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['phone'] = $user['phone'];
      $_SESSION['photo'] = $user['photo'];
      

      echo "<script>
              alert('Login success!');
              window.location.replace('../../manager/index.php');
            </script>";
    } else {
      echo "<script>
              alert('Login failed, wrong password!');
              window.location.replace('../form_login.php');
            </script>";
    }
  } else {
    echo "<script>
            alert('Login failed, user not found!');
            window.location.replace('../form_login.php');
          </script>";
  }
}
