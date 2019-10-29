<?php
require('./config.php');

$conn = get_connect();

$sql = "SELECT * FROM phong";
$rooms = $conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>View Records</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div class="views">
    <h2>View Records</h2>
    <table border="1" cellpadding="10">
        <thead>
        <tr>
            <th>Ma loai</th>
            <th>Ma phong</th>
            <th>So phong</th>
            <th>So giuong</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $rooms->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["maloai"] ?></td>
                <td><?php echo $row["maphong"] ?></td>
                <td><?php echo $row["sophong"] ?></td>
                <td><?php echo $row["sogiuong"] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>