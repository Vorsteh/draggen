<?php
require 'config.php';
if(!empty($_SESSION['id'])){
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    $query = "UPDATE users SET VALUES('', '$name', '$username', '$email', '$passwordhash', 'noprofile.png')";
    mysqli_query($conn, $query);
}else{
    header('Location: login.php');
}
?>

?>