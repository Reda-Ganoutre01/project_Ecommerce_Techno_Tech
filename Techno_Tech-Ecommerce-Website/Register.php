  <?php
include("header.php");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style_sect.css">

</head>


      <body style='background: url(images/backk6.svg); background-size: cover;'>
  
    
  <div class="wrapp">
    

       
        <h1>Sign Up</h1>
    
        
        <form action='Register_process.php' method='POST'>
          <input type="text" id='Username' name='Username'  placeholder='Username'/>
          <input type="email" id='email' name='email' placeholder='email'/>
          <input type="password" id='password' name='password' placeholder='new password'/>
          <input type="password" id='password' name='Repet_password' placeholder='confirme password'/>
          <button type="submit" name='register'>Register</button>
        </form>
       
        <div class="member">
          Already a member? <a href='login.php' >Log Here</a>
        </div>
  </div>


</body>
   
    
  
      


</html>
    
   <?php
include("footer.php");
    ?> 

<?php
include('includ/connection.php');
if(isset($_POST['register'])){

    $username =strtolower($_POST['Username']);
    $email=$_POST['email'];
    $password=$_POST['password'];
    $repetpassword=$_POST['Repet_password'];

    $error=array();

    // $passwordHash=password_hash($password,PASSWORD_DEFAULT);

    if(empty($username) OR empty($email) OR empty($password) OR empty($repetpassword)){
        array_push($error,"All fields are required");
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        array_push($error,"Email is not valid");
    }
    if(strlen($password)<8){
 
        array_push($error,'password must be at last charactes long ');

    }if($password !==$repetpassword){

        array_push($error,"password does not match");

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
            echo "is alredy register";

           }// Insert new user into the database
           else{
            require_once "includ/connection.php";
            $sql_insert="INSERT INTO client(nom_client,email_client,mod_pass_client) VALUES('$username','$email','$password')";
            if($conn->query($sql_insert)===TRUE){

                echo "Registration successful";
                header("Location: login.php");

            }else{

                echo "ERROR". $sql_insert . "<br>" . $conn->error;

            }

           }
            

        }


};