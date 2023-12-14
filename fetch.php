<?php

$conn = mysqli_connect("localhost", "root", "password", "demo") or die("connection failed");

$sql  = "select * from students";
$result = mysqli_query($conn, $sql);
$data = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = [
            "id" => $row['s_id'],
            "name" => $row['s_name'],
        ];
    }

    echo json_encode(["data" => $data]);
}

?>
