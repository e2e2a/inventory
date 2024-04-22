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
        <input type="text" id="searchUsername" name="searchUsername" placeholder="Enter username"
            value="<?= isset($searchUsername) ? $searchUsername : '' ?>">
        <button type="submit" name="search">Search</button>
    </form>
<?php
if (isset($_POST['search'])) {
    // Get the username to search
    $searchUsername = $_POST['searchUsername'];

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM users WHERE Username LIKE :searchUsername";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':searchUsername', $searchUsername, PDO::PARAM_STR);
    
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($result){
        echo "<table>";
        echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Age</th><th>Actions</th></tr>";

        foreach ($result as $row) {
        echo "<tr>";
        echo "<td>". $row["Id"] . "</td>";
        echo "<td>". $row["Username"] . "</td>";
        echo "<td>". $row["Email"] . "</td>";
        echo "<td>". $row["Age"] . "</td>";
        echo "<td>
                <form method='post'>
                    <button type='submit' name='edit' value='" . $row["Id"] . "'>Edit</button>
                    <button type='submit' name='delete' value='" . $row["Id"] . "'>Delete</button>
                    
                </form>
              </td>";
        
        echo "</tr>";
        echo "</tr>";
        }

    echo "</table>";
} else {
    echo "No matching users found.";
};
    
}

?>
</body>

</html>