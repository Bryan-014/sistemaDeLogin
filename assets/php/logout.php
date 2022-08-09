<?php
  session_start();
  header('Location:'.$_SESSION["root"]);
  session_unset();
  session_destroy();
?>