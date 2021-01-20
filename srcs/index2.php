<?php
    session_start();
    include("php/get_sql.php");

    $servername = "db";
    $username = "root";
    $password = "solita";
    $db_name = "db_solita";

?>

<!DOCTYPE html>
<html>
<head>
<title>Top names for Solita Employees</title>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>

<?php
    // session_start();
    // include("php/get_sql.php");


if (!$_SESSION['sort']) {
    $sql = get_sql('amount', 'DESC', 'name', 'ASC');
//    $sql = file_get_contents('./sqls/get_names.sql');
}
elseif ($_SESSION['sort']) {
    // echo "sort:" . $_SESSION['sort'] . " first" . $_SESSION['first'] . " f_sort:" . $_SESSION['first_sort'];
    $sql = get_sql($_SESSION['first'], $_SESSION['first_sort'], $_SESSION['second'], $_SESSION['second_sort']);
}

// Create connection
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

?>


<h1>This is a Heading</h1>
<p>ADD HEIKKI TO DEV ACADEMY!</p>

        <form action="sort.php" method="GET">
			<!-- Product to delete <input name="product_delete" value=""> -->
			<input name="amount" type="submit" value="Sort by Amount">
            <input name="name" type="submit" value="Sort by Name">
		</form>

</body>
</html>