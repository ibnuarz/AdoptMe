<div class="page-heading" id="top"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4 text-center">
                <h6 class="text-danger m-2">Data Hewan Yang Diupload Oleh Anda</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
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
                                <th>Nama Hewan</th>
                                <th>Usia</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Gambar</th>
                                <th>Nama Pengupload</th>
                                <th>Nama Ras</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($animal_data as $animal) : ?>
                                <tr>
                                    <td><?php echo $animal->Animalname; ?></td>
                                    <td><?php echo $animal->Age; ?></td>
                                    <td><?php echo $animal->Deskripsi; ?></td>
                                    <td><?php 
                                        if ($animal->Status == 1) {
                                            echo '<a class="btn btn-warning text-light" readonly> Belum Teradopsi </a>';
                                        } elseif ($animal->Status == 2) {
                                            echo '<a class="btn btn-warning text-light" readonly> Teradopsi </a>';
                                        } elseif ($animal->Status == 3) {
                                            echo '<a class="btn btn-warning text-light" readonly> Proses Adopsi</a>';
                                        } else {
                                            echo 'Status tidak valid';
                                        }
                                    ?></td>
                                    <td>
                                        <?php foreach ($animal->gambar as $gambar) : ?>
                                            <img src="<?php echo base_url('./Assets/img/post/' . $gambar->NamaGambar); ?>" alt="Gambar Hewan" width="100">
                                            <?php break; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td><?php echo $animal->Namalengkap; ?></td>
                                    <td><?php echo $animal->Namaras; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-primary text-white m-1" data-toggle="modal" data-target="#editModalHewanUser<?php echo $animal->AnimalID; ?>"><i class="fa fa-list" aria-hidden="true"></i></a>
                                        <a href="#" class="btn btn-danger text-white m-1" onclick="confirmDelete('<?php echo base_url('main/deleteAnimal/' . $animal->AnimalID); ?>')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>    <!-- Add Animal Modal -->
    <!-- Add Animal Modal -->
    <?php foreach ($animal_data as $animal) : ?>
    <div class="modal fade" id="editModalHewanUser<?php echo $animal->AnimalID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Hewan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editAnimalForm<?php echo $animal->AnimalID; ?>" action="<?php echo site_url('Admin/adminc/editAnimalUSer/' . $animal->AnimalID); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="animalID" value="<?php echo $animal->AnimalID; ?>">
                        <div class="form-group">
                            <label for="animalname">Nama Hewan:</label>
                            <input type="text" class="form-control" id="animalname" name="animalname" value="<?php echo $animal->Animalname; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="animalID" value="<?php echo $animal->AnimalID; ?>">
                        </div>
                        <div class="form-group">
                            <label for="age">Usia:</label>
                            <input type="number" class="form-control" id="age" name="age" value="<?php echo $animal->Age; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi:</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?php echo $animal->Deskripsi; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1" <?php echo ($animal->Status == 1) ? 'selected' : ''; ?>>Belum Teradopsi</option>
                                <option value="2" <?php echo ($animal->Status == 2) ? 'selected' : ''; ?>>Teradopsi</option>
                                <option value="3" <?php echo ($animal->Status == 3) ? 'selected' : ''; ?>>Proses Adopsi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rasID">Pilih Ras Hewan:</label>
                            <select class="form-control" id="rasID" name="rasID" required>
                                <?php foreach ($ras_data as $ras) : ?>
                                    <option value="<?php echo $ras->RasID; ?>" <?php echo ($ras->RasID == $animal->RasID) ? 'selected' : ''; ?>><?php echo $ras->Namaras; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <h6 class="text-danger text-center">Maksimal upload 4 gambar</h6>
                        </div>
                        <div class="form-group">
                        <label for="existing_images">Gambar Lama:</label><br>
                        <?php foreach ($animal->gambar as $gambar) : ?>
                            <div class="image-container">
                                <img src="<?php echo base_url('./assets/img/post/' . $gambar->NamaGambar); ?>" alt="Gambar Hewan" width="100">
                                <a href="<?php echo site_url('main/deleteImage/' . $gambar->GambarID); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">Hapus</a>
                            </div>
                        <?php endforeach; ?>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Tambah Gambar Baru:</label><br>
                            <input type="file" class="form-control-file" id="gambar<?php echo $animal->AnimalID; ?>" name="gambar[]" accept="image/*" multiple>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Edit Hewan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <script>
        function confirmDelete(url) 
    {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success m-2",
                cancelButton: "btn btn-danger m-2"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: "Yakin Menghapus Data?",
            text: "Data tidak akan dihapus permanen!",
            icon: "info",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire({
                    title: "Mohon Tunggu...",
                    text: "Proses Penghapusan Sedang Berlangsung.",
                    icon: "info",
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
                setTimeout(() => {
                    swalWithBootstrapButtons.fire({
                        title: "Dihapus!",
                        text: "File Berhasil Dihapus.",
                        icon: "success",
                        timer: 2000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    });
                    window.location.href = url; 
                }, 500);
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Aksi Batal",
                    text: "File Tidak Jadi Dihapus.",
                    icon: "error"
                });
            }
        });
    }
    </script>