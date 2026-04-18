<?php
$host = "mysql-proxy";   // ProxySQL container name
$user = "kinza";
$pass = "kinza123";
$dbname = "bpms";
$port = 6033;

// Connect to ProxySQL
$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully via ProxySQL!<br>";

// Write example (goes to master)
$conn->query("INSERT INTO users(name) VALUES('TestUser')");

// Read example (goes to slave)
$result = $conn->query("SELECT * FROM users");
while($row = $result->fetch_assoc()) {
    echo "User: " . $row['name'] . "<br>";
}

$conn->close();
?>
