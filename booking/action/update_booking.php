<?php
if (isset($_POST['save'])) { // cek variable POST from FORM
    include "../../connection.php"; //call connection php mysql

    // sql query UPDATE INTO VALUES
    $query = "UPDATE bookings SET 
    customer_name='$_POST[customer_name]',
    phone_number='$_POST[phone_number]',
    motorcycle_id ='$_POST[motorcycle_id]',
    start_date='$_POST[start_date]',
    duration='$_POST[duration]',
    return_method='$_POST[return_method]',
    WHERE booking_id ='$_POST[booking_id]'";
    // run query
    $update = mysqli_query($db_connection, $query);

    if ($update) {
        // echo "<p> medicine Update successfully! </p>";
        echo "<script>alert('Booking Update Successfully!')</script>";
    } else {
        // echo "<p> medicine Update Failed! </p>";
        echo "<script>alert('Booking Update Failed!')</script>";
    }
}
?>
<!-- <p><a href="read_medicine_230009.php">Kembali</a></p> -->
<script>window.location.href("../read_booking.php")</script>

