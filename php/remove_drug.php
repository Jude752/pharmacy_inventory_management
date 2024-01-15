<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a connection to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pharmacy_inventory";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check  connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $id = $_POST["id"];

    //  remove data from the database
    $sql = "DELETE FROM drugs WHERE id = '$id'";

   
    if ($conn->query($sql) === TRUE) {
        echo "Drug removed successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
