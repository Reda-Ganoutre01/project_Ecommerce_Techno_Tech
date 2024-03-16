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
    <?php include("header.php");?>
  <?php include('section.php');?> 







    <section id="product1" class="section-p1">
    <h2 class="title">LES PLUS VENDUS</h2>
    <a href="#" class='plus'>
      Plus >
    </a>
<div class="pro-container">

    <?php
        $pdo=new pdo('mysql:host=localhost;dbname=ecom_db','root','');
        $produit=$pdo->prepare("select * from produits where top='10' GROUP BY id DESC LIMIT 5" );
        $produit->execute();
        $data=$produit->fetchAll();
        
        foreach ($data as $val){
         

            echo '<div class="pro">';
            echo    '<img  src='.$val['img'].'>';
            echo '        <div class="des">';
            echo '<span>'.$val['Nom_categorie'].'</span>';
            echo '<h5>'.$val['nom'].'</h5>';
            echo '<div class="star">';
            for ($i=0;$i<$val['nbr_star'];$i++){
                echo '<i class="fa fa-star rating-color"></i>';
            }
            echo '<i class="fa fa-star"></i>';
            echo '</div>';
        
            echo '<h4>' . $val['prix'] . ',00 MAD' . '</h4>';
            echo ' </div>';

            echo '
                    <a class="cart" href="Detail_Produit.php?id1=' . $val["id"] . '">Voir details</a>';
            echo '</div>';
        }
        ?>
 
    
</div>
</section>


<section id="product1" class="section-p1">
    <h2 class="title2">Ecran Gamer</h2>
    <a href="#" class='plus'>
      Plus >
    </a>
<div class="pro-container">

    <?php
        $pdo=new pdo('mysql:host=localhost;dbname=ecom_db','root','');
        $produit=$pdo->prepare("select * from produits where Nom_categorie LIKE 'Ecran Gamer' GROUP BY id DESC LIMIT 5" );
        $produit->execute();
        $data=$produit->fetchAll();
        
        foreach ($data as $val){
         

            echo '<div class="pro">';
            echo    '<img  src='.$val['img'].'>';
            echo '        <div class="des">';
            echo '<span>'.$val['Nom_categorie'].'</span>';
            echo '<h5>'.$val['nom'].'</h5>';
            echo '<div class="star">';
            for ($i=0;$i<$val['nbr_star'];$i++){
                echo '<i class="fa fa-star rating-color"></i>';
            }
            echo '<i class="fa fa-star"></i>';
            echo '</div>';
        
            echo '<h4>' . $val['prix'] . ',00 MAD' . '</h4>';
            echo ' </div>';

            echo '
                    <a class="cart" href="Detail_Produit.php?id1=' . $val["id"] . '">Voir details</a>';
            echo '</div>';
        }
        ?>
 
    
</div>
</section>












    <?php
include("footer.php");
    ?>   
  </body>
</html>
