<?php
session_start();
if (isset($_POST['save'])) {
  include "../../connection.php";

  if ($_POST['new_password'] != '') {
    $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    $_SESSION['password'] = $password;
  } else {
    $password = $_SESSION['password'];
  }

  $folder = '../../public/assets/uploads/images/users/';

  $photo;

  if (move_uploaded_file($_FILES['new_photo']['tmp_name'], $folder . $_FILES['new_photo']['name'])) {
    // Success upload, get the photo name
    $photo = $_FILES['new_photo']['name'];
  } else {
    $photo = $_SESSION['photo'];
  }

  $query = "UPDATE users SET
            username = '$_POST[username]',
            password = '$password',
            fullname = '$_POST[fullname]',
            email = '$_POST[email]',
            phone = '$_POST[phone]',
            photo = '$photo'
            WHERE user_id = '$_POST[user_id]'; 
            ";

  $update = mysqli_query($db_connection, $query);

  if ($update) {
    if ($_POST['new_photo'] !== 'default.png') {
      // unlink($folder . $_POST['new_photo']);

      $_SESSION['username'] = $_POST['username'];
      $_SESSION['fullname'] = $_POST['fullname'];
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['phone'] = $_POST['phone'];
      $_SESSION['photo'] = $photo;
      echo "<script>alert('User updated successfully!');</script>";
    } else {
      echo "<script>alert('User update failed!');</script>";
    }
  }
}
?>

<script>
  window.location.replace("../profile_settings.php");
</script>