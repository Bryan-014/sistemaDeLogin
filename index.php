<?php
  session_start();

  $_SESSION["root"] = "http://172.17.34.254:1200/projetos/202100002/alunos/bryan/PHP/teste/criadorDePagina/";

  function validate_session($session) {
    if(isset($session["waring"]) && ($session["waring"]["have"])) {
      return false;
    }
    return true;
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Página Fácil</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/css/index.css" />
  </head>
  <body class="text-center bg-light">
    <div class="navbar navbar-expand bg-dark">
      <div class="container-fluid">
        <a href="#" class="text-danger navbar-brand m-1">Criador de Páginas</a>
        <button
          type="button"
          class="btn btn-danger"
          data-bs-toggle="modal"
          data-bs-target="#loginModal"
        >
          Login
        </button>
      </div>
    </div>
    <div class="modal fade" id="loginModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="form-signin">
              <form action="./assets/php/login.php" method="post">
                <h3 class="m-2 text-danger">Favor fazer login</h3>
                <div class="form-floating">
                  <input
                    type="email"
                    class="form-control"
                    id="floatingEmail"
                    placeholder="name@example.com"
                    name="email"
                  />
                  <label for="floatingEmail">Email</label>
                </div>
                <div class="form-floating">
                  <input
                    type="password"
                    class="form-control"
                    id="floatingPassword"
                    placeholder="Senha"
                    name="pass"
                  />
                  <label for="floatingPassword">Senha</label>
                </div>
                <div class="text-end m-2">
                  <input type="submit" value="Login" class="m-1 btn btn-danger" />
                  <input type="button" value="Cadastrar" class="m-1 btn btn-danger" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#singModal"/>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="singModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="form-signin">
              <form action="./assets/php/singin.php" method="post">
                <h3 class="m-2 text-danger">Cadastrar</h3>
                <div class="form-floating">
                  <input
                    type="email"
                    class="form-control"
                    id="floatingEmail"
                    placeholder="name@example.com"
                    name="email"
                  />
                  <label for="floatingEmail">Email</label>
                </div>
                <div class="form-floating">
                  <input
                    type="text"
                    class="form-control"
                    id="floatinguser"
                    placeholder="name@example.com"
                    name="user"
                  />
                  <label for="floatinguser">Usuário</label>
                </div>
                <div class="form-floating">
                  <input
                    type="password"
                    class="form-control"
                    id="floatingPassword"
                    placeholder="Senha"
                    name="pass"
                  />
                  <label for="floatingPassword">Senha</label>
                </div>
                <input type="submit" value="Cadastrar" class="m-2 btn btn-danger" />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="validModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <h2 class="text-danger"><?php
              if(!validate_session($_SESSION)) {
                echo($_SESSION["waring"]["msg"]);
              }
            ?></h2>
          </div>
          <input type="button" value="Login" class="m-2 btn btn-danger" data-bs-dismiss="modal" data-bs-toggle="modal"
          data-bs-target="#loginModal" />
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(() => {
        $("#validModal").modal("<?php
          if(!validate_session($_SESSION)) {
            echo("show");
            $_SESSION["waring"] = null;
          }
        ?>");
      });
    </script>
  </body>
</html>