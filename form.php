<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Carro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h1>Novo Carro</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="form.php">Criar</a></li>
        </ul>
    </nav>
    <main>
        <?php
        //Identificar se o ID foi informado
        $id = 0;
        $carro = null;
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $conn = new PDO("sqlite:carros.sqlite");
            $conn->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_OBJ);
            $p = $conn->prepare("SELECT *
                FROM carros WHERE id=:id;");
            $p->bindParam(":id", $id);
            $p->execute();
            $carro = $p->fetch();
        }
        //print_r($carro);
        ?>
        <form action="ws/salvar.php"
            method="get" 
            class="container">

            <input type="hidden" name="id"
                value="<?= $id ?>">
            
            <div class="form-group">
                <label for="txtModelo">Modelo</label>
                <input type="text" name="modelo" 
                    id="txtModelo" class="form-control"
                    value="<?= is_null($carro)?'':$carro->modelo ?>">
            </div>
            <div class="form-group">
                <label for="txtMarca">Marca</label>
                <input type="text" name="marca" 
                    id="txtMarca" class="form-control"
                    value="<?= $id==0?'':$carro->marca; ?>">
            </div>
            <div class="form-group">
                <label for="numAno">Ano</label>
                <input type="number" name="ano" 
                    id="numAno" class="form-control"
                    value="<?= is_null($carro)?'':$carro->ano ?>">
            </div>
            <div class="form-group">
                <label for="numKm">Km rodados</label>
                <input type="number" name="km" 
                    id="numKm" class="form-control"
                    value="<?= is_null($carro)?'':$carro->km ?>">
            </div>
            <div class="form-group">
                <label for="numKmPorLitro">Km/l</label>
                <input type="number" name="km_por_litro" 
                    id="numKmPorLitro" class="form-control"
                    value="<?= is_null($carro)?'':$carro->km_por_litro ?>">
            </div>
            <input type="submit" value="Salvar"
                class="btn btn-primary">
            <a href="index.php"
                class="btn btn-secondary">
                Cancelar
            </a>
        </form>
    </main>
</body>
</html>