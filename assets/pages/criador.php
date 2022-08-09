<?php
  session_start();

  if(!isset($_SESSION["msg"]) && $_SESSION["msg"] != "Logado com sucesso") {
    header("Location:".$_SESSION["root"]);
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criador</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  </head>
  <body>
    <div class="navbar navbar-expand bg-dark">
      <div class="container-fluid">
        <a href="#" class="text-danger navbar-brand m-1">Criador de Páginas</a>
        <div>
          <span class="text-light m-2">Usuário: <?php
            echo($_SESSION["user"]["user_name"]);
          ?></span>
          <a href="../php/logout.php" class="btn btn-danger" >Logout</a>
        </div>
      </div>
    </div>
    <div class="container mt-4 bg-dark p-4" style="border-radius: 15px;">
      <form action="generate.php" method="post">
        <div class="form-floating m-2">
          <input type="text" name="pagTitle" class="form-control" placeholder="Titulo da página" required>
          <label for="pagTitle">Titulo da página</label>
        </div>
        <div class="form-floating m-2">
          <input type="text" name="headerText" class="form-control" placeholder="Texto do cabeçalho" required>
          <label for="headerText">Texto do cabeçalho</label>
        </div>
        <div class="form-floating m-2">
          <input type="number" name="headerTextSize" class="form-control" placeholder="Tamanho do texto do cabeçalho" required>
          <label for="headerText">Tamanho do texto do cabeçalho(px)</label>
        </div>
        <div class="m-2">
          <label class="text-light" for="headerTextColor">Cor do texto do cabeçalho</label>
          <input type="color" name="headerTextColor" class="form-control form-control-color">
        </div>
        <div class="m-2">
          <label class="text-light" for="headerColor">Cor do cabeçalho</label>
          <input type="color" name="headerColor" class="form-control form-control-color">
        </div>
        <div class="form-floating m-2">
          <input type="text" name="contentText" rows="5" class="form-control" placeholder="Texto do cabeçalho" required>
          <label for="headerText">Texto do conteúdo</label>
        </div>
        <div class="form-floating m-2">
          <input type="number" name="contentTextSize" class="form-control" placeholder="Tamanho do texto do cabeçalho" required>
          <label for="headerText">Tamanho do texto do conteúdo(px)</label>
        </div>
        <div class="m-2">
          <label class="text-light" for="headerTextColor">Cor do texto do corpo</label>
          <input type="color" name="contentTextColor" class="form-control form-control-color">
        </div>
        <div class="m-2">
          <label class="text-light" for="headerColor">Cor do corpo</label>
          <input type="color" name="contentColor" class="form-control form-control-color">
        </div>
        <input type="submit" value="Gerar Página" class="btn btn-primary m-2">
      </form>
    </div>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>