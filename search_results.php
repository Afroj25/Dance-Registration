<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: admin_login.php");
    exit;
}

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

$dance_style = $_GET['dance_style'];

// Fetch candidates by dance style
$sql = "SELECT id, uname FROM registered_candidates WHERE dance_style='$dance_style'";
$result = mysqli_query($conn, $sql);

if ($result === false) {
    die("Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
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
        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #dc3545;
            border: none;
            border-radius: 4px;
            color: #fff;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #c82333;
        }
        button a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Search Results for "<?php echo htmlspecialchars($dance_style); ?>"</h2>
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
        <button><a href="index.html">Go back</a></button>
    </div>
</body>

</html>
