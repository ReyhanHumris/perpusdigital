<div class="w-100">
    <h2 class="mb-4 text-gray-800">Tambah Buku</h2>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body bg-white rounded p-4">
            <form method="post" enctype="multipart/form-data">
                <?php
                    if(isset($_POST['submit'])) {
                        $id_kategori = $_POST['id_kategori'];
                        $judul = $_POST['judul'];
                        $penulis = $_POST['penulis'];
                        $penerbit = $_POST['penerbit'];
                        $tahun_terbit = $_POST['tahun_terbit'];
                        $sinopsis = $_POST['sinopsis'];
                        $jumlah = $_POST['jumlah'];
                        $isbn = $_POST['isbn'];
                        
                        // Logika Unggah Gambar
                        $gambar = $_FILES['gambar']['name'];
                        $tmp = $_FILES['gambar']['tmp_name'];
                        
                        // Pastikan gambar dipindah ke folder assets/img/
                        if(!empty($gambar)) {
                            move_uploaded_file($tmp, 'assets/img/' . $gambar);
                        }

                        // Query Simpan Data
                        $query = mysqli_query($koneksi, "INSERT INTO buku(id_kategori, judul, penulis, penerbit, tahun_terbit, sinopsis, jumlah, isbn, gambar) 
                                 VALUES('$id_kategori','$judul','$penulis','$penerbit','$tahun_terbit','$sinopsis','$jumlah','$isbn','$gambar')");

                        if($query) {
                            echo '<script>alert("Tambah data berhasil."); location.href="?page=buku";</script>';
                        } else {
                            echo '<script>alert("Tambah data gagal: ' . mysqli_error($koneksi) . '");</script>';
                        }
                    }
                ?>

                <div class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-gray-700">Judul Buku</label>
                        <input type="text" class="form-control shadow-none" name="judul" required placeholder="Masukkan judul buku">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-gray-700">Kategori</label>
                        <select name="id_kategori" class="form-select shadow-none" required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            <?php
                                $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                                while($k = mysqli_fetch_array($kat)) {
                                    echo '<option value="'.$k['id_kategori'].'">'.$k['kategori'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold text-gray-700">Penulis</label>
                        <input type="text" class="form-control shadow-none" name="penulis" required placeholder="Nama penulis">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold text-gray-700">Penerbit</label>
                        <input type="text" class="form-control shadow-none" name="penerbit" required placeholder="Nama penerbit">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold text-gray-700">Tahun Terbit</label>
                        <input type="number" class="form-control shadow-none" name="tahun_terbit" required placeholder="Contoh: 2024">
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold text-gray-700">Jumlah Stok</label>
                        <input type="number" class="form-control shadow-none" name="jumlah" required placeholder="0">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold text-gray-700">ISBN</label>
                        <input type="text" class="form-control shadow-none" name="isbn" placeholder="Kode ISBN">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold text-gray-700">Cover Buku (Gambar)</label>
                        <input type="file" class="form-control shadow-none" name="gambar" accept="image/*">
                        <small class="text-muted">Format: jpg, png, jpeg</small>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold text-gray-700">Sinopsis</label>
                    <textarea name="sinopsis" class="form-control shadow-none" rows="4" placeholder="Tuliskan ringkasan buku..."></textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" name="submit" class="btn btn-primary px-4 fw-bold shadow-sm">
                        Simpan Data
                    </button>
                    <button type="reset" class="btn btn-secondary px-4 fw-bold shadow-sm">Reset</button>
                    <a href="?page=buku" class="btn btn-danger px-4 fw-bold shadow-sm">Kembali</a>
                </div>
            </form>
        </div>
    </div>
    
    <footer class="mt-5 pb-3 text-center text-muted small">
        Copyright &copy; Your Website 2026
    </footer>
</div>