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
            <a href="?page=ulasan_tambah" class="btn btn-primary btn-rounded shadow">
                <i class="fas fa-plus-circle mr-2"></i>Tambah Ulasan
            </a>
        </div>   
    <?php endif;?>

    <!-- Card Container -->
    <div class="card kategori-card shadow-sm border-0 animate-fade animate-delay-2">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover mb-0" id="datatable" width="100%" cellspacing="0">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th class="text-center" style="width: 60px;">ID_Ulasan</th>
                            <th><i class="fas fa-folder mr-2"></i>Ulasan</th>
                            <?php if($_SESSION['user']['level'] !='peminjam') : ?>
                                <th class="text-center" style="width: 150px;"><i class="fas fa-cogs mr-2"></i>Aksi</th>
                            <?php endif;?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = mysqli_query($koneksi, "SELECT * FROM ulasan");
                            $no = 1;
                            $badge_classes = ['badge-blue', 'badge-green', 'badge-red', 'badge-yellow', 'badge-pink', 'badge-cyan'];
                            $icons = ['fa-book', 'fa-star', 'fa-heart', 'fa-lightbulb', 'fa-rocket', 'fa-magic'];
                            while($data = mysqli_fetch_array($query)):
                                $badge_idx = ($no - 1) % count($badge_classes);
                                $icon_idx = ($no - 1) % count($icons);
                        ?>
                        <tr>
                            <td class="text-center font-weight-bold text-muted"><?php echo $no++; ?></td>
                            <td>
                                <span class="badge-category <?php echo $badge_classes[$badge_idx]; ?>">
                                    <i class="fas <?php echo $icons[$icon_idx]; ?>"></i>
                                    <?php echo ucfirst($data['ulasan']); ?>
                                </span>
                            </td>

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