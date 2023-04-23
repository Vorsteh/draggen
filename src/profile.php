<?php
require 'config.php';
if(!empty($_SESSION['id'])){
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);
}else{
    header('Location: login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/output.css">
    <title>Profil</title>
</head>
<body>
    <?php 
        $image = $row["profilepicture"];
        $mail = $row['email'];
        $usrname = $row['username'];
    ?>
    <div>
        <img class='rounded-full' width='50px' src="../images/<?php echo $image?>" alt="">
        <p>Användarnamn: <?php echo $usrname ?></p>
        <p>Email: <?php echo $mail ?></p>
    </div>
</body>
</html>