
<?php
$servername = "mariadb-wp8"; 
$username = "8059"; 
$password = "wooPrUGKkI3R"; 
$dbname = "evaskalicka_com"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
