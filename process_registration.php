<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "dance";

// Create a connection
$conn = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $experience = $_POST['experience'];
    $dance_style = $_POST['dance_style'];

    // Prepare SQL statement
    $sql = "INSERT INTO registered_candidates (uname, email, phone, experience, dance_style) VALUES ('$name', '$email', '$phone', '$experience', '$dance_style')";

    // Execute SQL statement
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header("Location: list_candidates.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
