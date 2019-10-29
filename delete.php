<?php
require('./config.php');

if (!isset($_REQUEST["id"])) {
    echo "Invalid id.";
    exit();
}

$id = $_REQUEST['id'];

$conn = get_connect();
$sql = "DELETE FROM phong WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
