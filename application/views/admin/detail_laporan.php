<div class="container-fluid">
    <a href="<?php echo base_url('Admin/adminc/laporanBulanan');?>" class="btn btn-success text-white mb-2">Kembali</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Detail Laporan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>LaporanID</th>
                            <th>AdoptionID</th>
                            <th>Tanggalawal</th>
                            <th>Tanggalakhir</th>
                            <th>Isi</th>
                            <th>Urgensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detail_laporan as $laporan): ?>
                            <tr>
                                <td><?php echo $laporan->LaporanID; ?></td>
                                <td><?php echo $laporan->AdoptionID; ?></td>
                                <td><?php echo $laporan->Tanggalawal; ?></td>
                                <td><?php echo $laporan->Tanggalakhir; ?></td>
                                <td><?php echo $laporan->Isi; ?></td>
                                <td>
                                    <?php
                                        if ($laporan->Urgensi == 1) {
                                            echo '<a class="btn btn-success text-light" readonly>Biasa</a>';
                                        } else {
                                            echo '<a class="btn btn-danger text-light" readonly>Masalah</a>';
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