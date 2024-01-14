<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a connection to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pharmacy_inventory";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_POST["id"];
    $drug_name = $_POST["drug_name"];
    $quantity = $_POST["quantity"];
    $re_order_level = $_POST["re_order_level"];
    $expire_date = $_POST["expire_date"];

    //insert data into the database
    $sql = "INSERT INTO drugs (id, drug_name, quantity, re_order_level, expire_date) 
            VALUES ('$id', '$drug_name', '$quantity', '$re_order_level', '$expire_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Drug added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

