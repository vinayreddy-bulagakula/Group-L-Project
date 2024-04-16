<?php
$conn = new mysqli('localhost', 'root', '', 'bus');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$origin = isset($_GET['origin']) ? $_GET['origin'] : '';
$destination = isset($_GET['destination']) ? $_GET['destination'] : '';
$date = isset($_GET['date']) ? $_GET['date'] : '';

$sql = "SELECT * FROM bus_routes WHERE origin = '$origin' AND destination = '$destination'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Bus Route ID: " . $row["id"]. " - Origin: " . $row["origin"]. " - Destination: " . $row["destination"]. " - Departure Time: " . $row["departure_time"]. " - Arrival Time: " . $row["arrival_time"]. " - Fare: " . $row["fare"]. "<br>";
    }
} else {
    echo "";
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bus Search</title>
<link rel="stylesheet" href="search1.css">
</head>
<body>
<div class="navbar">
            <img src="unerground aberdeen.png" width="500" class="logo">
            
            <ul>
            <li><a href="Homepage1.html">Home</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="contact1.html">Help & Support</a>    <ion-icon name="call-outline" style= "font-size: 20px; color: #fff;"  ></ion-icon></li>
                <li><a href="about1.html">About</a></li>
            </ul>
         </div>

<div class="container">
    <h1>Bus Search</h1>
    <form action="search_results1.php" method="get">
        <label for="origin">Origin:</label>
        <input type="text" id="origin" name="origin" required>
        
        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" required>
        
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
        
        <input type="submit"  value="Search">
    </form>
</div>


</body>
</html>
