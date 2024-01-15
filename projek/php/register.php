<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = '=' . $username . '/' . $password;
    
    file_put_contents('../data/user.txt', file_get_contents('../data/user.txt') . $result);
    header('Location: ../login.html');
?>