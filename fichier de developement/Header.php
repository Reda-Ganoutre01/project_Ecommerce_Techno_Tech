<?php
$pdo=mysqli_connect('localhost','root','','ecom_db');
$s=mysqli_query($pdo,"select * from categories");

?>
<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

      <link rel="stylesheet" href="style/styles_head.css">

      <title></title>
   </head>
   <body>
      <header class="header">
         <nav class="nav container">
            <div class="nav__data">
               <a href="index.php" class="nav__logo">
                  <!-- <i class="ri-planet-line"></i> Techno Tech -->
                  <img src="logo/logo rev.png" id="logo">
               </a>
               <form class="Search" method="post">
                  <input type="text" placeholder="Rechercher..." name="q">
                  <button type="submit" name="search_btn"><img src="images/icons-header/search.png"></button>
            <?php
            if (isset($_POST['search_btn'])){
               echo "<script>alert('search No Item Found!')</script>";
            }

            ?>
                  
                </form>
               <div class="nav__toggle" id="nav-toggle">
                  <i class="ri-menu-line nav__burger"></i>
                  <i class="ri-close-line nav__close"></i>
               </div>
               
            </div>

            



            <div class="nav__menu" id="nav-menu">
               <ul class="nav__list">
                  <li><a href="#" class="nav__link">About</a></li>

                  <li><a href="#" class="nav__link">Products</a></li>

                  <!--=============== DROPDOWN 1 ===============-->
                  <li class="dropdown__item">
                     <div class="nav__link">
                        Categorie <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                     </div>
  
                        <ul class="dropdown__menu">
<?php
while($r=mysqli_fetch_array($s))
{
   ?>


<li>
                           <a href="#" class="dropdown__link">
                            <?php
                            echo $r['nom_Categorie'] ?>
                           </a>                          
                        </li>

<?php

}

?>                        

                     

                  
               

               
                     </ul>
                  </li>


                  <li><a href="#" class="nav__link">Contact Us</a></li>
                  <li><a href="auth.php" class="nav__link"><img src="icons-header/user (1).png" id="icons" alt=""></a></li>
                  <li><a href="#" class="nav__link">
                     
                     <img src="icons-header/heart.png" id="icons" alt=""><h4 id="counter">0</h4></a></li>
                  <li><a href="#" class="nav__link"><img src="icons-header/shopping-cart.png" id="icons" alt=""></a></li>

               </ul>
            </div>
         </nav>
      </header>

      <script src="script/main_head.js"></script>
   </body>
</html>