<!DOCTYPE html>
<html>
<head>
	<title>Anggota Perpustakaan</title>

<?php include 'scrsty.php';
       ?>
 <script type="text/javascript">
         $(document).ready(function(){
            $('#tambah').validate({
                rules:{
                    nama:{
                        minlength : 3,
                        maxlength : 100
                    },
                    alamat:{
                        minlength : 10
                    },
                    nope:{
                        digits : true,
                        minlength : 3,
                        maxlength : 20
                    }
                },
                messages:{
                    nama:{
                        required : "<font color = 'red'>Nama tidak boleh kosong!</font>",
                        minlength : "Nama minimal 3 karakter.",
                        maxlength : "Nama maksimal 100 karakter."
                    },
                    alamat:{
                        required : "<font color = 'red'>Alamat tidak boleh kosong!</font>",
                        minlength : "Alamat Anda harus spesifik!"
                    },
                    nope:{
                        required : "<font color = 'red'>No. HP tidak boleh kosong!</font>",
                        digits : "<font color = 'red'>Format tidak sesuai!</font>",
                        minlength : "No. HP minimal 3 digit.",
                        maxlength : "No. HP maksimal 20 digit."
                    }
                }
            });
         });
    </script>
</head>
<body>
	<?php 
    include 'navbar.php';
	?>
<div class="container mt-5 back-birumuda" >
    <br>
            <h1 class="text-center"> Edit Keanggotaan Perpustakaan</h1>
            <?php
        include 'koneksi.php';
        $id = $_GET['id'];
        $data = mysqli_query($koneksi,"SELECT * FROM anggota WHERE id = '$id'");
        while($d = mysqli_fetch_array($data))
        {
            ?>
            <form method="post" id="edit" action="edit_aksi.php">
                <table class="table table-bordered mt-3 jumbotron">

                        <tr>
                            <th>Nama Anggota</th>
                            <td><input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                <input class="form-control" type="text" name="nama_anggota" value="<?php echo $d['nama_anggota']; ?>" required></td>
                        </tr>
                        <tr>
                            <th>Nomor Anggota</th>
                            <td><input class="form-control" type="text" name="no_anggota" value="<?php echo $d['no_anggota']; ?>" readonly></td>
                        </tr>
                        <tr>
                            <th>Nomor Handphone</th>
                            <td><input class="form-control" type="text" name="no_hp" value="<?php echo $d['no_hp']; ?>" required></td>
                        </tr>
        
                        <tr>
                            <th>Status</th>
                            <td><select class="form-control" name="status" required>
                                <option value="">--Status--</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><textarea rows="5" name="alamat" required><?php echo $d['alamat']; ?></textarea></td>
                        </tr>
                    
                </table>
               <button class="btn btn-primary" type="submit">Simpan</button>
           </form>
                <?php
        }
?>
        
<br/>
<br>

</div>
</body>
</html>
