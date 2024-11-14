<?php
header("Content-Type: application/json");
$mysqli = new mysqli("localhost", "root", "", "game1");
if ($mysqli->connect_error)
{
    echo json_encode(["message" => "error"]);
}
else
{
    $sql = "SELECT username,score FROM users ORDER BY score DESC;";
    $query = $mysqli->prepare($sql);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows > 0)
    {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode(["message" => "success", "data" => $data]);
    }
    else
    {
        echo json_encode(["message" => "success", "data" => null]);
    }
    $mysqli->close();
}
