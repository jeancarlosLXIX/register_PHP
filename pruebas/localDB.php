<?php

    $mysqli = new mysqli ("localhost", "root", '', 'indrhi');

    if ($mysqli->connect_errno) {
        throw new RuntimeException('Error: ' . $mysqli->connect_error);
    }

    ?>