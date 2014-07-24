<?php


session_start();

session_destroy();

echo "logout com sucesso";

header("location: ../index.php?error=Logout realizado com sucesso!");

?>