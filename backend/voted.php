<?php
include("connect.php");
session_start();
if (!isset($_SESSION["user_data"])) {
    header('location: ../components/login.html');
}
$userdata = $_SESSION["user_data"];

$user_id = $userdata["id"];
$party_id = $_POST["pid"];
$party_votes = $_POST["pvotes"];
$total_votes = $party_votes+1;

$update_votes = mysqli_query($con, "UPDATE `user` SET votes='$total_votes' WHERE id='$party_id';");
$update_user = mysqli_query($con, "UPDATE `user` SET status=1 WHERE id='$user_id';");

if ($update_votes and $update_user) {
    $verify = mysqli_query($con, "SELECT * FROM `user` WHERE id='$user_id';");
    $user_data = mysqli_fetch_array($verify);
    $fetch_group = mysqli_query($con, "SELECT * FROM `user` WHERE role=2;");
    $group_data = mysqli_fetch_all($fetch_group, MYSQLI_ASSOC);

    $_SESSION['user_data'] = $user_data;
    $_SESSION['group_data'] = $group_data;
    header('location: ../home.php');
} else {
    echo "<script>
            alert('Some error ocured.');
            window.location.href = '../home.php';
        </script>";
}

?>