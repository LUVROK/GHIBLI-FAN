<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // URL для проверки reCAPTCHA
    $url = "https://www.google.com/recaptcha/api/siteverify";
    
    // Данные для отправки в POST запросе
    $data = [
        'secret' => "6LcWH3cpAAAAAHFgaMNWglUYofq--EQwpigjP0pk",
        'response' => $_POST['g-recaptcha-response'],
    ];

    // Настройка параметров запроса
    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        ]
    ];
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Обработка ошибки */ }

    $response = json_decode($result);

    if ($response->success) {
        // Токен reCAPTCHA прошел проверку
        // Обработка данных формы
        echo "<script>console.log('Форма успешно отправлена!');</script>";
        echo "Форма успешно отправлена!";
    } else {
        // Токен reCAPTCHA не прошел проверку
        echo "Подтверждение reCAPTCHA не удалось!";
        echo "<script>console.log('Подтверждение reCAPTCHA не удалось!');</script>";
    }
}
?>
