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
}else{
    include_once '../templates/products/product-list-template.php';
}
?>

