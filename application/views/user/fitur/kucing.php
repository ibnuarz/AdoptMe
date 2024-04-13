
<div class="page-heading" id="top">
    </div>
    <div class="container-fluid">


        <div class="row m-3">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <h1 class="h3 mb-2 text-gray-800">Prediksi Ras Kucing</h1>
                <p class="mb-4">Upload Gambar dan klik tombol 'prediksi' untuk memprediksi</p>
                <p class="mb-4 text-danger">
                    Jika Diklik 'prediksi' tidak muncul hasil tunggu kisaran 10 - 50 detik, lalu klik tombol kembali<br>
                    Jika Masih belum bisa upload gambar kembali dan klik tombol kembali<br>
                </p>
                <p class="text-danger"><strong>Pastikan gambar jelas, Untuk mempengaruhi Akurasi dalam mendeteksi Object!</p>
            </div>
            <div class="col-lg-4"></div>
        </div>
        <!-- Upload Form -->
        <div class="row m-3">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <form id="uploadForm" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileInput" name="file">
                            <label class="custom-file-label" for="fileInput">Choose file</label>
                        </div>
                        <div class="input-group-append ml-2">
                            <button class="btn btn-outline-success" type="submit">Predict</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4"></div>
        </div>

        <!-- Prediction Result -->
        <div id="predictionResult" class="row" style="margin-top: 20px;">
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
            <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Hasil Deteksi Ras
                        </div>
                        <div class="card-body">
                            <h6 class="text-danger">Hasil Tidak Akurat?, Laporkan Dimenu Kontak Kami (sertakan screenshoot)</a></h6>
                            <br>
                            <p><strong>Gambar :</strong></p>
                            <img src="${URL.createObjectURL(formData.get('file'))}" class="img-thumbnail" style="max-width: 100%;" alt="Uploaded Image">
                            <p><strong>Ras Terdeteksi Sebagai :</strong> ${data.label}</p>
                            <p><strong>Akurasi :</strong> ${(data.probability * 100).toFixed(2)}%</p>
                            <button class="btn btn-outline-success mt-2" id="cekDeskripsiBtn" data-index="${data.index}">Cek Fakta</button>
                        </div>
                    </div>
                </div>
            <div class="col-md-4"></div>
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