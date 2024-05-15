<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance_log";

$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Kullanıcı bilgilerini al
$name = $_POST['name'];
$phone = $_POST['phone'];

// Alanların boş olup olmadığını kontrol et
if (empty($name) || empty($phone)) {
    echo "Ad veya telefon numarası boş olamaz.";
} else {
    // Aynı ad-soyad ve telefon numarasına sahip kayıt var mı kontrol et
    $sql_check = "SELECT * FROM attendance_log WHERE name = '$name' AND phone = '$phone'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "Bu ad-soyad ve telefon numarası ile zaten bir kayıt bulunmaktadır.";
    } else {
        // Yeni kullanıcıyı veritabanına ekle
        $sql_insert = "INSERT INTO attendance_log (name, phone) VALUES ('$name', '$phone')";
        if ($conn->query($sql_insert) === TRUE) {
            echo "Kullanıcı başarıyla kaydedildi.";
        } else {
            echo "Hata: " . $sql_insert . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
