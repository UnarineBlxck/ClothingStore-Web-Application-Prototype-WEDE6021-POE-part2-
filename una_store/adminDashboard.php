<!DOCTYPE html>
<html>
<head>
    <title>Pending Users</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'DBConn.php';

// Verify user
if (isset($_GET['verify'])) {
    $id = (int)$_GET['verify'];
    $conn->query("UPDATE tblUser SET isVerified=1 WHERE id=$id");
}

// Delete user
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM tblUser WHERE id=$id");
}

// Get unverified users
$result = $conn->query("SELECT * FROM tblUser WHERE isVerified=0");
?>

<h2>Pending Users</h2>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo htmlspecialchars($row['name']) . " 
        <a href='?verify=" . $row['id'] . "'>Verify</a> 
        <a href='?delete=" . $row['id'] . "'>Delete</a><br><br>";
    }
} else {
    echo "No pending users";
}
?>

</body>
</html>