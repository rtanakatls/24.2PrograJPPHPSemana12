<?php
$mysqli = new mysqli("localhost", "root", "", "biblioteca");
if ($mysqli->connect_error)
{
    echo "Error";
}
else
{
    $sql = "INSERT INTO libros_autores(libro_autor_id,libro_id,autor_id) VALUES (NULL,?,?);";
    $query = $mysqli->prepare($sql);
    $libro_id = $_POST["libro_id"];
    $autor_id = $_POST["autor_id"];
    $query->bind_param("ii", $libro_id, $autor_id);
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
