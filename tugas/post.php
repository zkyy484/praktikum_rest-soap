<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Post Baru</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container mt-5">
        <div class="form-container">
            <h1>Kirim Post Baru</h1>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="title">Judul:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul" required>
                </div>

                <div class="form-group">
                    <label for="body">Konten:</label>
                    <textarea class="form-control" id="body" name="body" rows="5" placeholder="Tulis konten di sini" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Kirim</button>
            </form>

            <?php
            // Cek jika form telah disubmit
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Ambil data dari form
                $title = $_POST['title'];
                $body = $_POST['body'];

                // Data yang akan dikirim dalam format JSON
                $postData = json_encode([
                    'title' => $title,
                    'body' => $body,
                    'userId' => 1,
                ]);

                // URL API
                $url = 'http://jsonplaceholder.typicode.com/posts';

                // Inisialisasi cURL
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($postData),
                ]);

                // Eksekusi cURL dan ambil hasilnya
                $response = curl_exec($ch);
                curl_close($ch);

                // Tampilkan respon dari API
                echo "<div class='mt-4'><h5>Respon dari API:</h5><pre>" . htmlspecialchars($response) . "</pre></div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
