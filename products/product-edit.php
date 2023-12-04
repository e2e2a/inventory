<?php
    include("../php/config.php");

// Get user ID from the URL parameters
$id = isset($_GET['productId']) ? $_GET['productId'] : null;

// Redirect to home.php if the user ID is not provided
if (empty($id)) {
    header("Location: product.php");
}
if(isset($_POST['update'])){
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $manufacturer_id = $_POST['manufacturer_id'];
    $manufacturer_name = $_POST['manufacturer_name'];

    //prepare
    $stmt = $con->prepare("UPDATE product SET product_name=:product_name, category_id=:category_id, category_name=:category_name, price=:price , quantity=:quantity , description=:description , manufacturer_id=:manufacturer_id , manufacturer_name=:manufacturer_name WHERE Product_id=:product_id");
    $stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':category_name', $category_name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':manufacturer_id', $manufacturer_id);
    $stmt->bindParam(':manufacturer_name', $manufacturer_name);
    $stmt->bindParam(':product_id', $id);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(0 != ($results)){
        echo "<div class='message'
        <p>Profile has been Updated!</p>
        </div> <br>";
        echo "<a href='products-list.php'><button class='btn'>Go Back</button></a>";
    }
} else {
    
    $stmt = $con->prepare("SELECT * FROM product WHERE Product_id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    include_once '../templates/products/product-edit-template.php';
}
?>

