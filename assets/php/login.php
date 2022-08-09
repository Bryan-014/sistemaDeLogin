<?php
  session_start();

  $login = $_POST;
  if (sizeof($login) === 0) {
    header("location:".$_SESSION["root"]);
    exit();
  }

  $connection = [
    "host" => $_SERVER['SERVER_NAME'],
    "user" => "admin",
    "pass" => "q(wM1Qtz3Fj(8Put",
    "db" => "db_testeloginbryan"
  ];
  $conn = mysqli_connect($connection["host"], $connection["user"], $connection["pass"], $connection["db"]);
  if (!$conn) {
    die("Não foi possivel conectar ". mysqli_connect_error());
  }

  $result = mysqli_query($conn, "select * from tbl_users where email = '" . $login["email"] . "'");
  $user = mysqli_fetch_array($result);

  if ($result->num_rows > 0) {
    if ($login["pass"] != $user["pass"]) {
      $_SESSION["waring"] = [
        "have" => true,
        "msg" => "Senha inválida!"
      ];
      header("location:".$_SESSION["root"]);
    } else {
      $_SESSION["msg"] = "Logado com sucesso";
      $_SESSION["user"] = $user;
      header("location:".$_SESSION["root"]."assets/pages/criador.php");
    }
  } else {
    $_SESSION["waring"] = [
      "have" => true,
      "msg" => "Login Incorreto!",
    ];
    header("location:".$_SESSION["root"]);
  }
?>