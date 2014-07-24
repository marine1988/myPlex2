<?php

session_start();

require "../php/dbc.php";

$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
$enc_password = md5($password);

if ($username && $password) {


    $query = mysql_query("SELECT * FROM users WHERE username ='$username'");
    $numrows = mysql_num_rows($query);

    if ($numrows != 0) {
        while ($row = mysql_fetch_assoc($query)) {
            $dbusername = $row['username'];
            $dbpassword = $row['password'];
        }

        if ($username == $dbusername && $enc_password == $dbpassword) {


            //echo "Login feito com sucesso <a href='membersarea.php'>Clica para entrares na area de menbros</a>";
            $_SESSION ['username'] = $dbusername;
            header("location: ../membersarea.php");
        } else
            header("location: ../index.php?error=A password está incorrecta");
    } else {
        header("location: ../index.php?error=Username não existente");
    }


} else
    header("location: ../index.php?error=Todos os campos são obrigatórios.");


?>



