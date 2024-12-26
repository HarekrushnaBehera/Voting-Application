<?php
session_start();
include("connect.php");

$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

$verify = mysqli_query($con, "SELECT * FROM `user` WHERE email='$email'AND password='$password'AND role='$role';");
if (mysqli_num_rows($verify) > 0) {
    $user_data = mysqli_fetch_array($verify);
    $fetch_group = mysqli_query($con, "SELECT * FROM `user` WHERE role=2;");
    $group_data = mysqli_fetch_all($fetch_group, MYSQLI_ASSOC);

    $_SESSION['user_data'] = $user_data;
    $_SESSION['group_data'] = $group_data;

    echo "<script>
            window.location.href = '../home.php';
        </script>";
} else {
    echo "<script>
            alert('Invalid Credentials');
            window.location.href = '../components/login.html';
        </script>";
} ?>