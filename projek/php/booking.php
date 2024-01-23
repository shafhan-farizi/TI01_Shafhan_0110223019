<?php
    $peminjam = $_POST['peminjam'];
    $nama_ruangan = $_POST['nama_ruangan'];
    $deskripsi_kegiatan = $_POST['deskripsi_kegiatan'];
    $fasilitas = implode('-', $_POST['fasilitas']);
    $tanggal = date_format(date_create($_POST['tanggal']), 'd-m-Y');
    $kontak = $_POST['kontak'];
    $hp = $_POST['hp'];
    $email = $_POST['email'];
    
    $result_peminjam = '=' . $peminjam . '/' . $kontak . '/' . $hp . '/' . $email;
    $result_jadwal = '=' . $peminjam . '/' . $nama_ruangan . '/' . $deskripsi_kegiatan . '/' . $fasilitas . '/' . $tanggal . '/' . $kontak . '/' . $hp . '/' . $email;


    file_put_contents('../data/booking.txt', file_get_contents('../data/booking.txt') . $result_peminjam);
    file_put_contents('../data/jadwal.txt', file_get_contents('../data/jadwal.txt') . $result_jadwal);
    header('Location: ../daftar_peminjaman.php');
?>