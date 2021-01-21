<?php
    session_start();
    include("php/get_sql.php");
    // include("php/get_add_sql.php");

    $servername = "db";
    $username = "root";
    $password = "solita";
    $db_name = "db_solita";

    if(!$_SESSION['init']) {
        $data = json_decode(file_get_contents("names.json"), true);
        $names = $data['names'];
        $conn = new mysqli($servername, $username, $password, $db_name);
        $_SESSION['namecount'] = 0;
        $_SESSION['first'] = 'amount';
        $_SESSION['first_sort'] = 'DESC';
        $_SESSION['second'] = 'name';
        $_SESSION['second_sort'] = 'ASC';
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        foreach ($names as $value) {
            $sql = "INSERT INTO tb_names (name, amount)
            VALUES (\"$value[name]\", $value[amount])";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['namecount']++;
                // echo "New record created successfully";
            }
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $_SESSION['init'] = 1;
        $conn->close();
    }
?>

<!DOCTYPE html>
<html>
<head>
<title>Top names for Solita Employees</title>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="main">
    <div class="header">Top 20</div>

<?php
if (!$_SESSION['sort']) {
    $sql = get_sort_sql('amount', 'DESC', 'name', 'ASC');
}
elseif ($_SESSION['sort']) {
    $sql = get_sort_sql($_SESSION['first'], $_SESSION['first_sort'], $_SESSION['second'], $_SESSION['second_sort']);
}

$conn = new mysqli($servername, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "Name: " . $row["name"]. " - Amount: " . $row["amount"]. "<br>";
    }
  } else {
    echo "0 results";
  }
  $conn->close();

?>

<h1>Number of names: 
<?php
echo $_SESSION['namecount'];
?>
</h1>
<p>ADD HEIKKI TO DEV ACADEMY!</p>

        <form action="sort.php" method="GET">
			<!-- Product to delete <input name="product_delete" value=""> -->
            <input name="add" type="submit" value="ADD HEIKKI TO DEV ACADEMY!"><br>
			<input name="amount" type="submit" value="Sort by Amount">
            <input name="name" type="submit" value="Sort by Name">
		</form>
</div>

</body>
</html>