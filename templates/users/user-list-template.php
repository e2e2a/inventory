<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>

</head>

<body>
    <h2>Users List</h2>
    <?php
    if($result > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Age</th><th>Actions</th></tr>";
        foreach ($result as $row){
            echo "<tr>";
            echo "<td>". $row["id"] . "</td>";
            echo "<td>". $row["username"] . "</td>";
            echo "<td>". $row["email"] . "</td>";
            echo "<td>". $row["age"] . "</td>";
            echo "<td>
                    <form method='post'>
                        <button type='submit' name='edit' value='" . $row["id"] . "'>Edit</button>
                        <button type='submit' name='delete' value='" . $row["id"] . "'>Delete</button>
                        
                    </form>
                  </td>";
            
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No Users Found";
    }

    ?>

</body>

</html>