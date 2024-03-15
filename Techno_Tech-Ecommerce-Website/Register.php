
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
include("header.php");
    ?>
    <div class="wrapp">
            <h1 id="wrapp_title">Sign Up<h1>
            <form action='' method='POST' class='wrapp_form'>
            <input type="text" id='Username' name='Username'  placeholder='Username' id="wrapp_input"/>
            <input type="email" id='email' name='email' placeholder='email' id="wrapp_input"/>
            <input type="password" id='password' name='password' placeholder='new password' id="wrapp_input"/>
            <input type="password" id='password' name='Repet_password' placeholder='confirme password' id="wrapp_input"/>
            <button type="submit" name='register' id="wrapp_btn">Register</button>
          

          </form>
         
          <div class="member">
            Already a member? <a href='login.php' id="wrapp_a">Log Here</a>
          </div>
    </div>
    <?php
include("footer.php");
?> 
    </body>
  
</html>

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

            echo "<div class='empty'>$errors</div>";

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
