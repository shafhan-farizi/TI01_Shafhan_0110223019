<?php
    session_start();
    $file = explode('=', file_get_contents('../data/user.txt'));
    array_shift($file);

    for($i=0; $i<count($file); $i++) {
        $explodeFile = explode('/', $file[$i]);
        $user[] = [$explodeFile[0], $explodeFile[1], $explodeFile[2]];
    }

    $log_in = 0;
    for($i=0; $i<count($user); $i++) {
        if($_POST['username'] == $user[$i][0] && $_POST['password'] == $user[$i][1]) {
            $log_in = 1;
            $admin = $user[$i][2] == 'admin' ? 1 : 0;
        }
    }
    
    if($log_in) {
        $_SESSION['login'] = 1;
        if($admin) {
            $_SESSION['admin'] = 1;
        }
        header('Location: ../index.php');
    } else {
        $http_referer = explode('/',$_SERVER['HTTP_REFERER']);
        header('Location: ' . '../' . $http_referer[count($http_referer)-1]);
    }


?>