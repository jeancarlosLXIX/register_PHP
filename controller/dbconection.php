<?php

    $mysqli = new mysqli ("127.0.0.1", "root", '', 'indrhi');

    if ($mysqli->connect_errno) {
        throw new RuntimeException('Error: ' . $mysqli->connect_error);
    }