<?php

$currentPage = 'index.php';
$title = 'Dashboard';
include '../components/head.php';

include '../connection.php';
$query = "SELECT 'total_employee' AS label, COUNT(*) AS value FROM users WHERE role='admin'
    UNION ALL
    SELECT 'total_confirmed_booking' AS label, COUNT(*) AS value FROM bookings WHERE status='Confirmed'
    UNION ALL
    SELECT 'total_booking' AS label, COUNT(*) AS value FROM bookings
    UNION ALL
    SELECT 'total_price' AS label, SUM(total_price) AS value FROM bookings
    UNION ALL
    SELECT 'user_id' AS label, COUNT(*) AS value FROM booking_confirmations WHERE user_id='{$_SESSION['user_id']}'
";

$result = mysqli_query($db_connection, $query);

// Ambil hasil
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
  $data[$row['label']] = $row['value'];
}

// Assign ke variabel
$total_employee = $data['total_employee'];
$total_confirmed_bookings = $data['total_confirmed_booking'];
$total_booking = $data['total_booking'];
$total_price = $data['total_price'];
$total_confirmed_by_me = $data['user_id'];

$query_latest_customer = "SELECT customer_name FROM bookings ORDER BY booking_id DESC LIMIT 1";
$result_latest_customer = mysqli_fetch_assoc(mysqli_query($db_connection, $query_latest_customer));
$latest_customer_name = $result_latest_customer['customer_name'];


?>

<div class="container">
  <div class="flex justify-between">
    <h2>Dashboard</h2>
  </div>
  <div class="container flex gap-10 px-0">
    <div class="card w-100">
      <div class="card-body">
        <h3 class="mb-3 text-responsive">User Details</h3>
        <div class="flex responsive">
          <img src="../public/assets/uploads/images/users/<?= $_SESSION['photo'] ?>" alt="user-photo" width="200" height="200" style="border-radius: 50%;" class="mr-5 text-responsive">
          <div class="flex-col">
            <p class="text-md mb-5 mt-3 text-responsive">
              <?= $_SESSION['fullname'] ?>
            </p>
            <div class="flex gap-30">
              <div class="mt-5 responsive-hidden">
                <p class="text-secondary">
                  username
                </p>
                <p><?= $_SESSION['username'] ?></p>
              </div>
              <div class="mt-5">
                <p class="text-secondary">Role</p>
                <p><?= $_SESSION['role'] ?></p>
              </div>
              <div class="mt-5">
                <p class="text-secondary">Email</p>
                <p><?= $_SESSION['email'] ?></p>
              </div>
              <div class="mt-5 responsive-hidden">
                <p class="text-secondary">Phone</p>
                <p><?= $_SESSION['phone'] ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card w-25 responsive-hidden">
      <div class="card-body">
        <?php if ($_SESSION['role'] != 'Manager') { ?>
          <div class="flex justify-between">
            <p class="pb-2 font-bold">Approved by Me</p>
            <?php include '../public/assets/images/logo/employee.svg' ?>
          </div>
          <p class="pb-2 text-xl font-bold"><?= $total_confirmed_by_me; ?></p>
        <?php } else { ?>
          <div class="flex justify-between">
            <p class="pb-2 font-bold">Top Employee</p>
            <?php include '../public/assets/images/logo/employee.svg' ?>
          </div>
          <p class="pb-2 text-md font-bold">Jhon Duran</p>
          <p class="pb-2 text-md font-bold">Wanda</p>
        <?php } ?>
      </div>
    </div>
  </div>

  <div class="container flex gap-10 px-0">

    <!-- <div> -->

    <div class="card w-100">
      <div class="card-body">
        <?php if ($_SESSION['role'] != 'Manager') { ?>
          <div class="flex justify-between">
            <p class="pb-2 font-bold">Latest Order</p>
            <?php include '../public/assets/images/logo/latest-order.svg' ?>
          </div>
          <p class="pb-2 text-lg font-bold"><?= $latest_customer_name; ?></p>
        <?php } else { ?>
          <div class="flex justify-between text-responsive">
            <p class="pb-2 font-bold">Total Employee</p>
            <?php include '../public/assets/images/logo/employees.svg' ?>
          </div>
          <p class="pb-2 text-xl font-bold text-responsive"><?= $total_employee; ?></p>
        <?php } ?>
      </div>
    </div>

    <div class="card w-100">
      <div class="card-body">
        <div class="flex justify-between text-responsive">
          <p class="pb-2 font-bold">Total Orders</p>
          <?php include '../public/assets/images/logo/order.svg' ?>
        </div>
        <p class="pb-2 text-xl font-bold text-responsive"><?= $total_booking; ?></p>
        <div class="flex">
          <p class="text-success responsive-hidden">&uarr; since last month</p>
        </div>
      </div>
    </div>

    <!-- </div> -->

    <div class="card w-100">
      <div class="card-body">
        <div class="flex justify-between text-responsive">
          <p class="pb-2 font-bold">Total Approved</p>
          <?php include '../public/assets/images/logo/checkbox.svg' ?>
        </div>
        <p class="pb-2 text-xl font-bold text-responsive"><?= $total_confirmed_bookings; ?></p>
      </div>
    </div>
    <div class="card w-100">
      <div class="card-body">
        <div class="flex justify-between text-responsive">
          <p class="pb-2 font-bold">Month Total</p>
          <?php include '../public/assets/images/logo/dollar.svg' ?>
        </div>
        <p class="pb-2 text-lg font-bold text-responsive">Rp. <?= number_format($total_price, 2, ",", "."); ?></p>
        <div class="flex">
          <p class="text-success responsive-hidden">&uarr; since last month</p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include '../components/footer.php' ?>