<?php
include("connect.php");

$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$password = $_POST['pwd'];
$c_password = $_POST['cpwd'];
$mobile = $_POST['mobile'];
$role = $_POST['role'];
$photo = $_FILES['photo']['name'];
$tmp_photo = $_FILES['photo']['tmp_name'];

if ($password == $c_password) {
    move_uploaded_file($tmp_photo, "../images/".basename($photo));
    $sql = mysqli_query($con, "INSERT INTO `user` (`name`, `age`, `email`, `password`, `mobile`, `role`, `image`, `status`, `votes`) VALUES ('$name', '$age', '$email', '$password', '$mobile', '$role', '$photo', 0, 0);");
    if ($sql) {
        echo "<script>
                window.location.href = '../components/login.html';
              </script>";
    } else {
        echo "<script>
                alert('Internal Server Error');
                window.location.href = '../components/register.html';
              </script>";
    }
    
} else {
    echo "<script>
            alert('Password and Confirm Password does not match');
        </script>";
}
?>