<?php
include('config.php');

if (!isset($_REQUEST["id"])) {
    echo "Invalid id.";
    exit();
}

$id = $_REQUEST["id"];

$conn = get_connect();
$sql_room = "SELECT * FROM phong WHERE id='" . $id . "'";
$result_rooms = $conn->query($sql_room);
$room = $result_rooms->fetch_assoc();

$sql_room_type = "SELECT * FROM loaiphong";
$room_types = $conn->query($sql_room_type);

if (isset($_POST['submit'])) {
    echo "Inserted";
    $type_id = $_POST["maloai"];
    $room_id = $_POST["maphong"];
    $num_of_rooms = $_POST["sophong"];
    $num_of_beds = $_POST["sogiuong"];

    $conn = get_connect();
    $sql = "UPDATE phong SET maloai='" . $type_id . "',
    maphong='" . $room_id . "',
    sophong='" . $num_of_beds . "',
    sogiuong='" . $num_of_rooms . "'
    WHERE id=" . $id;

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>View Records</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div class="insert">
    <form action="" method="post">
        <div class="form-group">
            <label>Ma phong</label>
            <input type="text" name="maphong" class="form-control" placeholder="Nhap ma phong"
                   value="<?php echo $room["maphong"]; ?>">
        </div>
        <div class="form-group">
            <label>Ma loai</label>
            <select name="maloai" value="<?php echo $room["maloai"] ?>">
                <?php
                while ($row = $room_types->fetch_assoc()) { ?>
                    <option value="<?php echo $row["maloai"] ?>"><?php echo $row["tenloai"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>So phong</label>
            <input type="text" name="sophong" class="form-control" placeholder="Nhap so phong"
                   value="<?php echo $room["sophong"]; ?>">
        </div>
        <div class="form-group">
            <label>So giuong</label>
            <input type="text" name="sogiuong" class="form-control" placeholder="Nhap so giuong"
                   value="<?php echo $room["sogiuong"]; ?>">
        </div>
        <input type="submit" name="submit" value="Update Records">
    </form>
</div>
</body>
</html>
