<?php include "dbconnect.php"?>
<?php
$value =$_POST["foodname"];
// $sql = $pdo->prepare("SELECT * FROM detail_review_food,detail_restaurant WHERE foodname LIKE ?");
// $sql =$pdo->prepare("SELECT restaurant_name,foodname FROM detail_restaurant INNER JOIN detail_review_food ON detail_restaurant.restaurant_id=detail_review_food.food_id;")
// SELECT restaurant_name,foodname FROM detail_restaurant INNER JOIN detail_review_food ON detail_restaurant.restaurant_region=detail_review_food.foodregion;
$sql = $pdo->prepare("SELECT * FROM detail_restaurant INNER JOIN detail_review_food 
ON detail_restaurant.restaurant_region=detail_review_food.foodregion WHERE foodname LIKE ?");

if(!empty($_POST)){
    $value ='%'.$_POST["foodname"]. '%';
}
$sql->bindParam(1,$value);
$sql->execute();

while($row = $sql->fetch()){
    ?>
    <img src="img_food/<?=$row["food_id"]?>.jpg" height ='200'><br>
        foodname:<?=$row["foodname"]?><br>
        fooddetail:<?=$row["fooddetail"]?><br>
        foodregion:<?=$row["foodregion"]?><br>
        restaurant_name: <?=$row["restaurant_name"]?><br>
        price:<?=$row["price"]?><br><hr>
        
<?php } ?>
