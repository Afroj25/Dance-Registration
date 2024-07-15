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

// Fetch candidates
$sql = "SELECT id, uname FROM registered_candidates";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Candidates</title>
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

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #e4e4e4;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }

        a {
            text-decoration: none;
            color: #333;
            display: block;
        }

        a:hover {
            color: #007bff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Registered Candidates</h2>
        <ul>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li><a href='candidate_details.php?id=" . $row["id"] . "'>" . $row["uname"] . "</a></li>";
                }
            } else {
                echo "<li>No candidates found</li>";
            }
            mysqli_close($conn);
            ?>
        </ul>
    </div>
</body>

</html>
