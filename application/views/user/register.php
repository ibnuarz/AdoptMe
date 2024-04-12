<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AdoptME - Register</title>

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
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                            <img src="<?php echo base_url('assets/img/adoptme.png'); ?>" class="img-fluid" alt="Responsive image">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-success mb-4">Register Akun AdoptMe</h1>
                            </div>
                            <form class="user" action="<?php echo site_url('main/saveregisterUser'); ?>" method="post">
                                <div class="form-group">
                                    <label for="namalengkap">Nama Lengkap : </label>
                                    <input type="text" class="form-control form-control-user" id="namalengkap" name="namalengkap" value="<?php echo isset($namalengkap) ? $namalengkap : ''; ?>" required>
                                    <?php echo form_error('namalengkap', '<span class="text-danger">', '</span>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username : </label>
                                    <input type="text" class="form-control form-control-user" id="username" name="username" value="<?php echo isset($username) ? $username : ''; ?>" required>
                                    <?php echo form_error('username', '<span class="text-danger">', '</span>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email : </label>
                                    <input type="text" class="form-control form-control-user" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required>
                                    <?php echo form_error('email', '<span class="text-danger">', '</span>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="password">Password : </label>
                                        <input type="password" class="form-control form-control-user"
                                            id="passuser" name="passuser" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="passwordrepeat">Ulangi Password : </label>
                                        <input type="password" class="form-control form-control-user"
                                            id="repeatpassuser" name="repeatpassuser" placeholder="Ulangi Password">
                                            <?php echo form_error('repeatpassuser', '<span class="text-danger">', '</span>'); ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-user btn-block">Daftar Akun</button>
                                
                                <?php if ($this->session->flashdata('success_message')): ?>
                                    <div class="alert alert-secondary mt-3">
                                        <?php echo $this->session->flashdata('success_message'); ?>
                                    </div>
                                    <script>
                                        setTimeout(function() {
                                            window.location.href = "<?php echo site_url('main/login'); ?>";
                                        }, 1500);
                                    </script>
                                <?php endif; ?>
                                <a class="btn btn-outline-danger btn-user btn-block" href="<?php echo base_url('main/login')?>">Login</a>
                            </form>
                            <hr>
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