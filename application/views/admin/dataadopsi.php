                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <a href="#" class="btn btn-success text-white mb-2" data-toggle="modal" data-target="#addAdopsiModal"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    <!-- Page Heading 
                    <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
                    <a href="#" class="btn btn-primary text-white mb-2" data-toggle="modal" data-target="#addUserModal"><i class="fa fa-plus" aria-hidden="true"></i></a> -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Data Adopsi</h6>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id Adopsi</th>
                                        <th>Id USer</th>
                                        <th>Nama Lengkap Pengadopsi</th> 
                                        <th>Email Pengadopsi</th>
                                        <th>Nomor Pengadopsi</th> 
                                        <th>Id Hewan</th>
                                        <th>Nama Hewan</th>
                                        <th>Usia</th>
                                        <th>Nama Ras</th>
                                        <th>Tanggal Teradopsi</th>
                                        <th>Status</th>
                                        <th>Keterangan Status</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($adoption_data as $adoption) : ?>
                                        <tr>
                                            <td><?php echo $adoption->AdoptionID; ?></td>
                                            <td><?php echo $adoption->UserID; ?></td>
                                            <td><?php echo $adoption->Namalengkap; ?></td>
                                            <td><?php echo $adoption->Email; ?></td> 
                                            <td><?php echo $adoption->Nomortlp; ?></td>
                                            <td><?php echo $adoption->AnimalID; ?></td>
                                            <td><?php echo $adoption->Animalname; ?></td>
                                            <td><?php echo $adoption->Age; ?></td>
                                            <td><?php echo $adoption->Namaras; ?></td>
                                            <td><?php echo $adoption->Adoptiondate; ?></td>
                                            <td>
                                                <?php 
                                                if ($adoption->Status == 1) {
                                                    echo 'Proses Verifikasi';
                                                } elseif ($adoption->Status == 2) {
                                                    echo 'Berhasil dan Teradopsi';
                                                } elseif ($adoption->Status == 3) {
                                                    echo 'Gagal Adopsi';
                                                } else {
                                                    echo 'Status tidak valid';
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $adoption->Keteranganstatus; ?></td>
                                            <td>
                                                <?php if(isset($adoption->NamaGambar)): ?>
                                                    <img src="<?php echo base_url('./assets/img/post/' . $adoption->NamaGambar); ?>" alt="Animal Image" width="100">
                                                <?php else: ?>
                                                    No Image Available
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-warning text-white m-1" data-toggle="modal" data-target="#editAdopsiModal<?php echo $adoption->AdoptionID; ?>"><i class="fa fa-list" aria-hidden="true"></i></a>
                                                <a href="#" class="btn btn-danger text-white m-1" onclick="confirmDelete('<?php echo site_url('Admin/adminc/deleteadopsi/' . $adoption->AdoptionID); ?>')"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
