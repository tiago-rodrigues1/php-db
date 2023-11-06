<?php
//Connection
$conn = new PDO("sqlite:../carros.sqlite");
$conn->setAttribute(
    PDO::ATTR_DEFAULT_FETCH_MODE,
    PDO::FETCH_OBJ);

    $id = $_GET["id"];
    $modelo = $_GET["modelo"];
    $marca = $_GET["marca"];
    $ano = $_GET["ano"];
    $km = $_GET["km"];
    $kmPorLitro = $_GET["km_por_litro"];
    
    if($id == 0){
        $preparo = $conn->prepare(
            "INSERT INTO carros
            (modelo, marca, ano, km, km_por_litro)
            VALUES(:m, :marca, :ano, :km, :km_l);");
    }
    else{
        $preparo = $conn->prepare("UPDATE carros
        SET modelo=:m, 
        marca=:marca, 
        ano=:ano, 
        km=:km, 
        km_por_litro=:km_l
        WHERE id=:id;
        ");
        $preparo->bindParam(":id", $id);
    }

    $preparo->bindParam(":m", $modelo);
    $preparo->bindParam(":marca", $marca);
    $preparo->bindParam(":ano", $ano);
    $preparo->bindParam(":km", $km);
    $preparo->bindParam(":km_l", $kmPorLitro);
    
    $preparo->execute();

    header("Location:../index.php");
?>