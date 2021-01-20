<?php
	session_start();
    $_SESSION['sort'] = 1;
    $getit = ($_GET);
    if ($getit['amount']) {
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
    header("Location: index.php?sort=amount");
?>
