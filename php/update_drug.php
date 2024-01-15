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
    $drug_name = $_POST["name"];
    $quantity = $_POST["quantity"];
    $re_order_level = $_POST["re_order_level"];
    $expire_date = $_POST["expiry_date"];

    //update data in the database
    $sql = "UPDATE drugs 
            SET drug_name = '$drug_name', 
                quantity = '$quantity', 
                re_order_level = '$re_order_level', 
                expire_date = '$expire_date' 
            WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Drug updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
