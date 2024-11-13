<?php
header("Content-Type: application/json");
$mysqli = new mysqli("localhost", "root", "", "game1");
if ($mysqli->connect_error)
{
    echo json_encode(["message" => "error"]);
}
else
{
    $sql = "SELECT user_id FROM users WHERE username=?;";
    $query = $mysqli->prepare($sql);
    $username = $_POST["username"];
    $score = $_POST["score"];
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows > 0)
    {
        $user_id = $result->fetch_assoc()["user_id"];
        $sql = "UPDATE users SET score=? WHERE user_id=?;";
        $query = $mysqli->prepare($sql);
        $query->bind_param("ii", $score, $user_id);
        if ($query->execute())
        {
            echo json_encode(["message" => "success"]);
        }
        else
        {
            echo json_encode(["message" => "error"]);
        }
    }
    else
    {
        $sql = "INSERT INTO users(user_id, username, score) VALUES(NULL, ?,?);";
        $query = $mysqli->prepare($sql);
        $query->bind_param("si", $username, $score);
        if ($query->execute())
        {
            echo json_encode(["message" => "success"]);
        }
        else
        {
            echo json_encode(["message" => "error"]);
        }
    }
    $mysqli->close();
}
