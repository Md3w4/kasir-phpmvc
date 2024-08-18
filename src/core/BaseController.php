<?php

class BaseController extends Filter
{
    public function view($view, $data = [])
    {
        if (count($data)) {
            extract($data);
        }
        require_once '../src/views/' . $view . '.view.php';
    }

    public function redirect($url)
    {
        header('Location: ' . BASEURL . '/' . $url);
        exit;
    }

    public function model($model)
    {
        require_once '../src/models/' . $model . '.php';
        return new $model;
    }

    protected function urlIs($url)
    {
        return $_SERVER['REQUEST_URI'] === $url;
    }

    protected function dd($value)
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
    }

    public function upload()
    {
        $file = $_FILES['gambar'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        // Pisahkan nama file dan ekstensinya
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        // Ekstensi file yang diperbolehkan
        $allowed = ['jpg', 'jpeg', 'png'];

        // Cek apakah ekstensi file diizinkan
        if (in_array($fileActualExt, $allowed)) {
            // Cek apakah ada error saat upload
            if ($fileError === 0) {
                // Cek apakah ukuran file tidak melebihi batas yang ditentukan
                if ($fileSize < 1000000) { // 1MB
                    // Beri nama baru yang unik pada file
                    $fileNameNew = uniqid('', true) . '.' . $fileActualExt;
                    $fileDestination = BASEURL . "/public/images/barang/" . $fileNameNew;

                    // Pindahkan file ke folder tujuan
                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        // Jika berhasil, Anda bisa mengembalikan nama file baru atau path lengkapnya
                        return $fileNameNew;
                    } else {
                        // Jika terjadi kesalahan saat memindahkan file
                        echo "<script>alert('Terjadi kesalahan saat mengupload file');</script>";
                        return false;
                    }
                } else {
                    // Jika ukuran file terlalu besar
                    echo "<script>alert('Ukuran file terlalu besar. Maksimal 1MB');</script>";
                    return false;
                }
            } else {
                // Jika terjadi error pada file saat diupload
                echo "<script>alert('Terjadi kesalahan saat mengupload file');</script>";
                return false;
            }
        } else {
            // Jika ekstensi file tidak diizinkan
            echo "<script>alert('Format file tidak diizinkan. Hanya jpg, jpeg, png, dan pdf yang diizinkan');</script>";
            return false;
        }
    }
}
