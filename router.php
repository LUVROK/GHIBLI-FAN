<?php
// Получаем URI запроса
$request = $_SERVER['REQUEST_URI'];

// Путь к вашему index.php в поддиректории
$indexInSubdir = '/public/index.php';

// Проверяем, существует ли запрашиваемый ресурс, и если нет, перенаправляем на index.php в поддиректории
if ($request !== '/' && file_exists(__DIR__ . $request)) {
    return false; // Возвращаем управление встроенному серверу PHP для обработки реальных файлов
} else {
    include __DIR__ . $indexInSubdir;
}
