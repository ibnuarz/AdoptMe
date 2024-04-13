    <div class="page-heading" id="top"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4 text-center">
                <h6 class="text-danger">Silahkan Isi Data Profile Anda Dengan Lengkap</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form action="<?php echo site_url('main/updateProfile'); ?>" method="post">
                    <div class="form-group">
                        <label for="namalengkap">Username :</label>
                        <input type="text" class="form-control" id="namalengkap" name="namalengkap" value="<?php echo $user->Username; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="namalengkap">Nama Lengkap :</label>
                        <input type="text" class="form-control" id="namalengkap" name="namalengkap" value="<?php echo $user->Namalengkap; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user->Email; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nomortlp">Nomor Telepon (Format : +628xxxxx):</label>
                        <input type="text" class="form-control" id="nomortlp" name="nomortlp" value="<?php echo $user->Nomortlp; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota :</label>
                        <select class="form-control" id="kota" name="kota" onchange="populateKecamatan()">
                            <option value="">Pilih Kota</option>
                            <option value="Jakarta Barat" <?php echo ($user->Kota == 'Jakarta Barat') ? 'selected' : ''; ?>>Jakarta Barat</option>
                            <option value="Jakarta Pusat" <?php echo ($user->Kota == 'Jakarta Pusat') ? 'selected' : ''; ?>>Jakarta Pusat</option>
                            <option value="Jakarta Selatan" <?php echo ($user->Kota == 'Jakarta Selatan') ? 'selected' : ''; ?>>Jakarta Selatan</option>
                            <option value="Jakarta Timur" <?php echo ($user->Kota == 'Jakarta Timur') ? 'selected' : ''; ?>>Jakarta Timur</option>
                            <option value="Jakarta Utara" <?php echo ($user->Kota == 'Jakarta Utara') ? 'selected' : ''; ?>>Jakarta Utara</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan :</label>
                        <select class="form-control" id="kecamatan" name="kecamatan">
                            <option value="">Pilih Kecamatan</option>
                            <?php if ($user->Kecamatan): ?>
                                <option value="<?php echo $user->Kecamatan; ?>" selected><?php echo $user->Kecamatan; ?></option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamatfull">Alamat Lengkap :</label>
                        <textarea class="form-control" id="alamatfull" name="alamatfull" rows="4" required><?php echo $user->Alamatfull; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profil</button>
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <script>
    function populateKecamatan() {
        var kota = document.getElementById("kota").value;
        var kecamatanSelect = document.getElementById("kecamatan");
        kecamatanSelect.innerHTML = "";
        
        var kecamatanOptions = {};
        kecamatanOptions["Jakarta Barat"] = ["Cengkareng", "Grogol Petamburan", "Taman Sari", "Tambora", "Kebon Jeruk", "Kalideres", "Palmerah", "Kembangan"];
        kecamatanOptions["Jakarta Pusat"] = ["Cempaka Putih", "Gambir", "Johar Baru", "Kemayoran", "Menteng", "Sawah Besar", "Senen", "Tanah Abang"];
        kecamatanOptions["Jakarta Selatan"] = ["Cilandak", "Jagakarsa", "Kebayoran Baru", "Kebayoran Lama", "Mampang Prapatan", "Pancoran", "Pasar Minggu", "Pesenggrahan", "Setia Budi", "Tebet"];
        kecamatanOptions["Jakarta Timur"] = ["Cakung", "Cipayung", "Ciracas", "Duren Sawit", "Jatinegara", "Kramat Jati", "Makasar", "Matraman", "Pasar Rebo", "Pulo Gading"];
        kecamatanOptions["Jakarta Utara"] = ["Kamal Muara", "Kapuk Muara", "Pejagalan", "Penjaringan", "Pluit"];

        var kecamatanArray = kecamatanOptions[kota];
        for (var i = 0; i < kecamatanArray.length; i++) {
            var option = document.createElement("option");
            option.text = kecamatanArray[i];
            option.value = kecamatanArray[i];
            kecamatanSelect.add(option);
        }
    }
    </script>