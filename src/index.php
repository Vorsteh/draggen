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
    <title>Draggen</title>
    <link rel="stylesheet" href="../dist/output.css">
</head>
<body>
    <h1 class="text-center text-5xl font-semibold">Välkommen <?php echo $row['name']?></h1>
    <div class='m-auto mt-32 w-2/5 text-center border-2 border-black p-12 block'>
        <div class='p-3 bg-gray-100 shadow-sm hover:bg-gray-200 w-1/5 rounded-md mb-3 m-auto font-semibold'>
            <a href="profile.php">Min Profil</a>
        </div>
        <div class='p-3 bg-gray-100 shadow-sm hover:bg-gray-200 w-1/5 rounded-md m-auto font-semibold'>
            <a href="logout.php">Logga ut</a>
        </div>
    </div>
</body>
</html>