<div class="page-heading" id="top">
    </div>
    <!-- ***** Contact Area Starts ***** -->
    <div class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d156171.44109389398!2d106.74711695128292!3d-6.2295694529599235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e1!3m2!1sid!2sid!4v1712943125031!5m2!1sid!2sid" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h6> Halo Silahkan Kirim Pesan / Laporan Kepada AdoptME </h6>
                        <span>Kirim Saran dan Kritik serta Bug/Error di Form Ini yaa</span>
                    </div>
                    <form id="contact" action="<?php echo base_url('Main/kirimLaporan'); ?>" method="post" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <label>Isi Laporan Anda : </label>
                            <fieldset>
                                <textarea class="form-control" id="isi_laporan" name="isi_laporan" rows="5" required></textarea>
                            </fieldset>
                        </div>
                        <br>
                        <div class="col-lg-12">
                            <label>Bukti (dalam bentuk screenshoot)</label>
                            <fieldset>
                            <input type="file" id="gambar_laporan" name="gambar_laporan" accept="image/*" required>
                            </fieldset>
                        </div>
                        <br>
                        <div class="col-lg-12">
                            <label>Jenis Laporan Anda (wajib pilih): </label>
                            <fieldset>
                                <select class="form-control" id="jenis_laporan" name="jenis_laporan" required>
                                    <option value="">Pilih Jenis Laporan</option>
                                    <option value="1">Bug/Error</option>
                                    <option value="2">Saran dan Kritik</option>
                                    <option value="3">Fitur Deteksi Ras</option>
                                    <option value="4">Lainnya</option>
                                </select>
                            </fieldset>
                        </div>
                        <br>
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>
                            </fieldset>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- ***** Contact Area Ends ***** -->