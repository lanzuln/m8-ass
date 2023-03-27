<!DOCTYPE html>
<html>

<head>
    <title>Registration and Login Form</title>
</head>

<body>
    <h1>Registration Form</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>
        <br><br>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>
        <br><br>
        <label for="email">Email Address:</label>
        <input type="email" name="email" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br><br>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required>
        <br><br>
        <input type="submit" name="register" value="Register">
    </form>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $first_name = test_input($_POST["first_name"]);
    $last_name = test_input($_POST["last_name"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $confirm_password = test_input($_POST["confirm_password"]);

    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "<p>Please fill in all fields.</p>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>Please enter a valid email address.</p>";
    } elseif ($password !== $confirm_password) {
        echo "<p>Passwords do not match.</p>";
    } else {
        echo "<p>Registration successful. Welcome, $first_name!</p>";

    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

    here the login page
    <h1>Login Form</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="email">Email Address:</label>
        <input type="email" name="email" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br><br>
        <input type="submit" name="login" value="Login">
    </form>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);

    if (empty($email) || empty($password)) {
        echo "<p>Please fill in all fields.</p>";
    } elseif ($email === "example@example.com" && $password === "password") {
        session_start();
        $_SESSION["first_name"] = "Example";
        header("Location: welcome.php");
        exit();
    } else {
        echo "<p>Invalid login credentials.</p>";
    }
}
?>

</body>

</html>