

<?php
include("header.php");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style_auth.css"/>
    <title>Log in</title>

</head>

    

    <body style='background: url(images/backk3.svg); background-size: cover;'>
    

    <div class="wrapp">
            <h1 >Sign In<h1>
            <form action='login_process.php' method='POST'>
    
            <?php 
            if(isset($email_error)){
                echo $email_error;
            }?>
    
                <input type="text" id='email' name='email' placeholder='email' class='login-input'/>
            <?php 
            if(isset($password_error)){
                echo $password_error;
            }?>
                <input type="password" id='password' name='password' placeholder='password' class='login-input'/>
            </form>
        <button type='submit' name='login'>Log in</button>
        <div class="member">
        Not a member? <a href='Register.php'>Register Now</a>
        
        </div>
    </div>
    
    </body>
  
</html><?php
include("footer.php");
    ?> 
<?php


session_start();
include('Components/Conex.php');




if(isset($_POST['email']) && isset($_POST['password'])){

    $email = strtolower($_POST["email"]);
    $password = strtolower($_POST["password"]);

    if(empty($email)){
        $email_error="<p>Please insert Email</p>";
        $err_s=1;
    }
    if(empty($password)){
        $password_error="<p>Please insert password </p>";
        $err_s=1;
        
    }
   
}

if(!isset($err_s)){
    $sql="SELECT * FROM client WHERE email_client='$email' AND mod_pass_client='$password' ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    if($row && $row['email_client']=== $email && $row['mod_pass_client']=== $password){

        $_SESSION['username']=$row['nom_client'];
        $_SESSION['email']=$row['email_client'];
        echo "hello";
        exit();

    }else {

        echo "Your password or email not correct";

    }

}


