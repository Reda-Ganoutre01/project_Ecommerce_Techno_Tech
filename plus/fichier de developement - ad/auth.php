<?php


session_start();
include('includ/connection.php');



if (isset($_POST['login'])){
    if(isset($_POST['email']) && isset($_POST['password'])){
    $email = strtolower($_POST["email"]);
    $password = strtolower($_POST["password"]);
    if(empty($email) ){
        $email_error="<h5 style='color:red;opacity:0.9' >Please insert Email </h5>";
        $err_s=1;
    }
    if(empty($password)){
        $password_error="<h5 style='color:red;opacity:0.9' >Please insert password </h5>";
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
        
        include('index.php');
        echo "<script>alert(`hello  {$_SESSION['username']}`)</script>";
        exit();

    }else {

        echo '<h4 style="color:red;opacity:0.9">Your password or email not correct</h4>';

    }

}

}


if(isset($_POST['register'])){

    $username =strtolower($_POST['Username']);
    $email=$_POST['email'];
    $password=$_POST['password'];
    $repetpassword=$_POST['Repet_password'];

    $error=array();

    // $passwordHash=password_hash($password,PASSWORD_DEFAULT);

    if(empty($username) OR empty($email) OR empty($password) OR empty($repetpassword)){
        array_push($error,'<h4 style="color:red;opacity:0.9">All fields are required</h4>');
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        array_push($error,'<h4 style="color:red;opacity:0.9">Email is not valid</h4>');
    }
    if(strlen($password)<8){
 
        array_push($error,'<h4 style="color:red;opacity:0.9">password must be at last charactes long</h4> ');

    }if($password !==$repetpassword){

        array_push($error,'<h4 style="color:red;opacity:0.9">password does not match</h4> ');

    }//check any errors
    if(count($error)>0){
        foreach($error as $errors){

            echo "<div class='alert alert-danger'>$errors</div>";

        }
        
    }
    else{// Check if the username or email is already registered
         $check="SELECT * FROM client WHERE nom_client = '$username' OR email_client = '$email'";
         $checkResult = $conn->query($check);
           if($checkResult->num_rows>0){
            echo "<h4 style='color:green;opacity:0.9'>is alredy register</h4>";

           }// Insert new user into the database
           else{
            require_once "includ/connection.php";
            $sql_insert="INSERT INTO client(nom_client,email_client,mod_pass_client) VALUES('$username','$email','$password')";
            if($conn->query($sql_insert)===TRUE){

                echo "Registration successful";
                header("Location:auth.php");

            }else{

                echo "ERROR". $sql_insert . "<br>" . $conn->error;

            }

           }
            

        }


};


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style/style_auth.css">
</head>

<body>
    <?php
include('Header.php');

?>
<div class="g1">
     <div class="container1" id="container">
        <div class="form-container1 sign-up">
            <!-- partie register -->
             
            <form action='' method='POST' >
                <h1>Create Account</h1>
               
                <span>or use your email for registeration</span>
                <input type="text"  placeholder="Name" id='Username' name='Username'>
                <input type="email" placeholder="Email" id='email' name='email'>
                <input type="password" placeholder="Password"   id='password' name='password'>
                <input type="password" placeholder="confirme password" id='password' name='Repet_password'>

                <button type="submit" name='register'>Sign Up</button>
            </form>
        </div>
<!-- partie login -->



        <div class="form-container1 sign-in">
            <form action='' method='POST'>
                <h1>Sign In</h1>
             
                <span>or use your email password</span>
                <input type="email" placeholder="Email" id='email' name='email'>
                <?php 
        if(isset($email_error)){
            echo $email_error;
        }?>
              
                <input type="password" placeholder="Password" id='password' name='password'>
  <?php 
if(isset($password_error)){
    echo $password_error;
}?>
                <a href="#">Forget Your Password?</a>
                <button type='submit' name='login'>Sign In</button>
            </form>
        </div>
        <div class="toggle-container1">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello Member!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

</div>
   
    <script src="script/script_auth.js"></script>
</body>

</html>
