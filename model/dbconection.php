<?php

    $mysqli = new mysqli ("us-cdbr-east-04.cleardb.com", "bb5e05959a0bb2", '73697945', 'heroku_d66806d4df58b5d');

    if ($mysqli->connect_errno) {
        throw new RuntimeException('Error: ' . $mysqli->connect_error);
    }

    ?>