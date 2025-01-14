<?php

$logoPath = '../public/assets/images/logo/';
$baseLink = ($currentPage == "manager/index.php") ? '' : '../';

$menuItems = [
    ['Dashboard', 'manager/index.php', 'home.svg'],
    ['Motorcycles', 'motorcycle/read_motorcycle.php', 'motorcycle.svg'],
    ['Booking', 'booking/read_booking.php', 'booking.svg'],



];

if ($_SESSION['role'] == 'Manager') {
    $menuItems[] = ['Users', 'user/read_user.php', 'employees.svg'];
}
?>

<div class="sidebar active" id="sidebar">
    <button class="close-btn" id="close" onclick="toggleSidebar()">X</button>
    <ul class="sidebar-links">
        <li>
            <h1>Ridenow</h1>
        </li>
        <?php foreach ($menuItems as [$title, $link, $icon]) : ?>
            <?php $active = ($currentPage == basename($link)) ? 'active' : ''; ?>
            <li>
                
                <a href="<?= $baseLink . $link ?>" class="<?= $active ?>">
                <?php include $logoPath . $icon ?> <?= $title ?>
                </a>
            </li>
        <?php endforeach; ?>

        <hr>

        <li class="dropdown">   
            <?php $active = ($currentPage == 'profile_settings.php' || $currentPage == 'edit_profile.php') ? 'active' : ''; ?>
            <a class="dropdown-toggle <?= $active ?>"><?php include $logoPath . 'gear.svg' ?>Settings</a>
            <div class="settings-arrow">
                <img src="<?= $logoPath ?>arrowDown.png" alt="arrow logo">
            </div>
            <ul class="dropdown-menu" id="settings-dropdown">
                <li><a href="/ridenow/user_settings/profile_settings.php?id=<?= $_SESSION['user_id'] ?>">Profile Settings</a></li>
                <li><a href="/ridenow/auth/action/logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const dropdownToggle = document.querySelector('.dropdown-toggle');
        const dropdownMenu = document.querySelector('.dropdown-menu');
        const arrowImage = document.querySelector('.settings-arrow img');

        dropdownToggle.addEventListener('click', () => {
            dropdownMenu.classList.toggle('show');
            arrowImage.src = dropdownMenu.classList.contains('show') ?
                '<?= $logoPath ?>arrowUp.png' :
                '<?= $logoPath ?>arrowDown.png';
        });
    });
</script>