<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hr";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM emp_view";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee View</title>

    <style>
        table{
            border-collapse: collapse;
            width:100%;
        }

        th,td{
            border:1px solid black;
            padding:8px;
            text-align:left;
        }

        th{
            background-color:#4CAF50;
            color:white;
        }
    </style>
</head>

<body>

<h2>Employee HR View</h2>

<table>

<tr>
<th>Employee ID</th>
<th>Name</th>
<th>Job Title</th>
<th>Employment Date</th>
<th>Manager Name</th>
<th>Department</th>
<th>Location</th>
</tr>

<?php

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td>".$row["EmployeeID"]."</td>";
        echo "<td>".$row["Name"]."</td>";
        echo "<td>".$row["JobTitle"]."</td>";
        echo "<td>".$row["EmploymentDate"]."</td>";
        echo "<td>".$row["ManagerName"]."</td>";
        echo "<td>".$row["DepartmentName"]."</td>";
        echo "<td>".$row["Location"]."</td>";
        echo "</tr>";
    }

} else {
    echo "<tr><td colspan='7'>No data found</td></tr>";
}

$conn->close();

?>

</table>

</body>
</html>