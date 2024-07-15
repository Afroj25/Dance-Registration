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

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch candidate details
    $sql = "SELECT * FROM registered_candidates WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $candidate = mysqli_fetch_assoc($result);
} else {
    echo "No candidate selected";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .details {
            margin-top: 20px;
        }

        .details p {
            margin: 10px 0;
        }

        .details label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Candidate Details</h2>
        <div class="details">
            <p><label>Name:</label> <?php echo $candidate['uname']; ?></p>
            <p><label>Email:</label> <?php echo $candidate['email']; ?></p>
            <p><label>Phone:</label> <?php echo $candidate['phone']; ?></p>
            <p><label>Experience:</label> <?php echo $candidate['experience']; ?></p>
            <p><label>Dance Style:</label> <?php echo $candidate['dance_style']; ?></p>
        </div>
    </div>
</body>

</html>

<?php
mysqli_close($conn);
?>
