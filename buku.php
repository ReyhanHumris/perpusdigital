<div class="w-100">
    <h2 class="mb-2 text-gray-800">Daftar Buku</h2>
           
    <?php  if($_SESSION['user']['level'] !='peminjam') : ?>
        <div class="mb-3">
            <a href="?page=buku_tambah" class="btn btn-primary">Tambah Data</a>
        </div>   
     <?php endif;?>


    <!-- table kategori -->
    <div class="clearfix">
        <table class="table table-bordered" id="datatable" width = "100%" cellspasing>
            <thead>
                <th>No.</th>
                <th>Judul</th>
                <th>Nama Kategori</th>
                <th>Gambar</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Sinopis</th>
                <th>Jumlah</th>
                <th>ISBN</th>
            <?php  if($_SESSION['user']['level'] !='peminjam') : ?>
                <th>Aksi</th>
            <?php endif;?>
            </thead>
            <tbody>
                <?php 
                    $query = mysqli_query($koneksi, "SELECT * FROM buku");
                    $no = 1;
                    while($data = mysqli_fetch_array($query)):
                 ?>
                <tr>
                    <td><?=$no++; ?></td>
                    <td><?= $data['judul']; ?></td>
                    <td><?= $data['id_kategori'] ?></td>
                     <td><img src="assets/img/<?= $data['gambar']; ?>" alt="<?= $data['judul']; ?>" width="100px"></td>
                    <td><?= $data['penulis'] ?></td>
                    <td><?= $data['penerbit'] ?></td>
                    <td><?= $data['tahun_terbit'] ?></td>
                    <td><?= $data['sinopsis']; ?></td>
                    <td><?= $data['jumlah'] ?></td>
                    <td><?= $data['isbn'] ?></td>

                    <!-- Hanya bisa di buka oleh admin -->
                    <?php  if($_SESSION['user']['level'] !='peminjam') : ?>
                    <td>
                        <a href="?page=buku_ubah&&id=<?= $data['id_buku'];?>" class="btn btn-sm btn-info">Ubah</a>
                        <a href="?page=buku_hapus&&id=<?= $data['id_buku']; ?>" class="btn btn-sm btn-danger btn-action" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                            Hapus
                        </a>
                    </td>
                    <?php endif;?>
                </tr>
                <?php
                endwhile;
                ?>
            </tbody>
        </table>
    </div>
</div>