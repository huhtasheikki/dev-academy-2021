<?php
$servername = "db";
$username = "root";
$password = "solita";
$db_name = "db_solita";

function get_name_amount($name) {
    $conn = new mysqli($servername, $username, $password, $db_name);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT " . $name . " FROM 'tb_names' WHERE name='" . $name . "'";
    $ret = $conn->query($sql);
    return ($ret);
}

?>