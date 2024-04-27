    <!-- ***** Main Banner Area Start ***** -->
	<br>
	<br>
	<br>
	<div class="" id="top">
</div>
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row" style="background-color:#31C48D!important;">
                <div class="col-md-4">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4 style="color:#fff!important;">AdoptME</h4>
                                <span>Your Home, My Home</span>
                                <div class="main-border-button">
                                    <a href="<?php echo base_url('Main/listHewan/1') ?>">Adopsi Kami Sekarang</a>
                                </div>
                            </div>
                            <img src="<?php echo base_url('assets/img/banner/dog.png');?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4 style="color:#fff!important;">AdoptME</h4>
                                <span>Your Home, My Home</span>
                                <div class="main-border-button">
                                    <a href="<?php echo base_url('Main/listHewan/1') ?>">Adopsi Kami Sekarang</a>
                                </div>
                            </div>
                            <img src="<?php echo base_url('assets/img/about/pet_care.png')?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4 style="color:#fff!important;">AdoptME</h4>
                                <span>Your Home, My Home</span>
                                <div class="main-border-button">
                                    <a href="<?php echo base_url('Main/listHewan/1') ?>">Adopsi Kami Sekarang</a>
                                </div>
                            </div>
                            <img src="<?php echo base_url('assets/img/banner/dog.png');?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


	<!-- Anjing Section -->
	<section class="section" id="anjing">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-heading">
						<h2>Anjing</h2>
						<span>Rekomendasi Anjing Yang Bisa Anda Adopsi</span>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="women-item-carousel">
						<div class="owl-women-item owl-carousel">
							<?php foreach ($dogs as $dog): ?>
								<div class="item">
									<div class="thumb">
										<div class="hover-content">
											<ul>
												<li><a href="#" data-toggle="modal" data-target="#detailAnimalModalAnjing<?php echo $dog->AnimalID; ?>">Detail</a></li>
											</ul>
										</div>
										<?php foreach ($dog->images as $image): ?>
											<img src="<?php echo base_url('./Assets/img/post/' . $image->NamaGambar) ?>" class="img-fluid rounded img-thumbnail img-recom" alt="Dog Image">
											<?php break; ?>
										<?php endforeach; ?>
									</div>
									<div class="down-content">
										<h4><?php echo $dog->Animalname; ?></h4>
										<span>Umur: <?php echo $dog->Age; ?> Bulan</span>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Add Animal Modal -->
	<?php foreach ($dogs as $dog) : ?>
		<div class="modal fade bd-example-modal-lg" id="detailAnimalModalAnjing<?php echo $dog->AnimalID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Detail Data Hewan</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="detailAnimalModalAnjing<?php echo $dog->AnimalID; ?>" action="<?php echo base_url('Main/inputAdopsi/' . $dog->AnimalID); ?>" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-4">
								<div class="form-group">
								<h6 class="text-danger text-left">Gambar Detail</h6>
								</div>
								<div class="form-group">
								<label for="existing_images"></label><br>
								<?php foreach ($dog->images as $images) : ?>
									<div class="image-container mb-3">
										<img src="<?php echo base_url('./assets/img/post/' . $images->NamaGambar); ?>" alt="Gambar Hewan" width="200">
									</div>
								<?php endforeach; ?>
								</div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<label for="animalname">Nama Hewan : <?php echo $dog->Animalname; ?></label>
										<input type="hidden" class="form-control" id="animalname" name="animalname" value="<?php echo $dog->Animalname; ?>">
									</div>
									<div class="form-group">
										<input type="hidden" name="animalID" value="<?php echo $dog->AnimalID; ?>">
									</div>
									<div class="form-group">
										<label for="age">Usia : <?php echo $dog->Age; ?> Bulan</label>
										<input type="hidden" class="form-control" id="age" name="age" value="<?php echo $dog->Age; ?>">
									</div>
									<div class="form-group">
										<label for="deskripsi">Deskripsi : </label>
										<textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" readonly><?php echo $dog->Deskripsi; ?></textarea>
									</div>
									<div class="form-group">
										<select class="form-control" id="status" name="status" hidden>
											<option value="1" <?php echo ($dog->Status == 1) ? 'selected' : ''; ?>>Belum Teradopsi</option>
											<option value="2" <?php echo ($dog->Status == 2) ? 'selected' : ''; ?>>Teradopsi</option>
											<option value="3" <?php echo ($dog->Status == 3) ? 'selected' : ''; ?>>Proses Adopsi</option>
										</select>
									</div>
									<div class="form-group">
										<label for="rasID">Ras Hewan : <?php echo $dog->Namaras; ?></label>
										<input type="hidden" class="form-control" value="<?php echo $dog->Namaras; ?>">
									</div>
								</div>	
							</div>
							<div class="row m-2">
								<div class="col-md-12 text-center p-2">
									<h6>Diupload Oleh : <?php echo $dog->Namalengkap; ?><b></b></h6>
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
								<button type="submit" class="btn btn-outline-success adopsi" id="btnAdopsiAnjing<?php echo $dog->AnimalID; ?>" <?php echo ($dog->UserID == $this->session->userdata('UserID')) ? 'disabled' : ''; ?>>Adopsi Hewan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>

	<!-- Kucing Section -->
	<section class="section" id="kucing">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-heading">
						<h2>Kucing</h2>
						<span>Rekomendasi Kucing Yang Bisa Anda Adopsi</span>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="women-item-carousel">
						<div class="owl-women-item owl-carousel">
							<?php foreach ($cats as $cat): ?>
								<div class="item">
									<div class="thumb">
										<div class="hover-content">
											<ul>
											<li><a href="#" data-toggle="modal" data-target="#detailAnimalModalKucing<?php echo $cat->AnimalID; ?>">Detail</a></li>
											</ul>
										</div>
										<?php foreach ($cat->images as $image): ?>
											<img src="<?php echo base_url('./Assets/img/post/' . $image->NamaGambar) ?>" class="img-fluid rounded img-thumbnail img-recom" alt="Cat Image">
											<?php break; ?>
										<?php endforeach; ?>
									</div>
									<div class="down-content">
										<h4><?php echo $cat->Animalname; ?></h4>
										<span>Umur: <?php echo $cat->Age; ?> Bulan</span>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

		<!-- Add Animal Modal -->
		<?php foreach ($cats as $cat) : ?>
		<div class="modal fade bd-example-modal-lg" id="detailAnimalModalKucing<?php echo $cat->AnimalID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Detail Data Hewan</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="editAnimalForm<?php echo $cat->AnimalID; ?>" action="<?php echo site_url('Main/inputAdopsi/' . $cat->AnimalID); ?>" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-4">
								<div class="form-group">
								<h6 class="text-danger text-center">Gambar Detail</h6>
								</div>
								<div class="form-group">
								<label for="existing_images"></label><br>
								<?php foreach ($cat->images as $images) : ?>
									<div class="image-container mb-3 text-center">
										<img src="<?php echo base_url('./assets/img/post/' . $images->NamaGambar); ?>" alt="Gambar Hewan" width="200">
									</div>
								<?php endforeach; ?>
								</div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<label for="animalname">Nama Hewan : <?php echo $cat->Animalname; ?></label>
										<input type="hidden" class="form-control" id="animalname" name="animalname" value="<?php echo $cat->Animalname; ?>">
									</div>
									<div class="form-group">
										<input type="hidden" name="animalID" value="<?php echo $cat->AnimalID; ?>">
									</div>
									<div class="form-group">
										<label for="age">Usia : <?php echo $cat->Age; ?> Bulan</label>
										<input type="hidden" class="form-control" id="age" name="age" value="<?php echo $cat->Age; ?>">
									</div>
									<div class="form-group">
										<label for="deskripsi">Deskripsi : </label>
										<textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" readonly><?php echo $cat->Deskripsi; ?></textarea>
									</div>
									<div class="form-group">
										<select class="form-control" id="status" name="status" hidden>
											<option value="1" <?php echo ($cat->Status == 1) ? 'selected' : ''; ?>>Belum Teradopsi</option>
											<option value="2" <?php echo ($cat->Status == 2) ? 'selected' : ''; ?>>Teradopsi</option>
											<option value="3" <?php echo ($cat->Status == 3) ? 'selected' : ''; ?>>Proses Adopsi</option>
										</select>
									</div>
									<div class="form-group">
										<label for="rasID">Ras Hewan : <?php echo $cat->Namaras; ?></label>
										<input type="hidden" class="form-control" value="<?php echo $cat->Namaras; ?>">
									</div>
								</div>	
							</div>
							<div class="row m-2">
								<div class="col-md-12 text-center p-2">
									<h6>Diupload Oleh : <?php echo $cat->Namalengkap; ?><b></b></h6>
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
								<button type="submit" class="btn btn-outline-success adopsi" id="btnAdopsiKucing<?php echo $cat->AnimalID; ?>" <?php echo ($cat->UserID == $this->session->userdata('UserID')) ? 'disabled' : ''; ?>>Adopsi Hewan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>


    <!-- ***** Explore Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>AdoptMe</h2>
                        <span>
                            Dengan Mengadopsi Mereka Bantuan anda sangat berarti untuk hewan-hewan ini karena dengan memberikan mereka kenyamanan, keamanan, dan rumah yang baik bagi mereka.
                        </span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i><p>"Jika memiliki jiwa berarti bisa merasakan cinta dan kesetiaan dan rasa syukur, maka hewan lebih baik daripada kebanyakan manusia." - James Herriot</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="leather">
                                </div>
                            </div>
                            <div class="col-lg-6">
								<div class="leather">
                                </div>
                            </div>
                            <div class="col-lg-6">
								<div class="leather">
                                </div>
                            </div>
                            <div class="col-lg-6">
								<div class="leather">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Explore Area Ends ***** -->


    
