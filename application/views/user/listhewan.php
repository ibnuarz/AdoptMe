<!-- ***** Main Banner Area Start ***** -->
<div class="" id="top">
</div>
<br>
    <!-- ***** Main Banner Area End ***** -->
<!-- ***** hewan Area Starts ***** -->
<section class="section" id="hewan">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Semua Hewan</h2>
                    <span>Pilihlah Hewan Untuk Anda Adopsi</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Dropdown untuk filter jenis hewan -->
    <div class="container">
        <div class="row m-3">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="input-group">
                    <select class="custom-select" id="inputGroupSelect04">
                        <option selected>Filter Berdasarkan...</option>
                        <option value="1">Anjing</option>
                        <option value="2">Kucing</option>
                    </select>
                    <div class="input-group-append ml-2">
                        <button class="btn btn-outline-success" type="button">Cari</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
        <div class="row">
        <?php foreach ($allAnimals as $animal): ?>
                <div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="#" data-toggle="modal" data-target="#detailAnimalModal<?php echo $animal->AnimalID; ?>">Detail</a></li>
                                </ul>
                            </div>
                            <?php foreach ($animal->images as $key => $image): ?>
                                <?php if ($key === 0):?>
                                <img src="<?php echo base_url('./assets/img/post/' . $image->NamaGambar); ?>" class="img-fluid rounded img-thumbnail img-recom" alt="Gambar Hewan">
                                <?php break; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="down-content">
                            <h4><?php echo $animal->Animalname; ?></h4>
                            <span>Umur: <?php echo $animal->Age; ?> Bulan</span>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <div class="pagination">
                <ul>
                    <li>
                    <?php echo $this->pagination->create_links(); ?>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </div>
</section>
<!-- ***** hewan Area Ends ***** -->

<!-- Modal Detail Hewan -->
<?php foreach ($allAnimals as $animal) : ?>
		<div class="modal fade bd-example-modal-lg" id="detailAnimalModal<?php echo $animal->AnimalID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Detail Data Hewan</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="editAnimalForm<?php echo $animal->AnimalID; ?>" action="<?php echo site_url('Main/inputAdopsiList/' . $animal->AnimalID); ?>" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-4">
								<div class="form-group">
								<h6 class="text-danger text-center">Gambar Detail</h6>
								</div>
								<div class="form-group">
								<label for="existing_images"></label><br>
								<?php foreach ($animal->images as $images) : ?>
									<div class="image-container mb-3 text-center">
										<img src="<?php echo base_url('./assets/img/post/' . $images->NamaGambar); ?>" alt="Gambar Hewan" width="200">
									</div>
								<?php endforeach; ?>
								</div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<label for="animalname">Nama : <?php echo $animal->Animalname; ?></label>
										<input type="hidden" class="form-control" id="animalname" name="animalname" value="<?php echo $animal->Animalname; ?>">
									</div>
									<div class="form-group">
										<input type="hidden" name="animalID" value="<?php echo $animal->AnimalID; ?>">
									</div>
									<div class="form-group">
										<label for="age">Usia : <?php echo $animal->Age; ?> Bulan</label>
										<input type="hidden" class="form-control" id="age" name="age" value="<?php echo $animal->Age; ?>">
									</div>
									<div class="form-group">
										<label for="deskripsi">Deskripsi : </label>
										<textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" readonly><?php echo $animal->Deskripsi; ?></textarea>
									</div>
									<div class="form-group">
										<select class="form-control" id="status" name="status" hidden>
											<option value="1" <?php echo ($animal->Status == 1) ? 'selected' : ''; ?>>Belum Teradopsi</option>
											<option value="2" <?php echo ($animal->Status == 2) ? 'selected' : ''; ?>>Teradopsi</option>
											<option value="3" <?php echo ($animal->Status == 3) ? 'selected' : ''; ?>>Proses Adopsi</option>
										</select>
									</div>
									<div class="form-group">
										<label for="rasID">Ras Hewan : <?php echo $animal->Namaras; ?></label>
										<input type="hidden" class="form-control" value="<?php echo $animal->Namaras; ?>">
									</div>
								</div>	
							</div>
							<div class="row m-2">
								<div class="col-md-12 text-center p-2">
									<h6>Diupload Oleh : <?php echo $animal->Namalengkap; ?><b></b></h6>
								</div>
								<div class="col-md-12 text-center p-2">
									<h6>Rule Untuk Kedua Belah Pihak</h6>
								</div>
								<div class="col-md-6 text-center p-2 border border-danger"><h6>Pengaopsi</h6></div>
								<div class="col-md-6 text-center p-2 border border-danger"><h6>AdoptMe</h6></div>
								<div class="col-md-6 text-left p-2 border border-danger">
									<p>
										1. Pengadopsi diwajibkan berkomitmen jika setuju untuk mengadopsi. <br>
										2. Pengadopsi mengikuti dengan segala aturan yang ada. <br>
										3. Pengadopsi <b>wajib</b> mengisi profile dengan lengkap untuk kemudahan proses verifikasi. <br>
									</p>
								</div>
								<div class="col-md-6 text-left p-2 border border-danger">
									<p>
										1. AdoptMe wajib memverifikasi data pengadopsi tidak lebih dari 3x24 jam.<br>
										2. AdoptMe memiliki wewenang yang mutlak akan penentuan diterima atau tidaknya proses adopsi.<br>
										3. AdoptMe <b>wajib</b> memberikan surat resmi jika proses adopsi berhasil dan mengantarkan hewan ke tempat pengadopsi.<br>
									</p>
								</div>
								<div class="col-md-12 text-center border border-danger">
									<p>
										Data Adopsi Anda Akan Di Proses Oleh AdoptME Team, Diharapkan Untuk Menunggu Kabar Selanjutnya<br>
										<i class="fas fa-regular fa-heart"></i> Terimakasih! <i class="fas fa-regular fa-heart"></i>
									</p>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
								<button type="submit" class="btn btn-outline-success adopsi" <?php echo ($animal->UserID == $this->session->userdata('UserID')) ? 'disabled' : ''; ?>>Adopsi Hewan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
<?php endforeach; ?>

