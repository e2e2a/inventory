<?php
    session_start();
    include("../php/config.php");
    if(!isset($_SESSION['valid'])){
        header("Location: index.php");
    }
    if(isset($_POST['submit'])){
        //user inputed
        $username = $_POST['username'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        //id session
        $id = $_SESSION['id'];
        //prepare
        $stmt = $con->prepare("UPDATE users SET Username=:username, Email=:email, Age=:age WHERE Id=:id");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(0 != ($results)){

            echo "<div class='message'>
            <p>Profile has been Updated!</p>
            </div> <br>";
            echo "<a href='home.php'><button class='btn'>Go Home</button></a>";
        }
        

        //unfinish task to delete users//


    } else {

        $id = $_SESSION['id'];
        //prepare
        $stmt = $con->prepare("SELECT * FROM users WHERE Id =:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
            $res_Uname = $results['username'];
            $res_Email = $results['email'];
            $res_Age = $results['age'];
        include_once '../templates/users/user-edit-template.php';
    }
?>

