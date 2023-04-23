<?php
require 'config.php';
if(!empty($_SESSION['id'])){
    header('Location: index.php');
}
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    list($a, $b) = explode("@", $email);

    if($b !== 'edu.umea.se'){
        echo
        "<script> alert('Otillåten mail!'); </script>";
    }else{
        $password = $_POST['password'];
        $confpassword = $_POST['confpass'];
        $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
        if(mysqli_num_rows($duplicate) > 0){
            echo
            "<script> alert('Användernamn eller email används redan'); </script>";
        }else{
            if($password == $confpassword){
                $passwordhash = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO users VALUES('', '$name', '$username', '$email', '$passwordhash', 'noprofile.png')";
                mysqli_query($conn, $query);
                echo
                "<script> alert('Användare skapad!'); </script>";
                header('Location: login.php');
            }else{
                echo
                "<script> alert('Lösenord matchar inte!'); </script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/output.css">
    <title>Regristrera</title>
</head>
<body>
        <h2>Registerar dig nu!</h2>
        <form action="" method="post" autocomplete="off">
            <div class='block'>
                <label for="name">Namn</label>
                <input type="text" name='name' id='name' required placeholder='Namn' value=''>
                <label for="name">Användarnamn</label>
                <input type="text" name='username' id='username' required placeholder='Example123' value=''>

                <label for="email">Email</label>
                <input type="text" name='email' id='email' required placeholder='exmaple@gamil.com' value=''>

                <label for="password">Lösenord</label>
                <input type="password" name='password' id='password' required placeholder='XjShad6?Idajs4' value=''>

                <label for="confpass">Lösenord</label>
                <input type="password" name='confpass' id='confpass' required placeholder='XjShad6?Idajs4' value=''>

                <button type='submit' name='submit'>Registerar</button>
            </div>
        </form>
        <br>
        <a href="login.php">Logga in</a>
</body>
</html>