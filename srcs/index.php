<?php
    session_start();
    include("php/init.php");
    include("php/get_sql.php");
    include("php/get_name_amount.php");
    // include("php/get_add_sql.php");

    $servername = "db";
    $username = "root";
    $password = "solita";
    $db_name = "db_solita";

    if(!$_SESSION['init']) {
        import_json_to_mysql($servername, $username, $password, $db_name, "names.json");
    }

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
    $people = 0;

    echo file_get_contents("html/head.html");

    if ($result->num_rows > 0) {
        echo "<div class=\"header\">Who is Solita - name application<br></div>";
        echo "<div class=database_info>" . $result->num_rows . " names in database.</div>";

        // output data of each row
        echo "<div class=center>";
        echo file_get_contents("html/sortform.html");

        echo "<div class=people_table>";
        while($row = $result->fetch_assoc()) {
            echo "<div class=people_row>";
            echo "<div class=people_name_cell>" . "Name: " . $row["name"] . "</div>";
            echo "<div class=people_amount_cell>" . "Amount: " . $row["amount"]. "</div>";
            echo "</div>";
            $people += $row["amount"];
        }
        echo "</div>";
        echo "</div>";
      }
    else {
        echo "0 results";
    }
    $conn->close();

// echo $_SESSION['namecount'];
// echo "<h1>Number of names: " . $result->num_rows . "</h1>";
echo "<h1>Number of people in the database: " . $people . "</h1>";

if ($_GET['nname'] && $_GET['amount']) {
    if ($_GET['amount'] == 1) {
        echo "<h2>There is one " . $_GET['nname'] . " who works at Solita.</h2>";        
    }
    else {
        echo "<h2>There are " . $_GET['amount'] . " " . $_GET['nname'] . "'s who work at Solita.</h2>";
    }
}

?>
            <form action="get_amount.php" method="POST">
                <!-- Product to delete <input name="product_delete" value=""> -->
                Name: <input name="get_name" value="">
                <input name="name" type="submit" value="Check the amount">
            </form>



        </div>

    </body>
</html>