<?php


if (isset($_POST['submit'])) {


    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];

    $enc_password = md5($password);

    if ($name && $username && $email && $password && $password1) {

        if (strlen($name) < 30) {

            if (strlen($username) < 10) {


                if (strlen($password) < 15 || strlen($password) > 6) {

                    if ($password == $password1) {

                        require "php/dbc.php";
                        $query = mysql_query("INSERT INTO users VALUES ('', '$name','$username','$email','$enc_password')");
                        echo"Registo completo! Clica <a href='index.php'> aqui</a> para fazer login";
                    } else {
                        echo "as passwords não são iguais";
                    }

                }
            } else {
                echo "A password deve ter entre 6 e 15 caracteres";
            }


        } else {
            echo "Nome muito grande";
        }


    } else {
        echo "Todos os campos são de preenchimento obrigatório";
    }

}

?>
<html>

<form action="register.php" method="POST">
    Nome: <input type="text" name="name" value=""<?php echo "$name"; ?>"> maximo 30 caracteres <br>
    Username: <input type="text" name="username" value="<?php echo "$username"; ?>"> maximo 15 caracteres <br>
    Email: <input type="email" name="email" value="<?php echo "$email"; ?>"> <br>
    Password: <input type="password" name="password" value=""> maximo 15 caracteres <br>
    Repete a tua password: <input type="password" name="password1" value="">
    <input type="submit" name="submit" value="register">
</form>

</html>