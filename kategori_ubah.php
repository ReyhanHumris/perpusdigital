<div class="w-100">
    <?php
        $id = $_GET['id'];
        $query_lama = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori=$id");
        $data_lama = mysqli_fetch_assoc($query_lama);

        if(isset($_POST['submit'])) {
            $kategori = strtolower($_POST['kategori']);
            
            // Cek apakah kategori sudah ada (kecuali dirinya sendiri)
            $cek = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori='$kategori' AND id_kategori != $id");
            $check = mysqli_num_rows($cek);

            if($check > 0) {
                echo '<script> alert("Nama kategori tersebut sudah ada!"); </script>';
            } else {
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

    <div class="mb-4 animate-fade">
        <h2 class="mb-1 text-gray-800 font-weight-bold">
            <i class="fas fa-edit text-primary mr-2"></i>Ubah Kategori Buku
        </h2>
        <p class="text-muted mb-0 small">Edit kategori buku yang sudah ada</p>
    </div>

    <div class="card form-card shadow-sm border-0 animate-fade">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group mb-4">
                    <label for="kategori" class="font-weight-bold text-gray-800 mb-2">
                        <i class="fas fa-tag text-primary mr-1"></i> Nama Kategori
                    </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-folder"></i></span>
                        </div>
                        <input type="text" name="kategori" id="kategori" class="form-control" 
                               value="<?php echo $data_lama['kategori']; ?>" 
                               placeholder="Masukkan nama kategori" required>
                    </div>
                    <small class="text-muted">Contoh: Novel, Komik, Ensiklopedia, dll</small>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">
                            <i class="fas fa-save mr-2"></i>Simpan Perubahan
                        </button>
                        <a href="?page=kategori" class="btn btn-danger">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>