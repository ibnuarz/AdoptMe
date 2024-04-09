                            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <a href="#" class="btn btn-success text-white mb-2" data-toggle="modal" data-target="#addAnimalModal"><i class="fa fa-plus" aria-hidden="true"></i></a>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">Data Hewan</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id Hewan</th>
                                <th>Nama Hewan</th>
                                <th>Usia</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Gambar</th>
                                <th>RasID</th>
                                <th>Nama Ras</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($animal_data as $animal) : ?>
                                <tr>
                                    <td><?php echo $animal->AnimalID; ?></td>
                                    <td><?php echo $animal->Animalname; ?></td>
                                    <td><?php echo $animal->Age; ?></td>
                                    <td><?php echo $animal->Deskripsi; ?></td>
                                    <td><?php 
                                        if ($animal->Status == 1) {
                                            echo 'Belum Teradopsi';
                                        } elseif ($animal->Status == 2) {
                                            echo 'Teradopsi';
                                        } elseif ($animal->Status == 3) {
                                            echo 'Proses Adopsi';
                                        } else {
                                            echo 'Status tidak valid';
                                        }
                                    ?></td>
                                    <td>
                                        <?php foreach ($animal->gambar as $gambar) : ?>
                                            <img src="<?php echo base_url('./Assets/img/post/' . $gambar->NamaGambar); ?>" alt="Gambar Hewan" width="100">
                                        <?php endforeach; ?>
                                    </td>
                                    <td><?php echo $animal->RasID; ?></td>
                                    <td><?php echo $animal->Namaras; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-warning text-white m-1" data-toggle="modal" data-target="#editAnimalModal<?php echo $animal->AnimalID; ?>"><i class="fa fa-list" aria-hidden="true"></i></a>
                                        <a href="#" class="btn btn-danger text-white m-1" onclick="confirmDelete('<?php echo site_url('Admin/adminc/deleteAnimal/' . $animal->AnimalID); ?>')"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
