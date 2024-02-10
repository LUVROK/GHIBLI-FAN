<?php
// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Сохраняем введенное имя в переменную
    $name = htmlspecialchars($_POST['name']);

    // Функция для вывода приветствия
    function greet($userName) {
        if ($userName) {
            return "Привет, $userName!";
        } else {
            return "Привет, незнакомец   !   ";
        }
    }

    // Вызываем функцию greet и сохраняем результат для вывода
    $greeting = greet($name);
} else {
    $greeting = "";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Простой PHP скрипт</title>
</head>
<body>
    <h2>Введите ваше имя</h2>
    <form method="post">
        Имя: <input type="text" name="name">
        <input type="submit" value="Отправить">
    </form>

    <?php
    // Выводим приветственное сообщение, если оно есть
    if ($greeting) {
        echo "<h3>$greeting</h3>";
    }
    ?>

    <!-- Демонстрация цикла -->
    <h2>Нумерация от 1 до 5:</h2>
    <?php
    for ($i = 1; $i <= 5; $i++) {
        echo $i . "<br>";
    }
    ?>

    <!-- Демонстрация условного оператора -->
    <h2>Четное или нечетное:</h2>
    <?php
    $number = 4; // Попробуйте изменить это значение
    if ($number % 2 == 0) {
        echo "$number - четное число";
    } else {
        echo "$number - нечетное число";
    }
    ?>
</body>
</html>
