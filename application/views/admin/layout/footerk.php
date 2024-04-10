        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
        </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">LOGOUT</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-success">Sampai Jumpa Admin AdoptMe !</h5>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning text-white" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?php echo base_url('Admin/adminc/logout')?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- add ras Modal-->
    <div class="modal fade" id="addRasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Ras</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('Admin/adminc/addRas'); ?>" method="post">
                    <div class="form-group">
                        <label for="id">Id Ras</label>
                        <input type="text" class="form-control" id="id" name="id">
                    </div>
                    <div class="form-group">
                        <label for="namaras">Nama Ras Binatang</label>
                        <input type="text" class="form-control" id="namaras" name="namaras" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select class="form-control" id="jenis" name="jenis" required>
                            <option value="1">Anjing</option>
                            <option value="2">Kucing</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Umum Ras</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Tambah Ras</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>    
        
    <!-- edit ras Modal-->
    <?php foreach ($ras_data as $r) : ?>
    <div class="modal fade" id="editRasModal<?php echo $r->RasID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Ras</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('Admin/adminc/editras/' . $r->RasID); ?>" method="post">
                        <div class="form-group">
                            <label for="id">ID Ras:</label>
                            <input type="text" class="form-control" id="id" name="id" value="<?php echo $r->RasID; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="namaras">Nama Ras Binatang:</label>
                            <input type="text" class="form-control" id="namaras" name="namaras" value="<?php echo $r->Namaras; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis:</label>
                            <select class="form-control" id="jenis" name="jenis" required>
                                <option value="1" <?php echo ($r->Jenis == 1) ? 'selected' : ''; ?>>Anjing</option>
                                <option value="2" <?php echo ($r->Jenis == 2) ? 'selected' : ''; ?>>Kucing</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Umum Ras:</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?php echo $r->Deskripsi; ?></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Edit Ras</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <!-- Add Animal Modal -->
    <div class="modal fade" id="addAnimalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Hewan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addAnimalForm" action="<?php echo site_url('Admin/adminc/addAnimal'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="animalname">Nama Hewan:</label>
                            <input type="text" class="form-control" id="animalname" name="animalname" required>
                        </div>
                        <div class="form-group">
                            <label for="age">Usia (jika tidak diketahui isi 0):</label>
                            <input type="number" class="form-control" id="age" name="age" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi:</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1">Belum Teradopsi</option>
                                <option value="2">Teradopsi</option>
                                <option value="3">Proses Adopsi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenis_anjing">Jenis Hewan:</label><br>
                            <input type="radio" id="jenis_anjing" name="jenis" value="1">
                            <label for="jenis_anjing">Anjing</label><br>
                            <input type="radio" id="jenis_kucing" name="jenis" value="2">
                            <label for="jenis_kucing">Kucing</label><br>
                        </div>
                        <div id="rasList" class="form-group">
                            <label for="rasID">Pilih Ras Hewan:</label>
                            <select class="form-control" id="rasID" name="rasID" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar (Maksimal 4 gambar):</label>
                            <input type="file" class="form-control-file" id="gambar" name="gambar[]" accept="image/*" multiple required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah Hewan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Animal Modal -->
    <?php foreach ($animal_data as $animal) : ?>
    <div class="modal fade" id="editAnimalModal<?php echo $animal->AnimalID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Hewan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editAnimalForm<?php echo $animal->AnimalID; ?>" action="<?php echo site_url('Admin/adminc/editAnimal/' . $animal->AnimalID); ?>" method="post" enctype="multipart/form-data">
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
                                <a href="<?php echo site_url('Admin/adminc/deleteImage/' . $gambar->GambarID); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">Hapus</a>
                            </div>
                        <?php endforeach; ?>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar Baru:</label><br>
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

    <!-- Add Adoption Modal -->
    <div class="modal fade" id="addAdopsiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Adopsi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addAdopsiForm" action="<?php echo site_url('Admin/adminc/addAdopsi'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="userID">User:</label>
                            <select class="form-control" id="userID" name="userID" required>
                                <?php foreach ($user_data as $user) : ?>
                                    <option value="<?php echo $user->UserID; ?>"><?php echo $user->Username . ' - ' . $user->Namalengkap; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="animalID">Hewan:</label>
                            <select class="form-control" id="animalID" name="animalID" required>
                                <?php foreach ($animal_data as $animal) : ?>
                                    <?php if ($animal->Status == 1) : ?>
                                        <option value="<?php echo $animal->AnimalID; ?>"><?php echo $animal->Animalname . ' - Umur: ' . $animal->Age . ' - Ras: ' . $animal->Namaras; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="adoptionDate">Tanggal Adopsi:</label>
                            <input type="date" class="form-control" id="adoptionDate" name="adoptionDate" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1">Proses Verifikasi</option>
                                <option value="2">Berhasil dan Teradopsi</option>
                                <option value="3">Gagal Adopsi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h6 class="text-warning text-center">Perhatikan Hal Berikut!</h6>
                            <p>
                                Keterangan Status di sisi dengan format berikut :
                                <br>
                                1. Jika Proses Verifikasi : 'Sedang Proses Verifikasi Oleh Admin'
                                <br>
                                2. Jika Berhasil : 'Berhasil dan Binatang Teradopsi'
                                <br>
                                3. Jika Gagal : 'Gagal Adopsi dikarenakan : ..(isi dengan alasan)'
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="keteranganStatus">Keterangan Status:</label>
                            <textarea class="form-control" id="keteranganStatus" name="keteranganStatus" rows="3" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah Adopsi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Edit Adoption Modal -->
<?php foreach ($adoption_data as $adoption) : ?>
<div class="modal fade" id="editAdopsiModal<?php echo $adoption->AdoptionID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Adopsi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editAdopsiForm<?php echo $adoption->AdoptionID; ?>" action="<?php echo site_url('Admin/adminc/editAdopsi/' . $adoption->AdoptionID); ?>" method="post">
                    <input type="hidden" name="adoptionID" value="<?php echo $adoption->AdoptionID; ?>">
                    
                    <!-- User Data -->
                    <div class="form-group">
                        <label for="userID">User:</label>
                        <input type="text" class="form-control" id="userID" name="userID" value="<?php echo $user->Username . ' - ' . $user->Namalengkap; ?>" disabled>
                    </div>
                    
                    <!-- Animal Data -->
                    <div class="form-group">
                        <label for="animalID">Hewan:</label>
                        <input type="text" class="form-control" id="animalID" name="animalID" value="<?php echo $adoption->Animalname . ' - Umur: ' . $adoption->Age . ' - Ras: ' . $adoption->Namaras; ?>" disabled>
                    </div>
                    
                    <div class="form-group">
                        <label for="adoptionDate">Tanggal Adopsi:</label>
                        <input type="date" class="form-control" id="adoptionDate" name="adoptionDate" value="<?php echo $adoption->Adoptiondate; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1" <?php echo ($adoption->Status == 1) ? 'selected' : ''; ?>>Proses Verifikasi</option>
                            <option value="2" <?php echo ($adoption->Status == 2) ? 'selected' : ''; ?>>Berhasil dan Teradopsi</option>
                            <option value="3" <?php echo ($adoption->Status == 3) ? 'selected' : ''; ?>>Gagal Adopsi</option>
                        </select>
                    </div>
                    <div class="form-group">
                            <h6 class="text-warning text-center">Perhatikan Hal Berikut! Sebelum Mengedit Data</h6>
                            <p>
                                Keterangan Status di sisi dengan format berikut :
                                <br>
                                1. Jika Proses Verifikasi : 'Sedang Proses Verifikasi Oleh Admin'
                                <br>
                                2. Jika Berhasil : 'Berhasil dan Binatang Teradopsi'
                                <br>
                                3. Jika Gagal : 'Gagal Adopsi dikarenakan : ..(isi dengan alasan)'
                            </p>
                        </div>
                    <div class="form-group">
                        <label for="keteranganStatus">Keterangan Status:</label>
                        <textarea class="form-control" id="keteranganStatus" name="keteranganStatus" rows="3" required><?php echo $adoption->Keteranganstatus; ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Edit Adopsi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js')?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/demo/datatables-demo.js')?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function cekJenis() {
        var jenisAnjing = document.getElementById('jenis_anjing');
        var jenisKucing = document.getElementById('jenis_kucing');
        var rasList = document.getElementById('rasID');
        var jenis = jenisAnjing.checked ? 1 : (jenisKucing.checked ? 2 : null);
        rasList.innerHTML = '';
        if (jenis !== null) {
            $.ajax({
            url: "<?php echo site_url('Admin/adminc/getRasByJenis'); ?>",
            type: "POST",
            data: { jenis: jenis },
            dataType: "json",
            success: function (response) {
                if (Array.isArray(response)) {
                    $('#rasID').empty();
                    response.forEach(function(ras) {
                        $('#rasID').append($('<option>', {
                            value: ras.RasID,
                            text: ras.Namaras
                        }));
                    });
                } else {
                    console.log("Invalid response format.");
                }
            },
            error: function () {
                console.log("Error fetching RasID options.");
            }
        });
        }
    }
    document.querySelectorAll('input[type=radio][name=jenis]').forEach(function(radio) {
        radio.addEventListener('change', cekJenis);
    });
    
    <?php foreach ($animal_data as $animal) : ?>
    $('#gambar<?php echo $animal->AnimalID; ?>').change(function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview<?php echo $animal->AnimalID; ?>').attr('src', e.target.result).css('display', 'block');
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
    <?php endforeach; ?>

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

    var indexToRasID = {
        0: 201, 
        1: 202, 
        2: 203, 
        3: 204, 
        4: 205, 
        5: 206, 
        6: 207, 
        7: 208, 
        8: 209, 
        9: 210, 
        10: 211, 
        11: 212, 
        12: 213, 
        13: 214, 
        14: 215 
    };

    document.getElementById("uploadForm").addEventListener("submit", function(event) {
        event.preventDefault();
        var formData = new FormData(this);

        fetch('https://predictcat-jw2zdtsf7a-et.a.run.app', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            var resultDiv = document.getElementById("predictionResult");
            resultDiv.innerHTML = `
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Prediction Result
                        </div>
                        <div class="card-body">
                            <p><strong>Image:</strong></p>
                            <img src="${URL.createObjectURL(formData.get('file'))}" class="img-thumbnail" style="max-width: 100%;" alt="Uploaded Image">
                            <p><strong>Nama Gambar :</strong> ${formData.get('file').name}</p>
                            <p><strong>Index (id) :</strong> ${data.index}</p>
                            <p><strong>Ras Terdeteksi Sebagai :</strong> ${data.label}</p>
                            <p><strong>Probabilitas :</strong> ${data.probability}</p>
                            <button class="btn btn-success mt-2" id="cekDeskripsiBtn" data-index="${data.index}">Cek Fakta</button>
                        </div>
                    </div>
                </div>
            `;

            document.getElementById("cekDeskripsiBtn").addEventListener("click", function() {
                var index = this.getAttribute("data-index");
                var rasID = indexToRasID[index];
                if (rasID) {
                    fetch('<?php echo site_url("Admin/adminc/getRasDescription/") ?>' + rasID)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success && data.description) {
                            var deskripsiElement = document.createElement("p");
                            deskripsiElement.textContent = data.description;
                            deskripsiElement.classList.add("alert", "alert-success","p-2","mt-2"); 
                            var buttonParent = this.parentElement;
                            buttonParent.appendChild(deskripsiElement);
                        } else {
                            console.error('Deskripsi ras tidak ditemukan untuk RasID: ' + rasID);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                } else {
                    console.error('RasID tidak ditemukan untuk indeks: ' + index);
                }
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    </script>
</body>

</html>
