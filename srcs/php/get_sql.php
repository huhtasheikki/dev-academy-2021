<?php
    function get_sql($first, $first_sort, $second, $second_sort) {
        return ("SELECT name, amount FROM tb_names ORDER BY " .
                $first . ' ' . $first_sort . ', ' .
                $second . ' ' . $second_sort);
    }

?>