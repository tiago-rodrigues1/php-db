<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

        $conn = new PDO("sqlite:carros_db.sqlite");
        $q = $conn->query("SELECT * FROM carros;");
        $carros = $q->fetchAll();

        echo "<pre>";
        print_r($carros);
        echo "</pre>";
    ?>
</body>
</html>