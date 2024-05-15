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

// Form gönderildiğinde, tüm yoklama durumlarını güncelle
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_all"])) {
    // Tüm yoklama durumlarını al
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'attendance_status_') !== false) {
            $user_id = substr($key, strlen('attendance_status_'));
            $attendance_status = $value;

            // Yoklama durumunu güncelle
            $sql_update = "UPDATE attendance_log SET attendance_status = $attendance_status WHERE id = $user_id";
            $result_update = $conn->query($sql_update);
        }
    }
}

// Kullanıcıları listele
$sql = "SELECT * FROM attendance_log";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Yoklama Listesi</h2>";
    echo "<form action='".$_SERVER["PHP_SELF"]."' method='POST'>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Ad Soyad</th><th>Telefon Numarası</th><th>Yoklama Durumu</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["phone"]."</td>";
        echo "<td>";
        echo "<label><input type='radio' name='attendance_status_".$row["id"]."' value='1'> Geldi</label>";
        echo "<label><input type='radio' name='attendance_status_".$row["id"]."' value='0'> Gelmedi</label>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<button type='submit' name='update_all'>Tümünü Güncelle</button>";
    echo "</form>";
} else {
    echo "Hiç kullanıcı kaydı bulunamadı.";
}
$conn->close();
?>