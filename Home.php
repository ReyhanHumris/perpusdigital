<div class="conteiner text-left">
    <div class="row">
        <div class="col-l-4 bg-primary text-white p-4 mb-4 rounded w-100 shadow">
            <h1 class="h3 mb-4 text-white" style="color:white !important;"><b>Hallo <?= $_SESSION['user']['nama']; ?>, Selamat Datang di Dashboard Perpustakaan Digital</b></h1>
            <p class="text-white">Anda login sebagai <?= $_SESSION['user']['level']; ?></p>
        </div>
    </div>
</div>                   
                   
                   
                   
                   <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Kategori</div>
                                            <div class="h5 mb-0 font-weight-bold text-black-800"><?= mysqli_num_rows(mysqli_query($koneksi, 'SELECT * FROM kategori')); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Buku</div>
                                            <div class="h5 mb-0 font-weight-bold text-black-800"><?= mysqli_num_rows(mysqli_query($koneksi, 'SELECT * FROM buku')); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-sharp-duotone fa-fa-solid fa-books"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Ulasan
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-black-800"><?= mysqli_num_rows(mysqli_query($koneksi, 'SELECT * FROM ulasan')); ?></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total User</div>
                                            <div class="h5 mb-0 font-weight-bold text-black-800"><?= mysqli_num_rows(mysqli_query($koneksi, 'SELECT * FROM user')); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


<div class="card mb-4">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <td width="150"><strong>Nama</strong></td>
                <td width="1">:</td>
                <td width="200"><?=  $_SESSION['user']['level']; ?></td>
            </tr>
            <tr>
                <td width="150"><strong>Tanggal</strong></td>
                <td width="1">:</td>
                <td><?= date('d-m-y'); ?></td>
            </tr>
        </table>
    </div>
</div>