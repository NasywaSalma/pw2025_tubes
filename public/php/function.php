<?php
function koneksi()
{
    $conn = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_243040033'); //connect ke databse
    return $conn;
}

function query($query)
{
    $conn = koneksi();
    $result = mysqli_query($conn, $query); //query ke tabel mahasiswa

    //ubah datanya kedalam array
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
    }

    return $rows;
}

//tambah produk
function tambah_produk($data)
{
    $conn = koneksi();
    $id = $data['id'];
    $name = htmlspecialchars($data['name']);
    $year = htmlspecialchars($data['year']);
    $price = htmlspecialchars($data['price']);
    $transmission = htmlspecialchars($data['transmission']);
    $fuel_type = htmlspecialchars($data['fuel_type']);
 
    $rate = htmlspecialchars($data['rate']);
    $img = upload();

    if (!$img) {
        return false;
    }

    $query = "UPDATE cars 
                SET 
                    name = '$name',
                    year = '$year',
                    price = '$price',
                    transmission = '$transmission',
                    fuel_type = '$fuel_type',
                   
                    rate = '$rate',
                    img = '$img'
                WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//function untuk mengupload gambar

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    //cek jika ukuran terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
              </script>";
        return false;
    }

    //lolos pengecekan, gambar siap diupload
    //generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../../../img/' . $namaFileBaru);

    return $namaFileBaru;
}

//function untuk menghapus cars

function hapus_menu($id) {
     $conn = koneksi();
    $query = "DELETE FROM cars WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}