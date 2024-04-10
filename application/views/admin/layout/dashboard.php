    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        
        <!-- Tambahkan ID untuk elemen yang akan diubah -->
        <h6 id="lastUpdateText" class="text-danger">
            <p>Data Terakhir di Update: <?php echo date('Y-m-d H:i:s'); ?></p>
        </h6>
        <!-- Content Row -->
        <div class="row">
            <!-- Kolom pertama -->
            <div class="col-sm-4 col-sm-4 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Data Binatang Teradopsi</div>
                                <div id="teradopsiData" class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $teradopsi_data; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-dog fa-2x text-black-300"></i>
                                <i class="fas fa-solid fa-cat fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Kolom kedua -->
            <div class="col-sm-4 col-sm-4 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Data Binatang Verifikasi Adopsi</div>
                                <div id="verifadopsiData" class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $verifadopsi_data; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-dog fa-2x text-black-300"></i>
                                <i class="fas fa-solid fa-cat fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Kolom ketiga -->
            <div class="col-sm-4 col-sm-4 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Data Binatang Belum Teradopsi</div>
                                <div id="belumadopsiData" class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $belumadopsi_data; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-dog fa-2x text-black-300"></i>
                                <i class="fas fa-solid fa-cat fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('teradopsiData').style.display = 'none';
        document.getElementById('verifadopsiData').style.display = 'none';
        document.getElementById('belumadopsiData').style.display = 'none';
        Swal.fire({
        title: "Mengupdate Data...",
        timer: 1000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {
            timer.textContent = `${Swal.getTimerLeft()}`;
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        }
        }).then((result) => {
        document.getElementById('teradopsiData').style.display = 'block';
        document.getElementById('verifadopsiData').style.display = 'block';
        document.getElementById('belumadopsiData').style.display = 'block';
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log("I was closed by the timer");
        }
        });
    });
    </script>
