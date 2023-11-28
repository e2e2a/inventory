<?php 
    session_start();
    // Get user ID from the URL parameters
$id = isset($_GET['userId']) ? $_GET['userId'] : null;

// Redirect to home.php if the user ID is not provided
if (empty($id)) {
    header("Location: register.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Validate</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
            include("php/config.php");
            if(isset($_POST['submit'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
            
                
                $stmt = $con->prepare("SELECT * FROM users WHERE Email=:email AND Password=:password");
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $num_rows = count($result);

                if($result){
                    $_SESSION['valid'] = $result['Password'];
                    $_SESSION['username'] = $result['Username'];
                    $_SESSION['age'] = $result['Age'];
                    $_SESSION['id'] = $result['Id'];
                    header("Location: edit-list.php?userId=" . $result['Id']);
        exit;
                }else{
                    echo "<div class='message'>
                        <p>Incorrect Username or Password</p>
                        </div> <br>";
                    echo "<a href='validation-password.php?userId=" . $id ."'><button class='btn'>Go Back</button></a>";
                }
                if(isset($_SESSION['valid'])){
                    header("Location: edit-list.php?userId=" . $id);
                }
                
            }else{
                
                $stmt = $con->prepare("SELECT * FROM users WHERE Id=:id");
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if($result = $result){
                    $res_Email = $result['Email'];

                }
            ?>
            <header>Validation</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $res_Email; ?>" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field">
                    <input type="submit" name="submit" class="btn" id="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>