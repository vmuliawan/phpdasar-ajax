<?php 
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }

    require 'fungsi.php';  

    //ambil data dari table siswa
    $siswa = query("SELECT * FROM siswa");

    //jika tombol cari di tekan
    if(isset($_POST["search"])){
        $siswa = cari($_POST["cari"]);
    }

    //ambil data dari siswa object result
    //mysqli_fetch_row() //mengembalikan array numeric
    //mysqli_fetch_assoc() //mengembalikan array associative
    //mysqli_fetch_array() //mengembalikan array numeric dan associative, kekurangan data yang dikembalikan double
    //mysqli_fetch_object() //

    // while ($sis = mysqli_fetch_assoc($result)){
    // var_dump($sis);
    // }

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <style>
        .loader{
            width: 100px;
            position: absolute;
            top: 100px;
            display: none;
        }
    </style>
</head>
<body>
    <a href="logout.php">logout</a>
    <h1>Daftar Siswa</h1>

    <a href="add.php">Add data</a>
    <br><br>

    <form action="" method="post">
        <label for="keyword">Search</label>
        <input type="text" name="cari" id="keyword" placeholder="Search" size="25" autofocus autocomplete="off">
        <button type="submit" name="search" id="tombol">Cari</button>

        <img src="./img/loader.gif" alt="" class="loader" id="load">
    </form>
    <br><br>
<div id="container">
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Action</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Gambar</th>
        </tr>

        <?php $i = 1;?>
        <?php foreach($siswa as $sis) : ?>
        <tr>
            <td><?= $i?></td>
            <td><a href="ubah.php?id=<?= $sis["id"]?>">Edit</a> | <a href="hapus.php?id=<?= $sis["id"];?>" onclick="return confirm('yakin?')">Delete</a></td>
            <td><?= $sis['nrp'];?></td>
            <td><?= $sis['nama'];?></td>
            <td><?= $sis['email'];?></td>
            <td><?= $sis['jurusan'];?></td>
            <td><img src="img/<?= $sis['gambar']?>" alt="not found"></td>
        </tr>
        <?php $i++;?>
        <?php endforeach;?>
    </table>
</div>    
    
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>