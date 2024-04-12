    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        </div>
        <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Adopsi Area Starts ***** -->
    <section class="section" id="hewan">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Riwayat Adopsi</h2>
                        <span>History dan Hewan Yang Anda Adopsi</span>
                        <h6 class="text-danger">
                            Pehatikan! Proses Verifikasi Data Hewan dan Data User akan memakan waktu maksimal 3x24 jam.<br>
                            Jika lebih dari 3x24 jam Hubungi Admin AdoptMe segera untuk mengkonfirmasi.<br>
                            <p class="text-primary">
                            <b>Jika Anda Berhasil Mengadopsi Maka Diwajibkan, Membuat Laporan Bulanan Mininal 12 Bulan Dari Tanggal Adopsi Dimulai</b> <br>
                            </p>
                            <a href="mailto:ibnuar21@students.amikom.ac.id?subject=Proses%20Verifikasi%20Adopsi%20Terlalu%20Lama&body=saya%20ingin%20melapor%20bahwa%20proses%20verifikasi%20yang%20terlalu%20lama."><i class="fas fa-solid fa-envelope"></i></a>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
        <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Riwayat Adopsi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-lg">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Hewan</th>
                                            <th>Umur (prakira)</th>
                                            <th>Jenis Hewan</th>
                                            <th>Ras Hewan</th>
                                            <th>Deskripsi Hewan</th>
                                            <th>Tanggal Mengadopsi</th>
                                            <th>Status</th>
                                            <th>Keterangan Status</th>
                                            <th>Laporan Wajib</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($riwayat_adopsi as $adopsi) : ?>
                                            <tr>
                                                <td><?php echo $adopsi->Animalname; ?></td>
                                                <td><?php echo $adopsi->Age; ?> Bulan</td>
                                                <td><?php echo $adopsi->Jenis; ?></td>
                                                <td><?php echo $adopsi->Namaras; ?></td>
                                                <td><?php echo $adopsi->Deskripsi; ?></td>
                                                <td><?php echo $adopsi->Adoptiondate; ?></td>
                                                <td>
                                                    <?php
                                                    if ($adopsi->Status == 1) {
                                                        echo '<a class="btn btn-warning text-light" readonly> Proses Verifikasi </a>';
                                                    } elseif ($adopsi->Status == 2) {
                                                        echo '<a class="btn btn-success text-light" readonly>Berhasil Adopsi</a>';
                                                    } elseif ($adopsi->Status == 3) {
                                                        echo '<a class="btn btn-danger text-light" readonly>Adopsi Ditolak</a>';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $adopsi->Keteranganstatus; ?></td>
                                                <td>
                                                    <?php
                                                    if ($adopsi->Status == 1) {
                                                        echo '<p>Tidak Valid Untuk Aksi Ini!</p>';
                                                    } elseif ($adopsi->Status == 2) {
                                                        echo '<button class="btn btn-outline-primary open-modal-laporan" data-adoptionid="' . $adopsi->AdoptionID . '">Input Laporan</button>';
                                                        echo '<br>Jumlah Laporan : ' . $adopsi->total_laporan . ' Dari 12 ';
                                                    } elseif ($adopsi->Status == 3) {
                                                        echo '<p>Tidak Valid Untuk Aksi Ini!</p>';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>

    </section>
    <!-- ***** Adopsi Area Ends ***** -->
    


    <!-- Modal Input Laporan -->
    <div class="modal fade bd-example-modal-lg" id="modalInputLaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Input Laporan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="<?php echo base_url('main/inputLaporanAdopsi'); ?>" method="post">
                <input type="hidden" id="adoption_id" name="adoption_id">

                <div class="form-group">
                    <label for="tanggal_awal">Tanggal Awal Laporan</label>
                    <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_akhir">Tanggal Akhir Laporan</label>
                    <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" required>
                </div>

                <div class="form-group">
                    <label for="isi" class="text-danger">Isi Laporan (pastikan menyampaikan semua laporan secara lengkap)</label>
                    <textarea class="form-control" id="isi" name="isi" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="urgensi">Urgensi</label>
                    <select class="form-control" id="urgensi" name="urgensi" required>
                        <option value="1">Laporan Bulanan</option>
                        <option value="2">Laporan Kendala</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Masukan Laporan</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>