<!DOCTYPE html>
<html>
<head>
    <title>User Register</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'DBConn.php';

$message = "";

// Sticky values
$name = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Check if user already exists
    $check = $conn->query("SELECT * FROM tblUser WHERE email='$email'");

    if ($check->num_rows > 0) {
        $message = "User already exists";
    } else {
        $conn->query("INSERT INTO tblUser (name,email,password,isVerified)
                      VALUES ('$name','$email','$password',0)");

        $message = "Registered! Waiting for admin approval.";

        // Clear fields after success
        $name = "";
        $email = "";
    }
}
?>

<h2>Register</h2>

<form method="POST">
    Name: <input type="text" name="name" required value="<?php echo $name; ?>"><br><br>
    Email: <input type="email" name="email" required value="<?php echo $email; ?>"><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Register</button>
</form>

<p><?php echo $message; ?></p>

</body>
</html>