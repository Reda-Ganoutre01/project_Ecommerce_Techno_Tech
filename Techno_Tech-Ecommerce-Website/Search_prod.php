<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="CSS/style_main.css">
    <title>Document</title>
</head>
<body>


   <div class="box-container">

   <?php
if (isset($_POST['search_btn'])) {
    $search_box = $_POST['search_box'];

    echo '<div class="title_box">
            <span>
              <h6><a href="index.php">Accueil</a></h6>
              <h2 id="boxtittle">Tous Les Résultats de la recherche pour:' . $search_box . '</h2>
            </span>
          </div>';

    $pdo = new pdo('mysql:host=localhost;dbname=ecom_db', 'root', '');
    $select_products = $pdo->prepare("SELECT * FROM produits WHERE nom LIKE :search_box OR Nom_categorie LIKE :search_box");
    $select_products->execute(array(':search_box' => '%' . $search_box . '%'));
    $data = $select_products->fetchAll();

    ?>

<div class="small-container">
             <div class="row">
              <?php

if ($select_products->rowCount() > 0) {
  foreach ($data as $val){
         

    echo '<div class="col-4">

            ';
    echo    '<img  src='.$val['img'].'>';
    echo '<h4>'.$val['nom'].'</h4>';
    echo '<h3>'.$val['Nom_categorie'].'</h3>';
    echo '<div class="ratings">';
    for ($i=0;$i<$val['nbr_star'];$i++){
        echo '<i class="fa fa-star rating-color"></i>';
    }
    echo '<i class="fa fa-star"></i>';
    echo '</div>';

    echo '<p >' . $val['prix'] . ',00 MAD' . '</p>';

    echo '
            <a class="btn_row" href="Detail_Produit.php?id1=' . $val["id"] . '">Voir details</a>';
    echo '</div>';
}
} else {
    echo '<p class="empty">no products found!</p>';
}
} else {
echo '<p class="empty">no products found!</p>';
}
?>

</div>
        </div>

</div>


</body>
</html>
<?php
include("footer.php");
    ?>   