<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'DBConn.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $_POST['user'];
    $pass = md5($_POST['pass']);

    $res = $conn->query("SELECT * FROM tblAdmin 
                         WHERE username='$user' AND password='$pass'");

    if ($res->num_rows > 0) {
        header("Location: adminDashboard.php");
        exit();
    } else {
        $message = "Wrong admin login";
    }
}
?>

<h2>Admin Login</h2>

<form method="POST">
    Username: <input name="user" required><br><br>
    Password: <input type="password" name="pass" required><br><br>
    <button type="submit">Login</button>
</form>

<p><?php echo $message; ?></p>

</body>
</html>