<?php
header("Content-Type: application/json");
$mysqli = new mysqli("localhost", "root", "", "biblioteca");
if ($mysqli->connect_error)
{
    echo json_encode(["message"=>"error"]);
}
else
{
    $sql = "SELECT * FROM libros;";
    $query = $mysqli->prepare($sql);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows > 0)
    {
        $data = ["data" => $result->fetch_all(MYSQLI_ASSOC)];
        echo json_encode($data);
    }
    else
    {
        echo json_encode(["message"=>"error"]);
    }
    $mysqli->close();
}
