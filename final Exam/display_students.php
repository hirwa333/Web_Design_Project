<?php
$conn = new mysqli("localhost","root","","student_db");
if($conn->connect_error) die("Connection failed: ".$conn->connect_error);

$sql = "SELECT * FROM students_marks ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>All Students</title>
<link rel="stylesheet" href="ass2.css">
<style>
table { border-collapse: collapse; width: 80%; margin: 20px auto; }
th, td { border: 1px solid #000; padding: 8px; text-align: center; }
th { background-color: #f2f2f2; }
a { display: block; text-align: center; margin: 20px auto; text-decoration: none; color: white; background: #007BFF; padding: 10px; border-radius: 5px; width: 150px;}
a:hover { background: #0056b3; }
</style>
</head>
<body>

<h2 style="text-align:center;">All Students</h2>

<table>
<tr>
<th>Name</th>
<th>ID</th>
<th>Department</th>
<th>CW</th>
<th>Mid</th>
<th>Final</th>
<th>Total</th>
<th>Average</th>
<th>Grade</th>
</tr>

<?php
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $total = $row['cw'] + $row['mid'] + $row['final'];
        $avg = number_format($total/3,2);
        $grade = $total>=70?'A':($total>=60?'B':($total>=50?'C':'Failed'));
        echo "<tr>
            <td>{$row['student_name']}</td>
            <td>{$row['student_id']}</td>
            <td>{$row['department']}</td>
            <td>{$row['cw']}</td>
            <td>{$row['mid']}</td>
            <td>{$row['final']}</td>
            <td>{$total}</td>
            <td>{$avg}</td>
            <td>{$grade}</td>
        </tr>";
    }
}else{
    echo "<tr><td colspan='9'>No students found</td></tr>";
}
$conn->close();
?>
</table>

<a href="index.php">Back to Form</a>

</body>
</html>
