<?php
    if(isset($_GET['nama_ruangan'])) {
        $href = 'daftar_ruang.php';
        $file_name = 'ruangan.txt';
        $field = $_GET['nama_ruangan'];
    } else if (isset($_GET['nama_peminjam'])) {
        $href = 'daftar_peminjaman.php';
        $file_name = 'booking.txt';
        $field = $_GET['nama_peminjam'];
    } else {
        exit();
    }

    $file = explode('=', file_get_contents('../data/' . $file_name));
    array_shift($file);
    
    for($i=0; $i<count($file); $i++) {
        $getContent = explode('/', $file[$i]);
        if($field == $getContent[0]) {
            unset($file[$i]);    
        }
    }

    if(isset($_GET['nama_peminjam'])) {
        $file_jadwal = explode('=', file_get_contents('../data/jadwal.txt'));
        array_shift($file_jadwal);

        for($i=0; $i<count($file_jadwal); $i++) {
            $getContent = explode('/', $file_jadwal[$i]);
            if($field == $getContent[0]) {
                unset($file_jadwal[$i]);    
            }
        }

        $result_jadwal = implode('=', $file_jadwal);
        $last_result_jadwal = strlen($result_jadwal) > 1 ? '=' . $result_jadwal : '';
        
        file_put_contents('../data/jadwal.txt', $last_result_jadwal);
    }

    $result = implode('=', $file);
    $last_result = strlen($result) > 1 ? '=' . $result : '';

    file_put_contents('../data/' . $file_name, $last_result);
    header('Location: ../' . $href);
?>