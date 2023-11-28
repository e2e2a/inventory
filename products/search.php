<?php
// Include your database configuration file
include("../php/config.php");

// Check if the form is submitted

if (isset($_POST['delete'])) {
    $deleteId = $_POST['delete'];

    // prepare
    $stmt = $con->prepare("DELETE FROM product WHERE Product_id=:deleteId");
    $stmt->bindParam(':deleteId', $deleteId);
    $stmt->execute();
    
    
    if ($stmt->rowCount() > 0) {
        echo '<script>alert("Record deleted successfully.");</script>';
        echo '<script>
                setTimeout(function(){
                    window.location.href = "search.php";
                }, 1); 
              </script>';
        exit;
    } else {
        echo "Error deleting record: " . $stmt->errorInfo()[2];
    }
}
if (isset($_POST['edit'])) {
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
    <title>Search Results</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #000;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>

    <h2>Search Results</h2>

    <form method="post" action="">
        <label for="searchUsername">Search Username:</label>
        <input type="text" id="searchUsername" name="searchUsername" placeholder="Enter Product Name"
            value="<?= isset($searchUsername) ? $searchUsername : '' ?>">
        <button type="submit" name="search">Search</button>
    </form>
<?php
if (isset($_POST['search'])) {
    // Get the Product to search
    $searchProduct = $_POST['searchUsername'];

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM product WHERE Product_name LIKE :searchProduct";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':searchProduct', $searchProduct, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($result){
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
    echo "No matching Products found.";
};
    
}

?>
</body>

</html>