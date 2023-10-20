<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $d = $_POST["diagnosis"];
    $p = $_POST["prescription"];
    $do = $_POST["dosage"];

    // File handling for reports and scans (make sure the corresponding input fields in your HTML form have the 'name' attribute set)
    $r = $_FILES["reports"];
    $s = $_FILES["scans"];

    $conn = mysqli_connect("localhost","root","","dashboard");

    // Check if the connection is successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Insert data into the database
    $sql = "INSERT INTO records (diagnosis, prescription, dosage, reports, scans)
            VALUES (?,?,?,?,?)";

$stmt = mysqli_prepare($con, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ss", $d, $p, $do, $r, $s);

    if (mysqli_stmt_execute($stmt)) {
        echo "User details added successfully";
    } else {
        echo "Failed to insert data: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Failed to prepare the statement: " . mysqli_error($con);
}

mysqli_close($con);





?>

    
