<?php 
    session_start();
    include("../php/config.php");
            if(isset($_POST['submit'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
            
                
                
                $stmt = $con->prepare("SELECT * FROM users Where Email=:a AND Password=:password");
                $stmt->bindParam(':a', $email);
                $stmt->bindParam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if($result) {
                    $_SESSION['valid'] = $result['email'];
                    $_SESSION['username'] = $result['username'];
                    $_SESSION['age'] = $result['age'];
                    $_SESSION['id'] = $result['id'];
                }else{
                    echo "<div class='message'>
                        <p>Incorrect Username or Password</p>
                        </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Go Back</button></a>";
                }
                if(isset($_SESSION['valid'])){
                    header("Location: user-home.php");
                    exit();
                }
            }else {
                include_once '../templates/users/user-login-template.php';
            }
?>



