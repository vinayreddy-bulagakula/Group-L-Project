<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['origin']) && isset($_POST['destination']) && isset($_POST['departure_time']) && isset($_POST['arrival_time']) && isset($_POST['fare'])) {
        $origin = $_POST['origin'];
        $destination = $_POST['destination'];
        $departure_time = $_POST['departure_time'];
        $arrival_time = $_POST['arrival_time'];
        $fare = $_POST['fare'];

        $conn = new mysqli('localhost', 'root', '', 'bus'); 

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO bus_routes (origin, destination, departure_time, arrival_time, fare) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $origin, $destination, $departure_time, $arrival_time, $fare);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "All form fields are required";
    }
} else {
    echo "Form submission method not allowed";
}
?>
