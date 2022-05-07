<?php

$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "to_do_list";

$conn = new mysqli($sName, $uName , $pass, $db_name);
$sql = "SELECT id , title ,data_time FROM todos";
$result = mysqli_query($conn, $sql);
$row_cnt = $result->num_rows;


