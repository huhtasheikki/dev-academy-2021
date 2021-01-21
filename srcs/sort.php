<?php
    session_start();
    include("php/get_sql.php");

    $servername = "db";
    $username = "root";
    $password = "solita";
    $db_name = "db_solita";
    $getit = ($_GET);
    if ($getit['add']) {
        $conn = new mysqli($servername, $username, $password, $db_name);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql = get_add_sql("Heikki", 1);
        $conn->query($sql);
        $_SESSION['namecount']++;
    }
    elseif ($getit['amount']) {
        $_SESSION['sort'] = 1;
        if (!$_SESSION['first']) {
            $_SESSION['first'] = 'amount';
            $_SESSION['first_sort'] = 'DESC';
            $_SESSION['second'] = 'name';
            $_SESSION['second_sort'] = 'ASC';
        }
        else if ($_SESSION['first'] === 'amount'){
            if ($_SESSION['first_sort'] === 'ASC') {
                $_SESSION['first_sort'] = 'DESC';
            }
            else {
                $_SESSION['first_sort'] = 'ASC';
            }
        }
        else {
            $_SESSION['first'] = 'amount';
            $_SESSION['second'] = 'name';
            $_SESSION['second_sort'] = $_SESSION['first_sort'];
            if ($_SESSION['first_sort'] === 'ASC') {
                $_SESSION['first_sort'] = 'DESC';
            }
            else {
                $_SESSION['first_sort'] = 'ASC';
            }
        }
    }
    else {
        $_SESSION['sort'] = 1;
        if (!$_SESSION['first']) {
            $_SESSION['first'] = 'name';
            $_SESSION['first_sort'] = 'ASC';
            $_SESSION['second'] = 'amount';
            $_SESSION['second_sort'] = 'DESC';
        }
        else if ($_SESSION['first'] === 'name'){
            if ($_SESSION['first_sort'] === 'ASC') {
                $_SESSION['first_sort'] = 'DESC';
            }
            else {
                $_SESSION['first_sort'] = 'ASC';
            }
        }
        else {
            $_SESSION['first'] = 'name';
            $_SESSION['second'] = 'amount';
            $_SESSION['second_sort'] = $_SESSION['first_sort'];
            if ($_SESSION['first_sort'] === 'ASC') {
                $_SESSION['first_sort'] = 'DESC';
            }
            else {
                $_SESSION['first_sort'] = 'ASC';
            }
        }

    }
    header("Location: index.php");
?>
