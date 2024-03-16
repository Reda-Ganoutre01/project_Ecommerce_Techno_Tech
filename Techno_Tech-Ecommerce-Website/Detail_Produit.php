<?php
include('header.php');
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Document</title>
</head>
<body>
    <div class="prod">
        <?php

$pdo=new pdo('mysql:host=localhost;dbname=ecom_db','root','');
$id1 = isset($_GET['id1']) ? intval($_GET['id1']) : 0;
$produit = $pdo->prepare("SELECT * FROM produits WHERE id = :id1");

$produit->bindParam(':id1', $id1, PDO::PARAM_INT);
$produit->execute();
$data = $produit->fetchAll();
echo '<div class="row">';
foreach ($data as $val){
   echo '<h1>'.$val['nom'].'</h1>';
    echo    '<img style="width:160px;padding: 10px;" calss="mx-4" src='.$val['img'].'>';

    
    echo '<h6>'.$val['Nom_categorie'].'</h6>';
    echo '<ul class="text-success"><li><h6>En stock</h6></li></ul>';
    echo '<div class="ratings">';
    for ($i=0;$i<$val['nbr_star'];$i++){
        echo '<i class="fa fa-star rating-color"></i>';
        // echo '<img src="images/icons_star/star.png">';

    }
    echo '</div>';
   
    echo '<h6 class="text-primary">'.$val['prix'].',00 MAD'.'</h6>';

    echo '</div>';

   




}
echo '</div>';

?>


    </div>

</div> 


<section id="product1" class="section-p1">
    <h2 class="title">Produits Similaire </h2>
    <a href="#" class='plus'>
      Plus >
    </a>
<div class="pro-container">

    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=ecom_db', 'root', '');

    // Define $id1 if it's not already defined
    $id1 = isset($_GET['id1']) ? intval($_GET['id1']) : 0;
    
    // Retrieve the category name for the given id
    $categorie = $pdo->prepare("SELECT Nom_categorie FROM produits WHERE id = :id1");
    $categorie->bindParam(':id1', $id1, PDO::PARAM_INT);
    $categorie->execute();
    $result = $categorie->fetch(PDO::FETCH_ASSOC);
    $v = $result['Nom_categorie'];
    
    // Retrieve products for the specified category
    $produit = $pdo->prepare("SELECT * FROM produits WHERE Nom_categorie=:v LIMIT 5");
    $produit->bindParam(':v', $v, PDO::PARAM_STR);
    $produit->execute();
    $data = $produit->fetchAll();
    
    if (!empty($data)) {
        
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
    } else {
        echo '<p>No products found for the category.</p>';
    }
        ?>
 
    
</div>
</section>



</body>
</html>