<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'DBConn.php';

$message = "";

// Keep values for sticky form
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM tblUser 
            WHERE email='$email' 
            AND password='$password' 
            AND isVerified=1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        echo "<h2>User " . $user['name'] . " is logged in</h2>";

        // Display user data (associative array requirement)
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                <tr>
                    <td>".$user['id']."</td>
                    <td>".$user['name']."</td>
                    <td>".$user['email']."</td>
                </tr>
              </table>";

    } else {
        $message = "Invalid login or not verified";
    }
}
?>

<!-- NAVBAR START -->
<nav style="background:#222; padding:10px;">
    <a href="login.php" style="color:white; margin-right:15px;">Login</a>
    <a href="register.php" style="color:white; margin-right:15px;">Register</a>
    <a href="adminLogin.php" style="color:white; margin-right:15px;">Admin</a>
    <a href="adminDashboard.php" style="color:white; margin-right:15px;">Dashboard</a>
    <a href="createTable.php" style="color:white; margin-right:15px;">Load Users</a>
</nav>
<!-- NAVBAR END -->

<h2>Login</h2>

<form method="POST">
    Email: <input type="email" name="email" required value="<?php echo $email; ?>"><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>

<p><?php echo $message; ?></p>

</body>
</html>