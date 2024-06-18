
<div class="page-heading" id="top">
</div>
    <div class="container-fluid">


        <div class="row m-3">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <h1 class="h3 mb-2 text-gray-800">Prediksi Ras Anjing</h1>
                <p class="mb-4">Upload Gambar dan klik tombol 'Predict' untuk memprediksi</p>
                <p class="mb-4 text-danger">
                    Untuk Pertama Kali tunggu Hasil kisaran 10 - 50 detik, Jika Setelah Diklik 'Predict' tidak muncul hasil klik tombol kembali.<br>
                    Jika Masih belum bisa upload gambar kembali dan klik tombol kembali.<br>
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
    0: 101,
    1: 102,
    2: 103,
    3: 104,
    4: 105,
    5: 106,
    6: 107,
    7: 108,
    8: 109,
    9: 110,
    10: 111,
    11: 112,
    12: 113,
    13: 114,
    14: 115,
    15: 116,
    16: 117,
    17: 118,
    18: 119,
    19: 120,
    20: 121,
    21: 122,
    22: 123,
    23: 124,
    24: 125,
    25: 126,
    26: 127,
    27: 128,
    28: 129,
    29: 130,
    30: 131,
    31: 132,
    32: 133,
    33: 134,
    34: 135,
    35: 136,
    36: 137,
    37: 138,
    38: 139,
    39: 140,
    40: 141,
    41: 142,
    42: 143,
    43: 144,
    44: 145,
    45: 146,
    46: 147,
    47: 148,
    48: 149,
    49: 150,
    50: 151,
    51: 152,
    52: 153,
    53: 154,
    54: 155,
    55: 156,
    56: 157,
    57: 158,
    58: 159,
    59: 160,
    60: 161,
    61: 162,
    62: 163,
    63: 164,
    64: 165,
    65: 166,
    66: 167,
    67: 168,
    68: 169,
    69: 170
    };

    document.getElementById("uploadForm").addEventListener("submit", function(event) {
        event.preventDefault();
        var formData = new FormData(this);

        fetch('https://predictdog-jw2zdtsf7a-et.a.run.app', {
            method: 'POST',
            body: formData,
            timeout: 10000 
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