<!DOCTYPE html>
<html>
<head>
	<title>Anggota Perpustakaan</title>

<?php include 'scrsty.php';
      include 'koneksi.php';
       ?>
<?php include 'scrsty.php'; ?>
    <script type="text/javascript">
         $(document).ready(function(){
            $('#tambah').validate({
                rules:{
                    nama:{
                        minlength : 3,
                        maxlength : 100
                    },
                    no:{
                        digits :true,
                        minlength : 9,
                        maxlength : 10
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
                    no:{
                        required : "<font color = 'red'>nomor anggota tidak boleh kosong!</font>",
                        digits : "<font color = 'red'>Format tidak sesuai!</font>",
                        minlength : "Username minimal 9 digit.",
                        maxlength : "Username maksimal 10 digit."
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
            <h1 class="text-center"> Tambah Keanggotaan Perpustakaan</h1>
            <form method="post" id="tambah">
                <table class="table table-bordered mt-3 jumbotron">

                        <tr>
                            <th>Nama Anggota</th>
                            <td><input class="form-control" type="text" name="nama" required></td>
                        </tr>
                        <tr>
                            <th>Nomor Anggota</th>
                            <td><input class="form-control" type="text" name="no" required></td>
                        </tr>
                        <tr>
                            <th>Nomor Handphone</th>
                            <td><input class="form-control" type="text" name="nope" required></td>
                        </tr>
                        <tr>
                            <th>Fakultas</th>
                            <td><select class="form-control" name="fakultas" required>
              <option value="">--Pilih Fakultas--</option>
              <option value="FK">Fakultas Kedokteran</option>
              <option value="FH">Fakultas Hukum</option>
              <option value="FP">Fakultas Pertanian</option>
              <option value="FT">Fakultas Teknik</option>
              <option value="FE">Fakultas Ekonomi</option>
              <option value="FKG">Fakultas Kedokteran Gigi</option>
              <option value="FIB">Fakultas Ilmu Budaya</option>
              <option value="FPsikologi">Fakultas Psikologi</option>
              <option value="FKep">Fakultas Keperawatan</option>
              <option value="Fasilkom-Ti">Fakultas Ilmu Komputer dan Teknologi Informasi</option>
              <option value="FKM">Fakultas Kesehatan Masyarakat</option>
            </select></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td><select class="form-control" name="jenis" required>
                                <option value="">--Jenis kelamin--</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select></td>
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
                            <td><textarea rows="5" name="alamat" required></textarea></td>
                        </tr>
                    
                </table>
               <button class="btn btn-primary" name="tmbh">Tambah</button>
           </form>
           <?php
    if (isset($_POST['tmbh'])) { 
        $nama = $_POST['nama'];
        $no = $_POST['no'];
        $nope = $_POST['nope'];
        $fakultas = $_POST['fakultas'];
        $jenis = $_POST['jenis'];
        $sta = $_POST['sta'];
        $alamat = $_POST['alamat'];

        $ambil=$koneksi->query("SELECT nama_anggota, no_anggota FROM anggota WHERE nama_anggota='$nama' OR no_anggota='$no'");
        $akunyangada = $ambil->num_rows;
        if ($akunyangada==1) {
                //      $akun = $ambil->fetch_assoc();
                echo "<script>alert('Registrasi Akun Gagal!');</script>";
                echo "<div class='alert alert-danger'>Username atau Email sudah terdaftar. Silakan daftar ulang.</div>";
            }
        
            else {
            $koneksi->query("INSERT INTO anggota (nama_anggota, no_anggota, no_hp, alamat, fakultas, jenis_kelamin, status) 
                        VALUES('$nama', '$no', '$nope', '$alamat', '$fakultas', '$jenis', '$sta')");

            echo "<script>alert('Tambah Anggota Berhasil!');</script>";
            echo "<meta http-equiv='refresh'content='1;url=index.php'>";
            }
            }
?>
<br/>
<br>

</div>
</body>
</html>
