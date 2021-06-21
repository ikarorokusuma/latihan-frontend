<!doctype html>
<html lang="en">

<body>
    <div class="container mt-5">
        <div class="jumbotron">
            <h3 class="display-6">Selamat Datang di Pusat Kuliner Nusantara</h3>
            <h1 class="display-8">Hai Para Penggemar Kuliner!</h1>

            <p class="lead">
                Disini, kami menyediakan berbagai macam jenis makanan, mulai dari kuliner khas Sabang hingga Merauke
            </p>
            <div class="d-flex justify-content-between mb-5 mt-5">
                <div class="card" style="width: 20rem;">
                    <img src="foto/gambar-makanan-paling-enak-sate-kambing.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Sate Ayam</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
                <div class="card" style="width: 20rem;">
                    <img src="foto/b23d61c5-3dff-44c9-ae26-1361f5a3b29f.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Pecel Lele</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
                <div class="card" style="width: 20rem;">
                    <img src="foto/images_mie_Mie_ayam_14-mie-ayam-kampung.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Mie Ayam</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mb-5 mt-5">
                <div class="card" style="width: 20rem;">
                    <img src="foto/1140357898.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Baso Spesial</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
                <div class="card" style="width: 20rem;">
                    <img src="foto/nasgorihu.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nasi Goreng</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
                <div class="card" style="width: 20rem;">
                    <img src="foto/sotoihu.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Soto Ayam</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    switch (@$_GET['menu']) {
        case 'login';
            include 'index.php';
            break;

        case 'product';
            include 'product.php';
            break;
    }
    ?>
</body>


</html>