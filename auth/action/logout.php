<?php
session_start();
session_destroy();
echo "<script>
        alert('Logout success!');
        window.location.replace('/ridenow/auth/form_login.php');
      </script>";
