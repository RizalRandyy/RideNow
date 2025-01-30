<?php
$currentPage = 'read_motorcycle.php'; // Menggunakan read motorcycle agar sidebarnya aktif
$title = 'Add Motorcycle';
include '../components/head.php';

?>

<div class="container">
  <div class="card">
    <div class="card-body">
      <form action="action/create_motorcycle.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label for="brand" class="form-label">Brand</label>
          <input type="text" name="brand" required class="form-control">
        </div>

        <div class="form-group">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" required class="form-control">
        </div>

        <div class="form-group">
          <label for="description" class="form-label">Description</label>
          <input type="text" name="description" required class="form-control">
        </div>

        <div class="form-group">
          <label for="type" class="form-label">Type</label>
          <select name="type" required class="form-select">
            <option value="" selected disabled>Choose</option>
            <option value="Manual">Manual</option>
            <option value="Matic">Matic</option>
          </select>
        </div>

        <div class="form-group">
          <label for="price" class="form-label">Price Per Day</label>
          <input type="number" name="price_per_day" required class="form-control">
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