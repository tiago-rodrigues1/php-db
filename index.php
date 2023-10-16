<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        html {
            background-color: #080808;
            color: #F7F7F7;
        }
    </style>
</head>
<body>
    <?php 

        $conn = new PDO("sqlite:carros_db.sqlite");
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        /* ------ INSERT ------ */

        $modelo = "HB20";
        $marca = "Hyunday";
        $ano = 2022;
        $km = 30000;
        $kmPorLitro = 13.5;

        $prepare = $conn->prepare("INSERT INTO carros (modelo, marca, ano, km, km_litro) VALUES (:modelo , :marca, :ano, :km, :km_litro);");

        $prepare->bindParam(":modelo", $modelo);
        $prepare->bindParam(":marca", $marca);
        $prepare->bindParam(":ano", $ano);
        $prepare->bindParam(":km", $km);
        $prepare->bindParam(":km_litro", $km_litro);

        // $prepare->execute();

        /* ------ DELETE ------ */
        
        function id() {
            return 2;
        }

        $prepare = $conn->prepare("DELETE FROM carros WHERE id = :id");

        $prepare->bindParam(":id", id());

        $prepare->execute();

        /* ------ SELECT ------ */

        $q = $conn->query("SELECT * FROM carros;");
        $carros = $q->fetchAll();

        echo "<pre>";
        print_r($carros);
        echo "</pre>";
    ?>
</body>
</html>