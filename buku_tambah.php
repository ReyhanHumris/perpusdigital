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
                        
                        // Handling Upload Gambar
                        $gambar = $_FILES['gambar']['name'];
                        $tmp = $_FILES['gambar']['tmp_name'];
                        move_uploaded_file($tmp, 'assets/img/'.$gambar);

                        $query = mysqli_query($koneksi, "INSERT INTO buku(id_kategori, judul, penulis, penerbit, tahun_terbit, sinopsis, jumlah, isbn, gambar) 
                                 VALUES('$id_kategori','$judul','$penulis','$penerbit','$tahun_terbit','$sinopsis','$jumlah','$isbn','$gambar')");

                        if($query) {
                            echo '<script>alert("Tambah data berhasil."); location.href="?page=buku";</script>';
                        } else {
                            echo '<script>alert("Tambah data gagal.");</script>';
                        }
                    }
                ?>

                <div class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Judul Buku</label>
                        <input type="text" class="form-control shadow-none" name="judul" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Kategori</label>
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
                        <label class="form-label fw-bold">Penulis</label>
                        <input type="text" class="form-control shadow-none" name="penulis" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Penerbit</label>
                        <input type="text" class="form-control shadow-none" name="penerbit" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Tahun Terbit</label>
                        <input type="number" class="form-control shadow-none" name="tahun_terbit" required>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Jumlah</label>
                        <input type="number" class="form-control shadow-none" name="jumlah" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">ISBN</label>
                        <input type="text" class="form-control shadow-none" name="isbn">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Gambar</label>
                        <input type="file" class="form-control shadow-none" name="gambar">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Sinopsis</label>
                    <textarea name="sinopsis" class="form-control shadow-none" rows="4"></textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" name="submit" class="btn btn-primary px-4 fw-bold">Simpan</button>
                    <button type="reset" class="btn btn-secondary px-4 fw-bold">Reset</button>
                    <a href="?page=buku" class="btn btn-danger px-4 fw-bold">Kembali</a>
                </div>
            </form>
        </div>
    </div>
    
    <footer class="mt-5 pb-3 text-center text-muted small">
        Copyright &copy; Your Website 2026
    </footer>
</div>