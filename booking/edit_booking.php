<?php
$currentPage = 'read_booking.php'; // Menggunakan read motorcycle agar sidebarnya aktif
$title = 'Edit Booking';
include '../components/head.php';

include '../connection.php';

$query = "SELECT * FROM bookings WHERE booking_id='$_GET[id]'";

$motorcycle = mysqli_query($db_connection, $query);

$data = mysqli_fetch_assoc($motorcycle);

?>

<div class="container">
  <div class="card">
    <div class="card-body">
      <form action="action/update_booking.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label for="customer_name" class="form-label">Brand</label>
          <input type="text" name="customer_name" required class="form-control" value="<?= $data['customer_name'] ?>">
        </div>

        <div class="form-group">
          <label for="phone_number" class="form-label">Phone</label>
          <input type="number" name="phone_number" required class="form-control" value="<?= $data['phone_number'] ?>">
        </div>

        <div class="form-group">
          <label for="motorcycle_id" class="form-label">Motorcycle</label>
          <input type="text" name="motorcycle_id" required class="form-control" value="<?= $data['motorcycle_id'] ?>">
        </div>

        <div class="form-group">
          <label for="start_date" class="form-label">Motorcycle</label>
          <input type="date" name="start_date" required class="form-control" value="<?= $data['start_date'] ?>">
        </div>

        <div class="form-group">
          <label for="duration" class="form-label">Motorcycle</label>
          <input type="number" name="duration" required class="form-control" value="<?= $data['duration'] ?>">
        </div>

        <div class="form-group">
          <label for="type" class="form-label">Return Method</label>
          <select name="return_method" required class="form-select">
            <option value="" selected disabled>Choose</option>
            <option value="Dikantor" <?= ($data['return_method'] == 'Dikantor') ? 'selected' : ''; ?>>Dikantor</option>
            <option value="Dirumah" <?= ($data['return_method'] == 'Dirumah') ? 'selected' : ''; ?>>Dirumah</option>
          </select>
        </div>

        <div class="form-group">
          <label for="total_price" class="form-label">Price Per Day</label>
          <input type="number" name="total_price" required class="form-control" value="<?= $data['total_price'] ?>">
        </div>

        <div class="form-group" style="display:flex; justify-content:flex-end;">
          <input type="submit" name="save" value="Save" class="btn btn-success mx-3" style="cursor: pointer;">
          <input type="reset" name="reset" value="Reset" class="btn btn-danger" style="cursor: pointer;">
          <input type="hidden" name="booking_id" value="<?= $data['booking_id'] ?>">
        </div>

      </form>
    </div>
  </div>
</div>

<script>window.location.href("read_booking.php")</script>