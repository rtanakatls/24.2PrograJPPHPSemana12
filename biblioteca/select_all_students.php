<?php
header("Content-Type: application/json");
$mysqli = new mysqli("localhost", "root", "", "biblioteca");
if ($mysqli->connect_error)
{
    echo "Error";
}
else
{
    $sql = "SELECT * FROM alumnos;";
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
        echo "Error";
    }
    $mysqli->close();
}
