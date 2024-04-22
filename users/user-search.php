<?php
// Include your database configuration file
include("php/config.php");

// Check if the form is submitted

if (isset($_POST['delete'])) {
    $deleteId = $_POST['delete'];

    // prepare
    $stmt = $con->prepare("DELETE FROM users WHERE Id=:deleteId");
    $stmt->bindParam(':deleteId', $deleteId);
    $stmt->execute();
    
    
    if ($stmt->rowCount() > 0) {
        echo '<script>alert("Record deleted successfully.");</script>';
        echo '<script>
                setTimeout(function(){
                    window.location.href = "search.php";
                }, 250); // Delay of 250 milliseconds (0.25 second)
              </script>';
        exit;
    } else {
        echo "Error deleting record: " . $stmt->errorInfo()[2];
    }
}
if (isset($_POST['edit'])) {
    $editId = $_POST['edit'];

    header("Location: validation-password.php?userId=" . $editId);
} else {
    include_once '../templates/users/user-search-template.php';
}
?>

