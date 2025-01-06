<?php
$currentPage = 'profile_settings.php';
$title = 'Profile Settings';
include '../components/head.php';

?>

<div class="container">
  <div class="card">
    <div class="card-body">
      <div class="flex responsive text-responsive sm-w-50">
        <img src="/ridenow/public/assets/uploads/images/users/<?= $_SESSION['photo'] ?>" alt="user photo" width="200" height="200" style="border-radius: 50%;" class="mr-5 img-responsive">
        <div class="flex-col w-50 m-0 sm-w-100">
          <div class="text-md mb-0 mt-3 items-center justify-between flex">
            <?= $_SESSION['fullname'] ?>
            <div class="flex edit">
              <a href="edit_profile.php?id=<?= $_SESSION['user_id']?>" class="btn btn-warning btn-sm ml-3 pl-5"><?php include '../public/assets/images/logo/pencil.svg'?>Edit</a>
            </div>
          </div>
          <hr class="mt-3 text-secondary">
          <div class="flex mt-3">
            <p class="text-secondary w-25 m-0 mr-4 mb-2">
              username
            </p>
            <p><?= $_SESSION['username'] ?></p>
          </div>
          <div class="flex">
            <p class="text-secondary w-25 m-0 mr-4 mb-2">Role</p>
            <p><?= $_SESSION['role'] ?></p>
          </div>
          <div class="flex">
            <p class="text-secondary w-25 m-0 mr-4 mb-2">Email</p>
            <p><?= $_SESSION['email'] ?></p>
          </div>
          <div class="flex">
            <p class="text-secondary w-25 m-0 mr-4 mb-2">Phone</p>
            <p><?= $_SESSION['phone'] ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include '../components/footer.php' ?>