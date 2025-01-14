<?php
include "connection.php"; // Call your connection file

$query = "SELECT * FROM motorcycles";
$result = mysqli_query($db_connection, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/index.css">
    <title>Document</title>
</head>

<body>
    <!-- Main Content -->
    <div class="container-main">
        <div class="nav">
            <h1 class="logo">RideNow</h1>
            <ul class="menu-items">
                <li>Home</li>
                <li>List</li>
                <li>About</li>
            </ul>
        </div>
        <div class="background-text">
            <h1>RIDENOW<span>Rental</span></h1>
        </div>
        <div class="main-content">
            <div class="content-1">1.1m</div>
            <div class="content-2"><a href=""><img src="/public/assets/uploads/images/motorcycles/h2r.png" alt=""></a></div>
            <div class="content-3">Kawasaki <br> H2R</div>
        </div>
    </div>

    <!-- Nav Main -->
    <div class="nav-main">
        <div class="nav2">
            <h1 class="logo2">RideNow</h1>
            <ul class="menu-items2">
                <li>Home</li>
                <li>List</li>
                <li>About</li>
            </ul>
        </div>
        <img src="/public/assets/uploads/images/motorcycles/h2r1.png" alt="">
    </div>

    <!-- Merk Content -->
    <div class="merk-content">
        <a href=""><img src="/public/assets/uploads/images/motorcycles/kawasaki.png" alt=""></a>
        <a href=""><img src="/public/assets/uploads/images/motorcycles/bmwlogo.png" alt=""></a>
        <a href=""><img src="/public/assets/uploads/images/motorcycles/ducatilogo.png" alt=""></a>
        <a href=""><img src="/public/assets/uploads/images/motorcycles/hondalg.png" alt=""></a>
    </div>

    <!-- List Content -->
    <div class="list-content">
        <div class="judul">POPULAR MOTOR</div>
        <div class="box-list">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="list-1">
                    <div class="harga">
                        <div class="harga-list">
                            <p><?php echo $row['price_per_day']; ?></p>
                        </div>
                    </div>
                    <div class="jenis-motor">Motor Sport</div>
                    <div class="gambar-motor"> <img src="/public/assets/uploads/images/motorcycles/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>" width="230" height="200"> </div>
                    <div class="nama-motor"><?php echo $row['name']; ?></div>
                    <div class="order-btn"><a href="booking/add_booking.php?id=<?php echo $row['motorcycle_id']; ?>" class="button">ROADNOW</a></div>
                </div>
            <?php } ?>
        </div>
        <div class="button"></div>
    </div>

    <!-- About -->
    <div class="about">
        <div class="about-left">
            <h2>Tentang Perusahaan</h2>
            <p>RideNow adalah perusahaan rental motor yang menyediakan berbagai jenis motor untuk disewa. Kami berkomitmen untuk memberikan pelayanan terbaik kepada pelanggan kami.</p>
        </div>
        <div class="about-right">
            <h2>Kontak Kami</h2>
            <p>Telepon: 123-456-7890</p>
            <p>Email: info@ridenow.com</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-left">
            <p>&copy; 2023 RideNow. All rights reserved.</p>
        </div>
        <div class="footer-right">
            <a href="#"><img src="/public/assets/uploads/images/motorcycles/facebook.png" alt="Facebook"></a>
            <a href="#"><img src="/public/assets/uploads/images/motorcycles/twitter.png" alt="Twitter"></a>
            <a href="#"><img src="/public/assets/uploads/images/motorcycles/instagram.png" alt="Instagram"></a>
        </div>
    </div>
</body>

</html>