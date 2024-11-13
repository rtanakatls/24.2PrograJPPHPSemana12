<?php
header("Content-Type: application/json");
$mysqli = new mysqli("localhost", "root", "", "game1");
if ($mysqli->connect_error)
{
    echo json_encode(["message" => "error"]);
}
else
{
    $sql = "SELECT score FROM users WHERE username=?;";
    $query = $mysqli->prepare($sql);
    $username = $_POST["username"];
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows > 0)
    {
        $score = $result->fetch_assoc()["score"];
        echo json_encode(["message" => "sucess", "score" => $score]);
    }
    else
    {
        echo json_encode(["message" => "error", "score" => 0]);
    }
    $mysqli->close();
}
