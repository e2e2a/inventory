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
                    Go to <a href="product-list.php">homepage</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>