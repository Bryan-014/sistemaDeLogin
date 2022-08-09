<?php
  session_start();

  $sigin = $_POST;
  if (sizeof($sigin) === 0) {
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
    die("Couldn't connect to'". mysqli_connect_error());
  }

  if (mysqli_query($conn, "select * from tbl_users where email = '" . $sigin["email"] . "' or user_name = '" . $sigin["user"] . "'")->num_rows > 0) {
    $_SESSION["waring"] = [
      "have" => true,
      "msg" => "Nome de usuário ou email já cadastrado no sistema"
    ];
    header("location:".$_SESSION["root"]);
    exit();
  }

  if (mysqli_query($conn, "insert into tbl_users (email, user_name, pass) values ('" . $sigin["email"] . "', '" . $sigin["user"] . "', '" . $sigin["pass"] . "')")) {
    $_SESSION["waring"] = [
      "have" => true,
      "msg" => "Usuario cadastrado"
    ];
    header("location:".$_SESSION["root"]);
    exit();
  } else {
    $_SESSION["waring"] = [
      "have" => true,
      "msg" => "Usuario não cadastrado"
    ];
    header("location:".$_SESSION["root"]);
    exit();
  }
?>