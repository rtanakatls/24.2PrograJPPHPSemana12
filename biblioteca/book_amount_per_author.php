<?php
header("Content-Type: application/json");
$mysqli = new mysqli("localhost", "root", "", "biblioteca");
if ($mysqli->connect_error)
{
    echo "Error";
}
else
{
    $sql = "SELECT COUNT(*) AS amount, autores.autor_id AS author_id, autores.nombre AS author_name, autores.apellido AS author_lastname FROM autores INNER JOIN libros_autores ON autores.autor_id=libros_autores.autor_id GROUP BY autores.autor_id;";
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
