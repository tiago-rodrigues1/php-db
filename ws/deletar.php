<?php
//Connection
$conn = new PDO("sqlite:../carros.sqlite");
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$id = $_GET["id"];

$preparo = $conn->prepare("DELETE FROM carros WHERE id=:id;");
$preparo->bindParam(":id", $id);
$preparo->execute();

header("Location:../index.php");
?>
