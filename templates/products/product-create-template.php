<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Register</title>
</head>
<style>
    .container{
        margin: 50px;
    }
</style>
<body>
    <div class="container">
        <div class="box form-box">

            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name" id="product_name" required>
                </div>
                <div class="field input">
                    <label for="category_id">Category Id</label>
                    <input type="number" name="category_id" id="category_id" >
                </div>
                <div class="field input">
                    <label for="category_name">Category Name</label>
                    <input type="text" name="category_name" id="category_name" >
                </div>
                <div class="field input">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price">
                </div>
                <div class="field input">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" required>
                </div>
                <div class="field input">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                </div>
                <div class="field input">
                    <label for="manufacturer_id">Manufacturer Id</label>
                    <input type="number" name="manufacturer_id" id="manufacturer_id" required>
                </div>
                <div class="field input">
                    <label for="manufacturer_name">Manufacturer Name</label>
                    <input type="text" name="manufacturer_name" id="manufacturer_name" >
                </div>
                <div class="field">
                    <input type="submit" name="submit" class="btn" id="submit" value="Register" required>
                </div>
                <div class="links">
                    Go to <a href="product-list.php">homepage</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>