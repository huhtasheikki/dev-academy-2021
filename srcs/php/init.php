<?php
    // session_start();
    function import_json_to_mysql($servername, $username, $password, $db_name, $jsonfile) {
        if ($_SESSION['init']){
            header("Location: index.php");
        }
        $servername = "db";
        $username = "root";
        $password = "solita";
        $db_name = "db_solita";
    
        $data = json_decode(file_get_contents($jsonfile), true);
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
            }
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $_SESSION['init'] = 1;
        $conn->close();
    }


?>