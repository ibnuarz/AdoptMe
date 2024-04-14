    <!-- Begin Page Content -->
    <div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Laporan Bulanan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>AdoptionID</th>
                            <th>Nama Pengadopsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($laporan_data as $adoptionID => $laporan_group): ?>
                            <tr>
                                <td>
                                    <strong><?php echo $adoptionID; ?></strong>
                                </td>
                                <td>
                                    <strong><?php echo $laporan_group[0]->Namalengkap; ?></strong>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('Admin/adminc/detailLaporanBulanan/'.$adoptionID); ?>" class="btn btn-info">Tampil Detail</a>
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