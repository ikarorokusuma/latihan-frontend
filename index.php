<!doctype html>
<html lang="en">

<?php
include "layout/layout.php";
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Food Court</title>
</head>

<body>
    <?php
    switch (@$_GET['menu']) {
        case 'login';
            include 'index.php';
            break;
        case 'beranda';
            include 'dashboard.php';
            break;
        case 'product';
            include 'product.php';
            break;
    }
    ?>

    <?php
    include "config/koneksi.php";
    include "library/controller.php";
    $tabel = "login";

    $go = new controller();

    @$username = $_POST['user'];
    @$password = base64_encode($_POST['pass']);
    $redirect = "dashboard.php";

    if (isset($_POST['login'])) {
        $go->login($con, $tabel, $username, $password, $redirect);
    }

    ?>
    <div class="w-auto p-5 bg-dark">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="card border-secondary mb-5 mt-5 ms-5 me-5" style="max-width: 24rem;">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <h5 class="card-title">Masukkan Akun</h5>
                        <form action="" class="mb-5" method="POST">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Username</label>
                                <input type="text" name="user" class="form-control" id="exampleFormControlInput1" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input type="password" name="pass" class="form-control" id="exampleFormControlInput1" required>
                            </div>
                            <button class="btn btn-outline-success" type="submit" name="login" value="LOGIN">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>