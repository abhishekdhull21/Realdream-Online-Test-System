<?php
require 'conn.php';
$examcode = $_POST['examcode'];
echo $examcode;
$examname = $_POST['examname'];
$examtime = $_POST['examtime'];
$startentry = $_POST['startentry'];
$total_qus = $_POST['total_qus'];
$pve = $_POST['pve'];
$nve = $_POST['nve'];
$status = $_POST['status'];
$acad_name = $_POST['acad_name'];
$sql = "INSERT INTO academic_exam (testcode,test_name,exam_time,entry_time,entry_close,total_qus,	pve,	nve,status,powerd_by) values('$examcode','$examcode','$examtime','$startentry','$total_qus','$pve','$nve','$status','$acad_name')";
if (mysqli_query($conn, $sql)) {
               echo "New record created successfully";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $conn->close();
?>