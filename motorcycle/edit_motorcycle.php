<?php
$currentPage = 'read_motorcycle.php'; // Menggunakan read motorcycle agar sidebarnya aktif
$title = 'Edit Motorcycle';
include '../components/head.php';

include '../connection.php';

$query = "SELECT * FROM motorcycles WHERE motorcycle_id='$_GET[id]'";

$motorcycle = mysqli_query($db_connection, $query);

$data = mysqli_fetch_assoc($motorcycle);

?>

<div class="container">
  <div class="card">
    <div class="card-body">
      <form action="action/update_motorcycle.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label for="brand" class="form-label">Brand</label>
          <input type="text" name="brand" required class="form-control" value="<?= $data['brand'] ?>">
        </div>

        <div class="form-group">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" required class="form-control" value="<?= $data['name'] ?>">
        </div>

        <div class="form-group">
          <label for="description" class="form-label">Description</label>
          <input type="text" name="description" required class="form-control" value="<?= $data['description'] ?>">
        </div>

        <div class="form-group">
          <label for="type" class="form-label">Type</label>
          <select name="type" required class="form-select">
            <option value="" selected disabled>Choose</option>
            <option value="Manual" <?= ($data['type'] == 'Manual') ? 'selected' : ''; ?>>Manual</option>
            <option value="Matic" <?= ($data['type'] == 'Matic') ? 'selected' : ''; ?>>Matic</option>
          </select>
        </div>

        <div class="form-group">
          <label for="price" class="form-label">Price Per Day</label>
          <input type="number" name="price_per_day" required class="form-control" value="<?= $data['price_per_day'] ?>">
        </div>

        <div class="form-group">
          <p class="font-semibold">Photo</p>
          <img src="../public/assets/uploads/images/motorcycles/<?= $data['photo'] ?>" width="300" height="300" alt="motorcycle-photo">
          <input type="file" name="new_photo" class="form-control">
        </div>

        <div class="form-group" style="display:flex; justify-content:flex-end;">
          <input type="submit" name="save" value="Save" class="btn btn-success mx-3" style="cursor: pointer;">
          <input type="reset" name="reset" value="Reset" class="btn btn-danger" style="cursor: pointer;">
          <input type="hidden" name="motorcycle_id" value="<?= $data['motorcycle_id'] ?>">
          <input type="hidden" name="new_photo" value="<?= $data['photo'] ?>">
        </div>

      </form>
    </div>
  </div>
</div>

<?php include '../components/footer.php' ?>