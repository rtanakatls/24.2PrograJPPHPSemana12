<?php
$mysqli = new mysqli("localhost", "root", "", "biblioteca");
if ($mysqli->connect_error)
{
    echo "Error";
}
else
{
    $sql = "UPDATE libros SET alumno_id=? WHERE libro_id=?";
    $query = $mysqli->prepare($sql);
    $alumno_id = $_POST["alumno_id"];
    $libro_id = $_POST["libro_id"];
    $query->bind_param("ii", $alumno_id, $libro_id);
    if ($query->execute())
    {
        echo "Éxito";
    }
    else
    {
        echo "Error";
    }
    $mysqli->close();
}
