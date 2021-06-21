<?php
class controller
{
    // fungsi untuk login
    function login($con, $tabel, $username, $password, $redirect)
    {
        $sql = "SELECT * FROM login WHERE username = '$username' and password = '$password' ";
        $jalan = mysqli_query($con, $sql);
        $cek = mysqli_num_rows($jalan);
        if ($cek == 1) {
            echo "<script>alert('Selamat Datang $username');document.location.href='$redirect'</script>";
        } else {
            echo "<script>alert('Gagal login. Cek username & password !!');document.location.href='index.php'</script>";
        }
    }

    // fungsi untuk simpan
    function simpan($con, $tabel, array $field, $redirect)
    {
        $sql = "INSERT INTO $tabel SET ";
        foreach ($field as $key => $value) {
            $sql .= " $key = '$value',";
        }
        $sql = rtrim($sql, ',');
        $jalan = mysqli_query($con, $sql);
        if ($jalan) {
            echo "<script>alert('Data tersimpan');document.location.href='$redirect'</script>";
        } else {
            echo "<script>alert('Gagal tersimpan');document.location.href='$redirect'</script>";
        }
    }

    // fungsi untuk menampilkan 
    function tampil($con, $tabel)
    {
        $sql = "SELECT * FROM $tabel";
        $jalan = mysqli_query($con, $sql);
        while ($data = mysqli_fetch_array($jalan))
            $sisi[] = $data;
        return @$sisi;
    }

    // fungsi untuk hapus
    function hapus($con, $tabel, $where, $redirect)
    {
        $sql = "DELETE FROM $tabel WHERE $where";
        $jalan = mysqli_query($con, $sql);
        if ($jalan) {
            echo "<script>alert('Berhasil dihapus');document.location.href='$redirect'</script>";
        } else {
            echo "<script>alert('Gagal dihapus');document.location.href='$redirect'</script>";
        }
    }

    // fungsi untuk edit
    function edit($con, $tabel, $where)
    {
        $sql = "SELECT * FROM $tabel WHERE $where";
        $jalan = mysqli_query($con, $sql);
        $tampung = mysqli_fetch_assoc($jalan);
        return $tampung;
    }

    // fungsi untuk ubah 
    function ubah($con, $tabel, array $field, $where, $redirect)
    {
        $sql = "UPDATE $tabel SET "; //inget dibelakang SET ada spasi
        foreach ($field as $key => $value) {
            $sql .= " $key = '$value',";
        }
        $sql = rtrim($sql, ',');
        $sql .= " WHERE $where";
        // $sql -> UPDATE login SET username='budi', password='123' WHERE id=1;

        $jalan = mysqli_query($con, $sql);

        if ($jalan) {
            echo "<script>alert('Berhasil diubah');document.location.href='$redirect'</script>";
        } else {
            echo "<script>alert('Gagal diubah');document.location.href='$redirect'</script>";
        }
    }

    // fungsi untuk upload file
    function upload($foto, $tempat)
    {
        $alamat = $foto['tmp_name'];
        $namafile = $foto['name'];
        move_uploaded_file($alamat, "$tempat/$namafile");
        return $namafile;
    }
}
