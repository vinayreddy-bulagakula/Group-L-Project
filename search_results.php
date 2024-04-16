<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bus Search Results</title>
<link rel="stylesheet" href="search_results.css">
</head>
<body>
<div class="navbar">
            <img src="unerground aberdeen.png" width="500" class="logo">
            
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="contact.html">Help & Support</a>    <ion-icon name="call-outline" style= "font-size: 20px; color: #fff;"  ></ion-icon></li>
                <li><a href="about.html">About</a></li>
            </ul>
         </div>

<div class="container">
    <h1>Bus Search Results</h1>
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
            echo "<div class='bus-route'>";
            echo "<p>Bus Route ID: " . $row["id"]. "</p>";
            echo "<p>Origin: " . $row["origin"]. " | Destination: " . $row["destination"]. "</p>";
            echo "<p>Departure Time: " . $row["departure_time"]. " | Arrival Time: " . $row["arrival_time"]. " | Fare: £" . $row["fare"]. "</p>";
            echo "<button class=button onclick=\"location.href='login1.php?route_id=" . $row["id"] . "'\">Book Now</button>"; 
            echo "</div>";
        }
    } else {
        echo "<p>No bus routes found for the given search criteria</p>";
    }

    
    $conn->close();
    ?>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>
</html>
