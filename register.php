<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Kayıt Formu</title>
</head>
<body>
    <h2>Kullanıcı Kayıt Formu</h2>
    <form action="register_process.php" method="POST">
        <label for="name">Ad Soyad:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="phone">Telefon Numarası:</label><br>
        <input type="text" id="phone" name="phone" required><br><br>
        <button type="submit">Kayıt Ol</button>
    </form>
</body>
</html>
