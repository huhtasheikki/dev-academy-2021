<?php

$servername = "db";
$username = "root";
$password = "solita";
$db_name = "db_solita";

$name = $_POST['get_name'];
if ($_POST['submit'] == "Check the amount" && $_POST['get_name'] != "") {
    header("Location: index.php");
}

$conn = new mysqli($servername, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT amount FROM `tb_names` WHERE name='" . $name . "'";

$result = $conn->query($sql);
$ret = $result->fetch_assoc();
// return $ret['amount']

// // var_dump($ret);

// // echo $sql . "<br>";
// // echo "Moi " . $name . $ret->num_rows;
// // var_dump($_POST);
// // var_dump($ret);
// var_dump ($ret->fetch_assoc());


header("Location: index.php?nname=" . $name . "&amount=" . $ret['amount']);

?>