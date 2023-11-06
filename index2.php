<?php
//Connection
$conn = new PDO("sqlite:carros.sqlite");
$conn->setAttribute(
    PDO::ATTR_DEFAULT_FETCH_MODE,
    PDO::FETCH_OBJ);

$modelo = "HB20";
$marca = "Hyundai";
$ano = 2021;
$km = 25000;
$kmPorLitro = 15.5;

$preparo = $conn->prepare(
    "INSERT INTO carros
    (modelo, marca, ano, km, km_por_litro)
    VALUES(:m, :marca, :ano, :km, :km_l);");

$preparo->bindParam(":m", $modelo);
$preparo->bindParam(":marca", $marca);
$preparo->bindParam(":ano", $ano);
$preparo->bindParam(":km", $km);
$preparo->bindParam(":km_l", $kmPorLitro);

//$preparo->execute();

$preparo = $conn->prepare(
    "DELETE FROM carros WHERE id=:id;");
$id_para_deletar = 6;

$preparo->bindParam(":id", $id_para_deletar);

//$preparo->execute();




$q = $conn->query("SELECT * FROM carros;");
$carros = $q->fetchAll();

echo "<pre>";
print_r($carros);
echo "</pre>";
?>