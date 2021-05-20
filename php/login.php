<?php
session_start();
include_once "config.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);
$passwd = mysqli_real_escape_string($conn, $_POST['passwd']);

if (!empty($email) && !empty($passwd)) {
    // Let's check users entered email and password matched to database any table row email and password * Vamos verificar o e-mail e a senha dos usuários que correspondem ao banco de dados de qualquer e-mail e senha da linha 
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' and password = '{$passwd}'");

    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $status = "Active now";
        $sql2 = mysqli_query($conn,  "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");

        if($sql2) {
            $_SESSION['unique_id'] = $row['unique_id']; // using this session we used user unique_id in other php file * usando esta sessão, usamos user unique_id em outro arquivo php 
            echo "success";
            //header("location: ../login.php");
        }

        
    } else {
        echo "E-mail or Password is incorrect! * E-mail ou senha está incorreto! ";
    }
} else {
    echo "Todos os campos de entrada são obrigatórios!";
}
