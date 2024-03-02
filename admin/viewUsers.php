<?php


include('../database/dbconn.php');


if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $sql = "SELECT * FROM registeruser";

    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }

    echo json_encode($data);

}
else if($_SERVER['REQUEST_METHOD'] == 'POST'){
    http_response_code(400);
    header('location: index.php');
}
else {
    echo "incorrect requested data";
}
