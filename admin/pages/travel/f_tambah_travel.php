<?php
include '../../../public/config/connection.php';

// get variable from form input
$nama_tempat = $_POST["nama_tempat"];
$gambar = $_POST["gambar"];
$deskripsi = $_POST["deskripsi"];
$price = $_POST["price"];
$fasilitas = $_POST["fasilitas"];
$id_kategori = $_POST["id_kategori"];
$id_daerah = $_POST["id_daerah"];


$result = mysqli_query($connect, "INSERT INTO `traveling` (`id`, `nama_tempat`, `gambar`, `deskripsi`, `price`, `fasilitas`, `id_kategori`, `id_daerah`) 
VALUES ('', '$nama_tempat', '$gambar', '$deskripsi', '$price', '$fasilitas', '$id_kategori', '$id_daerah');");

header("Location:data_travel.php");
