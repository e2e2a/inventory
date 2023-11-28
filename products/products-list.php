<?php
    session_start();
    include("../php/config.php");
    $stmt = $con->prepare("SELECT * FROM product");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['delete'])) {
    $deleteProduct = $_POST['delete'];
    $stmt = $con->prepare("DELETE FROM product WHERE Product_id=:deleteProduct");
    $stmt->bindParam(':Product_id', $deleteProduct);
    if($stmt->execute()){
        echo '<script>alert("Record deleted syccessfully.");</script>';
        echo '<script>
            setTimeout(function(){
                window.location.href = "products-list.php";
            }, 1);
            </script>';
    } else {
        echo "Error" . $con->error;
    }
}

if(isset($_POST['edit'])){
    $editId = $_POST['edit'];
    header("Location: product-edit.php?productId=" . $editId);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table,
td,
th {
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}
</style>

<body>
    <h2>Products List</h2>
    <?php
        if($result !=0) {
            echo "<table>";
            echo "<tr>
                <th>Product_id</th>
                <th>Product_name</th>
                <th>Category_id</th>
                <th>category_name</th>
                <th>price</th>
                <th>quantity</th>
                <th>description</th>
                <th>manufacturer_id</th>
                <th>manufacturer_name</th>
                <th>date_added</th>
                <th>last_updated</th>
                <th>ACTIONS</th>
                </tr>";
            
            foreach ($result as $result) {
                echo "<tr>";
                echo "<td>" . $result['Product_id'] . "</td>";
                echo "<td>" . $result['Product_name'] . "</td>";
                echo "<td>" . $result['category_id'] . "</td>";
                echo "<td>" . $result['category_name'] . "</td>";
                echo "<td>" . $result['price'] . "</td>";
                echo "<td>" . $result['quantity'] . "</td>";
                echo "<td>" . $result['description'] . "</td>";
                echo "<td>" . $result['manufacturer_id'] . "</td>";
                echo "<td>" . $result['manufacturer_name'] . "</td>";
                echo "<td>" . $result['date_added'] . "</td>";
                echo "<td>" . $result['last_updated'] . "</td>";
                echo "<td>
                        <form method='POST'> 
                            <button type='submit' name='edit' class='btn' value='" . $result['Product_id'] . "'>Edit</button>
                            <button type='submit' name='delete' class='btn' value='" . $result['Product_id'] . "' >Delete</button>
                        </form>
                </td>";
                echo "</tr>";

            }
            
            echo "</table>";
        } else {
            echo "No Products Found";
        }
    ?>
</body>

</html>