<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Inventory Management System</h1>
    </header>
    <main>
        <section class="inventory-list">
            <h2>Inventory List</h2> <br>
            <?php
            // Connect to MySQL database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "pharmacy_inventory";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
}

            
            $sql = "SELECT id, drug_name, quantity, re_order_level, expire_date FROM drugs";
            $result = $conn->query($sql);

            // Display data in an HTML table
            echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Drug Name</th>
            <th>Quantity</th>
            <th>Reorder Level</th>
            <th>Expire Date</th>
        </tr>";

     if ($result->num_rows > 0) {
     while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['drug_name']}</td>
                <td>{$row['quantity']}</td>
                <td>{$row['re_order_level']}</td>
                <td>{$row['expire_date']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No data found</td></tr>";
}

echo "</table>";

// Close  database connection
$conn->close();
?>
</main>
</body>
</html>
