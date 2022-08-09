<?php
  session_start();

  if(!isset($_SESSION) && $_SESSION["msg"] != "Logado com sucesso") {
    header("Location:".$_SESSION["root"]);
  }

  $style = [
    "title" => $_POST["pagTitle"],
    "header" => [
      "text" => $_POST["headerText"],
      "size" => $_POST["headerTextSize"],
      "txtColor" => $_POST["headerTextColor"],
      "color" => $_POST["headerColor"]
    ],
    "content" => [
      "text" => $_POST["contentText"],
      "size" => $_POST["contentTextSize"],
      "txtColor" => $_POST["contentTextColor"],
      "color" => $_POST["contentColor"]
    ]
  ];
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($style["title"]);?></title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      header {
        text-align: center;
        color: <?php echo($style["header"]["txtColor"])?>;
        font-size: <?php echo($style["header"]["size"])?>px;
        background-color: <?php echo($style["header"]["color"])?>;
      }
      .container {
        margin-inline: auto;
        width: 75%;
        text-align: center;
      }
      body {
        background-color: <?php echo($style["content"]["color"])?>;
      }
      a {
        font-size: calc(<?php echo($style["content"]["size"])?>px / 1.5);
        color: <?php echo($style["content"]["txtColor"])?>;
      }
      span {
        font-size: <?php echo($style["content"]["size"])?>px;
        color: <?php echo($style["content"]["txtColor"])?>;
      }
    </style>
  </head>
  <body>
    <header>
      <?php echo($style["header"]["text"]);?>
    </header>
    <div class="container">
      <span>
        <?php echo($style["content"]["text"])?>
      </span>
      <br>
      <a href="./criador.php">Voltar ao criador</a>
    </div>
  </body>
</html>