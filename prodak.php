<!DOCTYPE html>
<html lang="en">

<?php
include "config/koneksi.php";
include "library/controller.php";
include "layout/layout.php";

$go = new controller();
$tanggal = date('y-m-d');
$tabel = "product";
$redirect = "prodak.php";
@$where = "productID =$_GET[id]";
@$tempat = "foto";

if (isset($_POST['simpan'])) {
    $foto = $_FILES['foto'];
    $upload = $go->upload($foto, $tempat);
    $field = array(
        'nama' => $_POST['product'],
        'jenisID' => $_POST['jenis'],
        'foto' => $upload,
        'tglinput' => $tanggal,
        'ket' => $_POST['ket']
    );
    $go->simpan($con, $tabel, $field, $redirect);
}


if (isset($_GET['hapus'])) {
    $go->hapus($con, $tabel, $where, $redirect);
}

if (isset($_GET['edit'])) {
    $sql = "SELECT product .*, jenis FROM product
            INNER JOIN jenis on product.jenisID = jenis.jenisID
            WHERE $where";
    $jalan = mysqli_query($con, $sql);
    $edit = mysqli_fetch_assoc($jalan);
}

if (isset($_POST['ubah'])) {
    $foto = $_FILES['foto'];
    $upload = $go->upload($foto, $tempat);
    if (empty($_FILES['foto']['name'])) {
        $field = array(
            'nama' => $_POST['product'],
            'jenisID' => $_POST['jenis'],
            'tglinput' => $tanggal,
            'ket' => $_POST['ket']
        );
        $go->ubah($con, $tabel, $field, $where, $redirect);
    } else {
        $field = array(
            'nama' => $_POST['product'],
            'jenisID' => $_POST['jenis'],
            'foto' => $upload,
            'tglinput' => $tanggal,
            'ket' => $_POST['ket']
        );
        $go->ubah($con, $tabel, $field, $where, $redirect);
    }
}
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
    <div class="container ml-8">
        <form method="post" enctype="multipart/form-data">
            <table align="center">
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label me-2">Nama Makanan : </label>
                    <div class="col-sm-10">
                        <input type="text" name="product" value="<?php echo @$edit['nama'] ?>" required>
                    </div>
                </div>
                <label class="col-sm-1 col-form-label me-2">Jenis</label>
                <select class="form-select" name="jenis" aria-label="Default select example" required>
                    <option value="<?php echo $edit['jenisID'] ?>"><?php echo @$edit['jenis'] ?>
                    </option>
                    <?php
                    $jenis = $go->tampil($con, "jenis");
                    foreach ($jenis as $r) {
                    ?>
                        <option value="<?php echo $r['jenisID'] ?>"><?php echo $r['jenis'] ?></option>
                    <?php } ?>
                </select>
                <div class="mb-3 mt-3">
                    <label for="formFile" class="form-label">Gambar Makanan</label>
                    <input class="form-control" type="file" name="foto" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                    <textarea class="form-control" name="ket" rows="3" <?php echo @$edit['ket'] ?>></textarea>
                </div>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <?php if (@$_GET['id'] == "") { ?>
                            <input type="submit" name="simpan" value="SIMPAN">
                        <?php } else { ?>
                            <input type="submit" name="ubah" value="UBAH">
                        <?php } ?>
                    </td>
                </tr>
            </table>
        </form>
        <table align="center" border="1" class="mt-4 table table-dark table-hover">
            <tr>
                <th>No</th>
                <th>Menu</th>
                <th>Gambar</th>
                <th>Tanggal Sedia</th>
                <th>Keterangan</th>
                <th colspan="2">Aksi</th>
            </tr>

            <?php
            $no = 0;
            $sql = "SELECT product .*, jenis FROM product
            INNER JOIN jenis on product.jenisID = jenis.jenisID";
            $jalan = mysqli_query($con, $sql);
            while ($r = mysqli_fetch_assoc($jalan)) {
                $no++
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $r['nama'] ?></td>
                    <td><img src="foto/<?php echo $r['foto'] ?>" width="50" height="50"></td>
                    <td><?php echo $r['tglInput'] ?></td>
                    <td><?php echo $r['ket'] ?></td>
                    <td>
                        <a href="?menu=product&hapus&id=<?php echo $r['productID'] ?>" onclick="return confirm('Hapus Data?')">Hapus</a>
                        <a href="?menu=product&edit&id=<?php echo $r['productID'] ?>">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>