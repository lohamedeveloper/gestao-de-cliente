<?php 

  use \App\Session\Login;

  $usuario = Login::getUsuariologado();
  $usuario = $usuario ? $usuario['nome'].'<a href="logout.php" class="text-light font-weight-bold ml-2"> Sair </a>' : 'Visitante <a href="login.php" class="text-light font-weight-bold ml-2"> Entrar </a>';
?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestão de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body class="bg-dark text-light">
    <div class="container">
        <div class="mt-4 p-5 bg-danger">
            <h1>Gestão de Clientes</h1>
            <!-- <p>Exemplo de CRUD com PHP orientados a objetos</p> -->

            <hr class="border-light">

            <div class="d-flex justify-content-start">
              <?=$usuario?>
            </div>
        </div>
    