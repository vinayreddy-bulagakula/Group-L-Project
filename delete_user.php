<?php
include_once 'connection.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM login1 WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid user id";
}
?>
