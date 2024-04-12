    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Prediksi Ras Anjing</h1>
        <p class="mb-4">Upload Image dan klik tombol 'prediksi' untuk memprediksi</p>
        <p class="text-danger"><strong>Pastikan gambar jelas, Untuk mempengaruhi Akurasi dalam mendeteksi Object!</p>

        <!-- Upload Form -->
        <div class="row">
            <div class="col-md-6">
                <form id="uploadForm" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileInput" name="file">
                            <label class="custom-file-label" for="fileInput">Choose file</label>
                        </div>
                        <div class="input-group-append ml-2">
                            <button class="btn btn-primary" type="submit">Predict</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Prediction Result -->
        <div id="predictionResult" class="row" style="margin-top: 20px;">
        </div>
    </div>
    <!-- End of Main Content -->
    </div>
    <!-- End of Page Wrapper -->