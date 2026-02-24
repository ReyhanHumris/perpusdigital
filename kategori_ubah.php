<div class="w-100">
    <h2 class="mb-4 text-gray-800">Kategori Buku</h2>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="post">
                <?php
                $id = $_GET['id'];
                if(isset($_POST['submit'])) {
                    $kategori = strtolower($_POST['kategori']);
                    // Cek apakah kategori sudah ada
                    $cek = mysqli_query($koneksi, "SELECT * FROM kategori WHERE Lower(kategori)='$kategori'");
                    $check = mysqli_num_rows($cek);
                    if($check > 0) {
                        echo '<script> alert("data yang dimasukan sama"); </script>';
                        return false;
                    } else{
                        $query = mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori' WHERE id_kategori=$id");
                            if($query) {
                                echo '<script> alert("Ubah Data berhasil disimpan");
                                location.href="?page=kategori";</script>';  
                            } else {
                                echo '<script> alert("Data gagal disimpan"); </script>';   
                            }
                    }
                }
                ?> 
            <!-- form -->
                <div class="form-group mb-3">
                    <label for="kategori" class="font-weight-bold text-gray-800">Nama Kategori</label>
                    <div class="col-md-6">
                        <input type="text" name="kategori" id="kategori" class="form-control" placeholder="Masukkan nama kategori" required>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-9 offset-md-3">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <a href="?page=kategori" class="btn btn-danger">Kembali</a>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
