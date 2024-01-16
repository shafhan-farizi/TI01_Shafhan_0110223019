<?php
    $nama_ruangan = $_POST['nama_ruangan'];
    $lokasi = $_POST['lokasi'];
    $fasilitas = implode('-', $_POST['fasilitas']);
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];

    $result = '=' . $nama_ruangan . '/' . $lokasi . '/' . $fasilitas . '/' . $kategori . '/' . implode('|', $_FILES['foto_ruangan']['name']) . '/' . $deskripsi;

    for($i=0; $i<count($_FILES['foto_ruangan']['name']); $i++) {
        move_uploaded_file($_FILES['foto_ruangan']['tmp_name'][$i], '../assets/img/uploads/' . $_FILES['foto_ruangan']['name'][$i]);
    }

    file_put_contents('../data/ruangan.txt', file_get_contents('../data/ruangan.txt') . $result);

    header('Location: ../daftar_ruang.php');
?>