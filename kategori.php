
<div class="w-100">
    <div class="d-flex justify-content-between align-items-center mb-4 animate-fade">
        <div>
            <h2 class="mb-1 text-gray-800 font-weight-bold">
                <i class="fas fa-folder-open text-primary mr-2"></i>Kategori Buku
            </h2>
            <p class="text-muted mb-0 small">Kelola kategori buku perpustakaan digital</p>
        </div>
    </div>
           
    <?php if($_SESSION['user']['level'] !='peminjam') : ?>
        <div class="mb-3 animate-fade animate-delay-1">
            <a href="?page=kategori_tambah" class="btn btn-primary btn-rounded shadow">
                <i class="fas fa-plus-circle mr-2"></i>Tambah Data
            </a>
        </div>   
    <?php endif;?>

    <!-- Card Container -->
    <div class="card kategori-card shadow-sm border-0 animate-fade animate-de2lay-">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped  mb-0" id="datatable" width="100%" cellspacing="0">
                    <thead class=" text-black">
                        <tr>
                            <th class="text-center" style="width: 60px;">NO</th>
                            <th>Nama Kategori</th>
                            <?php if($_SESSION['user']['level'] !='peminjam') : ?>
                                <th class="text-center" style="width: 150px;"><i class="fas fa-cogs mr-2"></i>Aksi</th>
                            <?php endif;?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = mysqli_query($koneksi, "SELECT * FROM kategori");
                            $no = 1;
                            while($data = mysqli_fetch_array($query)):
                        ?>
                        <tr>
                            <td class="text-center font-weight-bold text-muted"><?php echo $no++; ?></td>
                            <td><?= $data['kategori']; ?></td>
                            <!-- Hanya bisa di buka oleh admin -->
                            <?php if($_SESSION['user']['level'] !='peminjam') : ?>
                            <td class="text-center">
                                <a href="?page=kategori_ubah&&id=<?= $data['id_kategori'];?>" class="btn btn-sm btn-info btn-action mr-1" title="Ubah">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="?page=kategori_hapus&&id=<?= $data['id_kategori']; ?>" class="btn btn-sm btn-danger btn-action" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                            <?php endif;?>
                        </tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
