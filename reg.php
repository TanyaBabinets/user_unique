<?php
$connection=new mysqli("localhost", "root", "", "users");
if ($connection->connect_error) {
    die("connection failed: " . $connection->connect_error);
}
if (isset($_POST['login']) && isset($_POST['email']))  {


        $login = $connection->real_escape_string($_POST['login']);
        $email = $connection->real_escape_string($_POST['email']);

        $inquiry="SELECT * FROM `user` WHERE login='$login'";// сравниваем с введенным логином
        $result=$connection->query($inquiry); /////тут сравниваем наличие логина
        if($result->num_rows>0){  ////если хоть одна строка найдета то есть
            echo "This login already exists";
        }else {
            $action = "INSERT INTO user (login, email) VALUES('$login','$email')";

            if ($connection->query($action) === TRUE) {
                echo "User added";
            } else {
                echo "Error: " . $connection->error;
            }
        }
}

?>