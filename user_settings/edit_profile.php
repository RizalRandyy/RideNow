<?php
$currentPage = 'edit_profile.php';
$title = 'Add User';
include '../components/head.php';

include '../connection.php';

$query = "SELECT * FROM users WHERE user_id='$_GET[id]'";

$user = mysqli_query($db_connection, $query);

$data = mysqli_fetch_assoc($user);

?>

<div class="contaianer">
  <div class="card">
    <div class="card-body">
      <form action="action/update_profile.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" value="<?= $data['username'] ?>" class="form-control">
        </div>

        <div class="form-group">
          <label for="new-password" class="form-label"> New Password</label>
          <input type="password" name="new_password" id="new" class="form-control">
          <label for="show-password">Show Password</label>
          <input type="checkbox" onclick="show()">
        </div>

        <div class="form-group">
          <label for="role" class="form-label">Role</label>
          <select name="role" required class="form-select" disabled>
            <option value="" selected disabled>Choose</option>
            <option value="Manager" <?= ($data['role'] == 'Manager') ? 'selected' : ''; ?>>Manager</option>
            <option value="Admin" <?= ($data['role'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>

        <div class="form-group">
          <label for="fullname" class="form-label">Fullname</label>
          <input type="text" name="fullname" value="<?= $data['fullname'] ?>" required class="form-control">
        </div>

        <div class="form-group">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" value="<?= $data['email'] ?>" required class="form-control">
        </div>

        <div class="form-group">
          <label for="phone" class="form-label">Phone</label>
          <input type="text" name="phone" value="<?= $data['phone'] ?>" class="form-control">
        </div>

        <div class="form-group">
          <p class="font-semibold">Photo</p>
          <img src="../public/assets/uploads/images/users/<?= $data['photo'] ?>" width="100" height="100" alt="user-photo">
          <input type="file" name="new_photo">
        </div>

        <div class="form-group" style="display:flex; justify-content:flex-end;">
          <input type="submit" name="save" value="Save" class="btn btn-success mx-3" style="cursor: pointer;">
          <input type="hidden" name="user_id" value="<?= $data['user_id'] ?>">
          <input type="hidden" name="new_photo" value="<?= $data['photo'] ?>">
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function show() {
    var x = document.getElementById("new");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>

<?php include '../components/footer.php' ?>