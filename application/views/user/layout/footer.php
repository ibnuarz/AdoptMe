
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="<?php echo base_url('assets/img/adoptmelogo.png')?>" alt="hexashop ecommerce templatemo">
                        </div>
                        <ul>
                            <li><a href="#">Daerah Khusus Jakarta</a></li>
                            <li><a href="#">AdoptMe@company.com</a></li>
                            <li><a href="#">+62893232990</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Kategori Hewan</h4>
                    <ul>
                        <li><a href="#anjing">Anjing</a></li>
                        <li><a href="#kucing">Kucing</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Link Yang Berguna</h4>
                    <ul>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Costumer Care Area</h4>
                    <ul>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">FAQ's</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> AdoptMe Co., Ltd. All Rights Reserved. 
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="exampleModalLabel">LOGOUT</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-success">Yakin Untuk Logout Dari AdoptMe ?</h5>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-success" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-outline-danger" href="<?php echo base_url('Main/logout')?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/user/js/popper.js')?>"></script>
<script src="<?php echo base_url('assets/user/js/bootstrap.min.js')?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    $(document).on("click", ".open-modal-laporan", function () {
        var adoptionID = $(this).data('adoptionid');
        $("#adoption_id").val(adoptionID);
        $('#modalInputLaporan').modal('show');
    });
});

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
    
    $(document).ready(function(){
        $('.adopsi').click(function(e){
            e.preventDefault();
            var form = $(this).closest('form');
            Swal.fire({
                title: 'Apakah Anda yakin ingin mengadopsi hewan ini?',
                text: "Tindakan ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, saya yakin!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>


<!-- Plugins -->
<script src="<?php echo base_url('assets/user/js/owl-carousel.js')?>"></script>
<script src="<?php echo base_url('assets/user/js/scrollreveal.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/demo/datatables-demo.js')?>"></script>
<script src="<?php echo base_url('assets/user/js/custom.js')?>"></script>
<script>
    $(function () {
        var selectedClass = "";
        $("p").click(function () {
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("." + selectedClass).fadeOut();
            setTimeout(function () {
                $("." + selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
            }, 500);

        });
    });
    
</script>

</body>

</html>