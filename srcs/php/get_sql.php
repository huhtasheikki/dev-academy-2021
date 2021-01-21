<?php
    function get_sort_sql($first, $first_sort, $second, $second_sort) {
        return ("SELECT name, amount FROM tb_names ORDER BY " .
                $first . ' ' . $first_sort . ', ' .
                $second . ' ' . $second_sort);
    }

    function get_add_sql($name, $amount) {
        return ("INSERT INTO tb_names (name, amount)
                VALUES (\"$name\", $amount)");
    }
?>