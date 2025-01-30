<?php
if (isset($_POST['save'])) { // cek variable POST from FORM
    include "../../connection.php"; //call connection php mysql

    $refund = isset($_POST['refund']) ? number_format((float)$_POST['refund'], 2, '.', '') : 0.00;

    $query = "INSERT INTO booking_confirmations (booking_id, user_id, amount, refund, payment_status) 
          VALUES ('$_POST[booking_id]', '$_POST[user_id]', '$_POST[amount]', '$refund', 'Paid')";

    $insert = mysqli_query($db_connection, $query);

    $update = "UPDATE bookings SET payment_status = 'Paid' WHERE booking_id = '$_POST[booking_id]'";

    $update_result = mysqli_query($db_connection, $update);

    if ($insert && $update) {
        // echo "<p> medicine Update successfully! </p>";
        echo "<script>alert('Booking Update Successfully!');</script>";
    } else {
        // echo "<p> medicine Update Failed! </p>";
        echo "<script>alert('Booking Update Failed!')</script>";
    }
}
?>

<script>window.location.href = "../read_booking.php";</script>
