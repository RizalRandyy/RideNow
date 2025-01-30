<?php

session_start();
// if (!isset($_SESSION['login'])) {
//     echo "<script>
//           alert('Please login first!');
//           window.location.replace('/ridenow/auth/form_login.php');
//         </script>";
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
        <link rel="stylesheet" href="../public/css/style.css">
        <script src="../public/js/sidebar.js"></script>
</head>

<body>
    <?php
    include "navbar.php";
    include "sidebar.php";
    ?>
    <main class="content shifted" id="content">

    <div class="flex items-center" style="justify-content: end;">
      <?php include '../public/assets/images/logo/light.svg' ?>
      <div class="wrapper" id="toggle-wrapper">
        <input id="checkbox" type="checkbox" checked="checked" />
        <label class="button" for="checkbox">
          <div class="dot"></div>
        </label>
      </div>
      <?php include '../public/assets/images/logo/dark.svg' ?>
    </div>