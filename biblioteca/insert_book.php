<?php
header("Content-Type: application/json");
$mysqli = new mysqli("localhost", "root", "", "biblioteca");
if ($mysqli->connect_error)
{
    echo json_encode(["message"=>"error"]);
}
else
{
    $sql = "INSERT INTO libros(libro_id,titulo,paginas,alumno_id) VALUES (NULL,?,?,NULL);";
    $query = $mysqli->prepare($sql);
    $title = $_POST["title"];
    $pages = $_POST["pages"];
    $query->bind_param("si", $title, $pages);
    if ($query->execute())
    {
        echo json_encode(["message"=>"success"]);
    }
    else
    {
        echo json_encode(["message"=>"error"]);
    }
    $mysqli->close();
}
