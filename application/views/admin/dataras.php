                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <a href="#" class="btn btn-success text-white mb-2" data-toggle="modal" data-target="#addPaketModal"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    <!-- Page Heading 
                    <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
                    <a href="#" class="btn btn-primary text-white mb-2" data-toggle="modal" data-target="#addUserModal"><i class="fa fa-plus" aria-hidden="true"></i></a> -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Data Ras</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id Ras</th>
                                    <th>Nama Ras</th>
                                    <th>Jenis</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ras_data as $r) : ?>
                                    <tr>
                                        <td><?php echo $r->RasID; ?></td>
                                        <td><?php echo $r->Namaras; ?></td>
                                        <td>
                                            <?php
                                            if ($r->Jenis == 1) {
                                                echo "Anjing";
                                            } elseif ($r->Jenis == 2) {
                                                echo "Kucing";
                                            } else {
                                                echo "Tidak diketahui";
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $r->Deskripsi; ?></td>
                                        <td>
                                            <a href="#" class="btn btn-warning text-white m-1" data-toggle="modal" data-target="#editRasModal<?php echo $r->RasID; ?>"><i class="fa fa-list" aria-hidden="true"></i></a>
                                            <a href="#" class="btn btn-danger text-white m-1" onclick="confirmDelete('<?php echo site_url('Admin/adminc/deleteras/' . $r->RasID); ?>')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </table>

                                
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
