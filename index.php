<?php
// Database connection
$host = "localhost";
$username = "root";
$password = "W@2915djkq#";
$database = "school_db";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Delete record if 'delete' parameter is set
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_query = "DELETE FROM students WHERE id = $delete_id";
    mysqli_query($conn, $delete_query);
    echo "<p style='color: red;'>🗑️ Record deleted!</p>";
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $course = $_POST["course"];

    $sql = "INSERT INTO students (name, email, age, course) VALUES ('$name', '$email', $age, '$course')";

    if (mysqli_query($conn, $sql)) {
        echo "<p style='color: green;'>✅ Student record added successfully!</p>";
    } else {
        echo "<p style='color: red;'>❌ Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Record System</title>
</head>
<body>
    <h2>Add Student Record</h2>
    <form method="post" action="">
        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Age:</label>
        <input type="number" name="age"><br><br>

        <label>Course:</label>
        <input type="text" name="course"><br><br>

        <input type="submit" value="Add Student">
    </form>

    <hr>

    <h2>All Student Records</h2>

    <?php
    $result = mysqli_query($conn, "SELECT * FROM students");

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' cellpadding='10'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Course</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["age"] . "</td>
                    <td>" . $row["course"] . "</td>
                    <td>" . $row["created_at"] . "</td>
                    <td><a href='?delete=" . $row["id"] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No records found.</p>";
    }

    mysqli_close($conn);
    ?>
</body>
</html>
