<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/loginPage.css') ?>">
</head>

<body>
    <!-- Container -->
    <div class="container">
        <div class="margin-auto-flexbox">
            <!-- Konten kotak -->
            <div class="kotak p-3 rounded bg-white" style="overflow:hidden;">
                <div class="row">
                    <div class=" text-center col col-sm-12 col-md-12 col-xl-6 border-md-bottom border-end border-primary">
                        <!-- Logo login -->
                        <img class="img-fluid" src="<?= base_url('assets/img/logo-resto.png') ?>" alt="logo-bansal" style="width: 100%; height:100%;">
                    </div>
                    <div class="col col-md-12 col-xl-6 mt-3">
                        <div class="text-login text-center fw-bold ">
                            LOGIN
                        </div>
                        <?php if (session()->getFlashdata('message')) : ?>
                            <div class="warn">
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata('message') ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <!-- form -->
                        <form method="post" action="<?= base_url('login/submit') ?>">
                            <div class="input-group <?php if (session()->getFlashdata('message')) {
                                                        echo 'mt-1';
                                                    } else {
                                                        echo 'mt-5';
                                                    } ?>">
                                <span class="input-group" id="username">Email</span>
                                <!-- Form input id -->
                                <input name="user_email" type="email" class="form-control" placeholder="email" aria-label="Username" aria-describedby="username">
                            </div>
                            <div class="input-group mt-2">
                                <span class="input-group" id="username">Password</span>
                                <!-- inpus password -->
                                <input name="user_pass" type="text" class="form-control" placeholder="password" aria-label="Username" aria-describedby="username">
                            </div>
                            <!-- buat akun & reset -->
                            <div class="reset-pass text-end">
                                <div class="row">
                                    <div class="col-6 text-start">
                                        <a class="text-decoration-none" href="<?= base_url('regis') ?>" style="font-size: 13px;">Buat Akun</a>
                                    </div>
                                    <div class="col-6">
                                        <a class="text-decoration-none" href="" onclick="alert('coming soon')" style="font-size: 13px;">Reset Password</a>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mt-2">
                                <!-- Tombol Login -->
                                <button type="submit" class="btn btn-primary w-100 rounded">LOGIN</button>
                            </div>
                        </form>
                        <!-- EndForm -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- EndContainer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>