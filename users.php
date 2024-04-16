<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="users.css">
    <title>Admin Dashboard</title>
    
</head>
<body>
<div class="navbar">
    <a href=""><img src="unerground aberdeen.png" width="200" class="logo"></a>
    <ul>
        <li><a href="admin.php">Admin Dashboard</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>
    <div class="container">
        <h2>All Users</h2>
        <table>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php
            include_once 'connection.php';

            $sql = "SELECT * FROM login1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td class='action-buttons'><a href='view_user.php?id=" . $row['id'] . "'>View</a> <a href='delete_user.php?id=" . $row['id'] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No users found</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
