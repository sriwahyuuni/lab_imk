<!DOCTYPE html>
<html>
<head>
	<title>Anggota Perpustakaan</title>

<?php include 'scrsty.php'; ?>
</head>
<body>
	<?php 
    include 'koneksi.php';
	include 'navbar.php';
	?>
<div class="container mt-5 back-birumuda" >
    <br>
            <h1 class="text-center">Keanggotaan Perpustakaan</h1>
                <table class="table table-bordered mt-3 back-putihb">
                    <thead>
                        <tr class="bg-success">
                            <th>Nama Anggota</th>
                            <th>Nomor Anggota</th>
                            <th>Nomor Handphone</th>
                            <th>Alamat</th>
                            <th>Fakultas</th>
                            <th>Jenis Kelamin</th>
                            <th>Status</th>
                            <th colspan="2">Edit/Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
        include 'koneksi.php' ;
        $data =mysqli_query($koneksi,"SELECT * FROM anggota");
        while ($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $d['nama_anggota']; ?></td>
                <td><?php echo $d['no_anggota']; ?></td>
                <td><?php echo $d['no_hp']; ?></td>
                <td><?php echo $d['alamat']; ?></td>
                <td><?php echo $d['fakultas']; ?></td>
                <td><?php echo $d['jenis_kelamin']; ?></td>
                <td><?php echo $d['status']; ?></td>
            <td>
                <a href="edit_anggota.php?id=<?php echo $d['id']; ?>" class="btn btn-primary btn-sm">EDIT</a></td>
            <td>
                <a href="hapus_anggota.php?id=<?php echo $d['id'];?>" class="btn btn-danger btn-sm"> HAPUS</a>
            </td>
        </tr>
        <?php
        }
?>
                    </tbody>
                </table>
               <a class="btn btn-primary" href="tambah_anggota.php">Tambah Anggota</a>
<br/>
<br>

</div>
</body>
</html>
