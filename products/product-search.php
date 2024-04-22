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
} else {
    include_once '../templates/products/product-search-template.php';
}
?>

