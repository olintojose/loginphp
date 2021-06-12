<?php
require 'database.php';
$message='';

if (!empty($_POST['email']) && !empty($_POST['password'])){
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password= password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()){
        $message = 'Sucessfully created new user';
    } else {
        $message = 'User not created';
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php require 'partials/header.php' ?>
<?php if(!empty($message)): ?>
<p><?= $message ?></p>
<?php endif; ?>
<h1>SignUp</h1>
<span>or <a href="login.php">Login</a></span>
<form action="signup.php" method="post" >
    <input type="text" name="email" placeholder="Enter your email">
    <input type="password" name="password" placeholder="Enter your password">
    <input type="password" name="confirm_password" placeholder="Confirm your password">

   <input type="submit" value="Send">

    
</form>
    
    
</body>
</html>