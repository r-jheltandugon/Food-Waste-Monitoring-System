<?php
    $servername = "sql12.freesqldatabase.com";
    $username = "sql12714522";
    $password = "qREaryyE5K";
    $dbname = "sql12714522";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
?>