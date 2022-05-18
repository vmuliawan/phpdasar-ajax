<?php 
    require "../fungsi.php";

    $keyword = $_GET['keyword'];

    $query = "SELECT * FROM siswa WHERE 
              nrp LIKE '%$keyword%' OR
              nama LIKE '%$keyword%' OR
              email LIKE '%$keyword%' OR
              jurusan LIKE '%$keyword%'
    ";

    $siswa = query($query);

    
?>

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