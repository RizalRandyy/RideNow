<?php
$currentPage = 'read_user.php'; // Menggunakan read user agar sidebarnya aktif
$title = 'Add User';
include '../components/head.php';

?>

<div class="contaianer">
  <div class="card">
    <div class="card-body">
      <form action="action/create_user.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" required class="form-control">
        </div>

        <div class="form-group">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" required class="form-control">
        </div>

        <div class="form-group">
          <label for="role" class="form-label">Role</label>
          <select name="role" required class="form-select">
            <option value="" selected disabled>Choose</option>
            <option value="Manager">Manager</option>
            <option value="Admin">Admin</option>
          </select>
        </div>

        <div class="form-group">
          <label for="fullname" class="form-label">Fullname</label>
          <input type="textarea" name="fullname" required class="form-control">
        </div>

        <div class="form-group">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" required class="form-control">
        </div>

        <div class="form-group">
          <label for="phone" class="form-label">Phone</label>
          <input type="text" name="phone" required class="form-control">
        </div>

        <div class="form-group">
          <label for="photo" class="form-label">Photo</label>
          <input type="file" name="photo" class="form-control">
        </div>

        <div class="form-group" style="display:flex; justify-content:flex-end;">
          <input type="submit" name="save" value="Save" class="btn btn-success mx-3" style="cursor: pointer;">
          <input type="reset" name="reset" value="Reset" class="btn btn-danger" style="cursor: pointer;">
        </div>
        
      </form>
    </div>
  </div>
</div>

<?php include '../components/footer.php' ?>