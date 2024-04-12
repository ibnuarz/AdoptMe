<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AdoptME - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container pt-5">
        <br>
        <br>
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                            <img src="<?php echo base_url('assets/img/adoptme.png'); ?>" class="img-fluid" alt="Responsive image">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-success mb-4">Login AdoptMe</h1>
                                    </div>
                                    <form class="user" action="<?php echo site_url('main/processLogin'); ?>" method="post">
                                        <div class="text-danger p-3">
                                            <a href="<?php echo base_url() ?>" style="text-decoration:none;" class="text-danger"><small><?php echo $this->session->flashdata('error_message_paket'); ?></small></a>
                                        </div>
                                        <?php if ($this->session->flashdata('error_message')): ?>
                                        <div class="alert alert-danger mt-2 text-center">
                                        <?php echo $this->session->flashdata('error_message'); ?>
                                        </div>
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <label for="username">Username : </label>
                                            <input type="text" class="form-control form-control-user" id="usernameuser" name="usernameuser" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password : </label>
                                            <input type="password" class="form-control form-control-user" id="passuser" name="passuser" required>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block">Login</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('main/register')?>">Buat Akun</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

</body>

</html>