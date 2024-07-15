<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: admin_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
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

        form {
            text-align: center;
            margin-top: 20px;
        }

        input[type="text"] {
            padding: 8px;
            width: 300px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        input[type="submit"],
        button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #0056b3;
        }

        button a {
            text-decoration: none;
            color: #fff;
        }

        button {
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <form method="get" action="search_results.php">
            Search by Dance Style: <input type="text" name="dance_style" required><br>
            <input type="submit" value="Search">
            <button><a href="logout.php">Logout</a></button>
        </form>
    </div>
</body>

</html>
