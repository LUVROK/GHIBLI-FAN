<?php
// Инициализация переменных для сохранения данных формы
$firstname = $lastname = $email = $password = "";
$registrationSuccess = false;

// Проверка, была ли форма отправлена
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    // В реальном приложении здесь должно быть хеширование пароля
    $password = htmlspecialchars($_POST['password']);
    $registrationSuccess = true;
}

// Инициализация cURL сессии
$curl = curl_init();

// Настройка опций cURL
curl_setopt($curl, CURLOPT_URL, "https://188.166.68.91:3000/");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Выполнение запроса и сохранение ответа
$response = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

// Закрытие сессии
curl_close($curl);

// Отображение статуса ответа
echo "Статус ответа: " . $status;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Форма регистрации</title>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script>
</head>
<body>

<?php if ($registrationSuccess): ?>
    <h2>Спасибо за регистрацию, <?php echo "$firstname $lastname"; ?>!</h2>
    <p>Мы отправили подтверждение на <?php echo $email; ?>.</p>
<?php else: ?>
    <h2>Форма регистрации</h2>
    <form method="post"  action="./utils/submit.php" id="demo-form">
        <p>Имя: <input type="text" name="firstname" required></p>
        <p>Фамилия: <input type="text" name="lastname" required></p>
        <p>Email: <input type="email" name="email" required></p>
        <p>Пароль: <input type="password" name="password" required></p>
        <p><button class="g-recaptcha" 
        data-sitekey="6LcWH3cpAAAAAIo2SFHZNnB28lCtEuKvGqhjIGpd" 
        data-callback='onSubmit' 
        data-action='submit'>registration</button></p>
    </form>
<?php endif; ?>
</body>
</html>