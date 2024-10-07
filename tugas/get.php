<?php

// URL API publik
$url = 'http://jsonplaceholder.typicode.com/posts';
$ch = curl_init();

// Set opsi cURL untuk mengambil URL dengan metode GET
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);

$limited_data = array_slice($data, 0, 5); // Mengambil 5 data pertama
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menampilkan 5 Data</title>
</head>
<body>
    <h1 style="text-align: center; color: blue;">DATA POST PLACEHOLDER </h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr style="background-color: blue; color: white;">
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($limited_data as $post) {
                echo "<tr>";
                echo "<td>" . $post['id'] . "</td>";
                echo "<td>" . $post['title'] . "</td>";
                echo "<td>" . $post['body'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
