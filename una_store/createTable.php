<!DOCTYPE html>
<html>
<head>
    <title>Load Users</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'DBConn.php';

// Drop table
$conn->query("DROP TABLE IF EXISTS tblUser");

// Create table
$conn->query("CREATE TABLE tblUser (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255),
    isVerified TINYINT DEFAULT 1
)");

// Open file safely
$file = fopen("userData.txt", "r");

if ($file) {

    while (($line = fgets($file)) !== false) {

        $data = explode(";", trim($line));

        // Ensure line has all 3 values
        if (count($data) == 3) {
            $name = $data[0];
            $email = $data[1];
            $password = $data[2];

            $conn->query("INSERT INTO tblUser (name, email, password)
                          VALUES ('$name', '$email', '$password')");
        }
    }

    fclose($file);
    echo "Table recreated and data loaded!";

} else {
    echo "Error opening userData.txt";
}
?>

</body>
</html>