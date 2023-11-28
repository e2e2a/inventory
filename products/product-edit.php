<?php
    include("../php/config.php");

// Get user ID from the URL parameters
$id = isset($_GET['productId']) ? $_GET['productId'] : null;

// Redirect to home.php if the user ID is not provided
if (empty($id)) {
    header("Location: product.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Edit Product</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
        </div>
        <div class="right-links">
            <a href="#">Edit Product</a>
            <a href="products-list.php"><button class="btn">Products List</button></a>
            <a href="search.php"><button class="btn">Search</button></a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php 
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
                

                //unfinish task to delete users//


            } else {
                
                $stmt = $con->prepare("SELECT * FROM product WHERE Product_id=:id");
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
            
            ?>


            <header>Change Profile</header>
            <form action="" method="post">
            <div class="field input">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name" id="product_name" value="<?php echo $results['Product_name']  ?>" required>
                </div>
                <div class="field input">
                    <label for="category_id">Category Id</label>
                    <input type="number" name="category_id" id="category_id" value="<?php echo $results['category_id']  ?>">
                </div>
                <div class="field input">
                    <label for="category_name">Category Name</label>
                    <input type="text" name="category_name" id="category_name" value="<?php echo $results['category_name']  ?>">
                </div>
                <div class="field input">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" value="<?php echo $results['price']  ?>" >
                </div>
                <div class="field input">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" value="<?php echo $results['quantity']  ?>" required>
                </div>
                <div class="field input">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" ><?php echo $results['description']  ?></textarea>
                </div>
                <div class="field input">
                    <label for="manufacturer_id">Manufacturer Id</label>
                    <input type="number" name="manufacturer_id" id="manufacturer_id" value="<?php echo $results['manufacturer_id']  ?>" required>
                </div>
                <div class="field input">
                    <label for="manufacturer_name">Manufacturer Name</label>
                    <input type="text" name="manufacturer_name" id="manufacturer_name" value="<?php echo $results['manufacturer_name']  ?>" >
                </div>
                <div class="field">
                    <input type="submit" name="update" class="btn" id="update" value="Update" required>
                </div>
                <div class="links">
                    Wan't to Create Product? <a href="product.php">Home</a>
                </div>
            </form>
        </div>

        <?php } ?>

    </div>
</body>
</html>