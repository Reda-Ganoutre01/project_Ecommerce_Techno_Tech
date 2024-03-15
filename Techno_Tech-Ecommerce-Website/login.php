<?php

$mess=null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <style>
.wrapp{
width:450px;
padding: 2rem 1rem;
margin: 50px auto;
background-color: white;
border-radius: 1.5rem;
text-align: center;
box-shadow: 0 20px 35px rgba(0,0,0, 0.1);
backdrop-filter: blur(1.5px);


}
#wrapp_title{

font-size: 2rem;
color: #07001f;
margin-bottom: 1.2rem;

}

.wrapp_form input{
width: 92%;
outline: none;
border: 1px solid #fff;
padding: 12px 20px;
margin-bottom: 10px;
border-radius: 20px;
background: #e4e4e4;


}
#wrapp_btn{

font-size: 1rem;
margin-top: 1.8rem;
padding: 10px 0;
border-radius: 20px;
outline: none;
border: none;
width: 90%;
color: #fff;
cursor: pointer;
background: rgb(17, 107, 143);

}
#wrapp_btn:hover {

background: rgba(17, 107, 143, 0.877);
}

.wrapp_form input:focus {

border: 1px solid rgb(192, 192, 192);

}

.wrapp .member{

font-size: 0.8rem;
margin-top: 1.4rem;
color: #636363;


}
.wrapp .member a{

color: rgb(17, 107, 143);
text-decoration: none;
}
.empty{
    color:red;
}
        </style>
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
