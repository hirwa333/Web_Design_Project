<?php
$conn = new mysqli("localhost", "root", "", "student_db");

// Create connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$name = $_POST['student_name'];
$student_id = $_POST['student_id'];
$department = $_POST['department'];
$cw = $_POST['cw'];
$mid = $_POST['mid'];
$final = $_POST['final'];

// Insert into database
$sql = "INSERT INTO students_marks (student_name, student_id, department, cw, mid, final)
        VALUES ('$name', '$student_id', '$department', $cw, $mid, $final)";

if ($conn->query($sql)) {
    echo "<h2>Record Saved Successfully!</h2>";
    echo "<br><a href='index.html'>Back</a>";
} else {
    echo "ERROR: " . $conn->error;
}

$conn->close();
?>

