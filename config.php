<?php
function get_connect($servername = "localhost", $username = "root", $password = "", $dbname = "phongkhach")
{
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $conn->set_charset("utf8");

    return $conn;
}
