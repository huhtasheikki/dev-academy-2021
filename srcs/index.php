<?php

$servername = "db";
$username = "root";
$password = "solita";
$db_name = "db_solita";

    $data = json_decode(file_get_contents("names.json"), true);
//    $namesdata = json_decode(file_get_contents("names.json"));
//    $data = json_decode($namesdata, true);
    $names = $data['names'];
    $name = $names['name'];
    $amounts = $names['amount'];
    // echo "NAMES";
    // var_dump($names);
    // echo "NAME";
    // var_dump($name);
    // echo "AMOUNTS";
    // var_dump($amounts);



// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



foreach ($names as $value) {
    // echo "++++++++++++++++++++";
    // var_dump($value);
    $sql = "INSERT INTO tb_names (name, amount)
    VALUES (\"$value[name]\", $value[amount])";
    // echo "||||||";
    // echo $sql;
    // echo "||||||";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

/*
$sql = "INSERT INTO tb_names (name, amount)
VALUES ('Heikki', 3)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
*/



$conn->close();


    echo "Testi toimii!";

?>