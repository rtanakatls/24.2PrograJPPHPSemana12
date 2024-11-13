<?php
$mysqli = new mysqli("localhost", "root", "", "biblioteca");
if ($mysqli->connect_error)
{
    echo "Error";
}
else
{
    $sql = "INSERT INTO autores(autor_id,nombre,apellido) VALUES (NULL,?,?);";
    $query = $mysqli->prepare($sql);
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $query->bind_param("ss", $nombre, $apellido);
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
