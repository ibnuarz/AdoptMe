    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Data Laporan User</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>LaporanID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Isi</th>
                                <th>Tanggal Laporan</th>
                                <th>Gambar Laporan</th>
                                <th>Aksi</th> <!-- Kolom untuk tombol aksi delete -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($laporan_data as $laporan): ?>
                                <tr>
                                    <td><?php echo $laporan->LaporanID; ?></td>
                                    <td><?php echo $laporan->Username; ?></td>
                                    <td><?php echo $laporan->Email; ?></td>
                                    <td><?php echo $laporan->Isi; ?></td>
                                    <td><?php echo $laporan->Tanggallaporan; ?></td>
                                    <td>
                                        <?php if (!empty($laporan->Gambarlaporan)): ?>
                                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#gambarModal<?php echo $laporan->LaporanID; ?>">
                                                Lihat Gambar
                                            </button>
                                            <div class="modal fade" id="gambarModal<?php echo $laporan->LaporanID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Gambar Laporan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="<?php echo base_url('assets/img/laporan/' . $laporan->Gambarlaporan); ?>" class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <p>Tidak ada gambar</p>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <form action="<?php echo base_url('Admin/adminc/delete_laporan_lain'); ?>" method="post">
                                            <input type="hidden" name="laporanID" value="<?php echo $laporan->LaporanID; ?>">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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

