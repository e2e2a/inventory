<?php

include("../php/config.php");
if(isset($_POST['submit'])){
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $manufacturer_id = $_POST['manufacturer_id'];
    $manufacturer_name = $_POST['manufacturer_name'];
    
    //verifying the unique category_id
    
    $stmt = $con->prepare("SELECT category_id From product WHERE category_id=:a");
    $stmt->bindParam(':a', $category_id);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $num_rows = count($results);
    if($num_rows != 0) {
        echo "<div class='message'>
                <p>This email is used, Try another One please!</p>
                </div> <br>";
        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
    } else {
        $sql = "INSERT INTO product(Product_name,category_id,category_name,price,quantity,description,manufacturer_id,manufacturer_name) VALUES(:product_name,:category_id,:category_name,:price,:quantity,:description,:manufacturer_id,:manufacturer_name)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':product_name', $product_name);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':category_name', $category_name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':manufacturer_id', $manufacturer_id);
        $stmt->bindParam(':manufacturer_name', $manufacturer_name);
        if($stmt->execute()) {
            echo "<div class='message'>
                <p>Registration Success!</p>
                </div> <br>";
            echo "<a href='product-list.php'><button class='btn'>View Products!</button></a>";
        } else {
            echo "<div class='message'
                <p>Registration Failed!</p>
                </div> <br>";
        }
    }
} else {
    include('../partials/product-template.php');
}