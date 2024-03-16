<?php

$mess=null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Techno Tech</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      

      />
    <link rel="icon" href="img/logo/logo rev.png" />
  </head>
<body>
<?php 
include("header.php"); ?>
<div class="wrapp">
    <h1 id="wrapp_title">Sign In</h1>
    <form action='' method='POST' class='wrapp_form'>
        <?php if(isset($email_error)) { echo $email_error; } ?>
        <input type="text" id='email' name='email' placeholder='email' class='login-input'/>
        <?php if(isset($password_error)) { echo $password_error; } ?>
        <input type="password" id='password' name='password' placeholder='password' class='login-input'/>
        <button type='submit' name='login' id="wrapp_btn">Log in</button>
    </form>
    <div class="member">
        Not a member? <a href='Register.php'>Register Now</a>
    </div>
</div></body>
</html>
<?php 
include("footer.php"); ?>

<?php
include('includ/connection.php');
if(isset($_POST['login'])) {
    $email = strtolower($_POST["email"]);
    $password = strtolower($_POST["password"]);

    if(empty($email)) {
        $email_error = "<p class='empty'>Please insert Email</p>";
    }

    if(empty($password)) {
        $password_error = "<p class='empty'>Please insert password</p>";
    }

    if(!isset($email_error) && !isset($password_error)) {
        $sql = "SELECT * FROM client WHERE email_client='$email' AND mod_pass_client='$password' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row && $row['email_client'] === $email && $row['mod_pass_client'] === $password) {
            session_start();
            $_SESSION['username'] = $row['nom_client'];
            $_SESSION['email'] = $row['email_client'];
            echo "hello";
            exit();
        } else {
            $mess= "<p>Your password or email not correct</p>";
        }
    }
}
?>
