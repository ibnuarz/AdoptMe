                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading 
                    <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
                    <a href="#" class="btn btn-primary text-white mb-2" data-toggle="modal" data-target="#addUserModal"><i class="fa fa-plus" aria-hidden="true"></i></a> -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Data User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id User</th>
                                    <th>Nama User</th>
                                    <th>Nomor Handphone</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Kota</th>
                                    <th>Kecamatan</th>
                                    <th>Alamat Lengkap</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($user_data as $s) : ?>
                                <?php if ($s->UserID != 1) : ?> 
                                    <tr>
                                        <td><?php echo $s->UserID; ?></td>
                                        <td><?php echo $s->Namalengkap; ?></td>
                                        <td><?php echo $s->Nomortlp; ?></td>
                                        <td><?php echo $s->Username; ?></td>
                                        <td><?php echo $s->Email; ?></td>
                                        <td><?php echo $s->Kota; ?></td>
                                        <td><?php echo $s->Kecamatan; ?></td>
                                        <td><?php echo $s->Alamatfull; ?></td>
                                        <td>
                                            <a href="#" class="btn btn-danger text-white m-1" onclick="confirmDelete('<?php echo site_url('Admin/adminc/deleteuser/' . $s->UserID); ?>')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
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
