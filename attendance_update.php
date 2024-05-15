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

// Yoklama durumu güncelleme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $attendance_status = $_POST['attendance_status'];

    // Yoklama durumunu güncelle
    $sql_update = "UPDATE attendance_log SET attendance_status = '$attendance_status' WHERE id = $user_id";

    if ($conn->query($sql_update) === TRUE) {
        echo "Yoklama durumu başarıyla güncellendi.";
        
        // Twilio ile SMS gönderme işlemi
        if ($attendance_status == 0) {
            sendSMS($user_id); // Twilio'dan SMS gönder
        }
    } else {
        echo "Hata: " . $sql_update . "<br>" . $conn->error;
    }
}

$conn->close();

// Twilio ile SMS gönderme fonksiyonu
function sendSMS($user_id) {
    // Twilio API entegrasyonu buraya gelecek
    // Twilio API'si aracılığıyla SMS gönderilecek
}
?>
