<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Post</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Hapus Post</h1>
        <form method="POST" action="" class="satu">
            <div class="form-group">
                <label for="postId">Masukkan ID yang ingin dihapus:</label>
                <input type="number" class="form-control" id="postId" name="postId" required>
            </div>
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>

        <?php
        // Cek jika form telah disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil ID post dari form
            $postId = intval($_POST['postId']);

            // URL API dengan ID post yang ingin dihapus
            $url = 'http://jsonplaceholder.typicode.com/posts/' . $postId;

            // Inisialisasi cURL
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Eksekusi cURL dan ambil hasilnya
            $response = curl_exec($ch);

            // Cek status HTTP
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            // Tampilkan respon dari API
            if ($httpCode === 200 || $httpCode === 204) {
                echo "<div>Post dengan ID $postId berhasil dihapus.</div>";
            } else {
                echo "<div>Gagal menghapus post dengan ID $postId. Kode respons: $httpCode</div>";
            }
        }
        ?>
    </div>
</body>
</html>
