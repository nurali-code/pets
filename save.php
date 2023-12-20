<?php
// Получение данных из формы
$img = isset($_POST['imgSrc']) ? $_POST['imgSrc'] : '';
$phone = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '';
$descr = isset($_POST['animalDescription']) ? $_POST['animalDescription'] : '';

// Загрузка содержимого JSON-файла
$jsonData = file_get_contents('data.json');

// Преобразование JSON в массив
$dataArray = json_decode($jsonData, true);

// Создание нового объекта с данными из формы
$newData = [
    'imgSrc' => $img,
    'phoneNumber' => $phone,
    'animalDescription' => $descr,
];

// Добавление новых данных в массив
$dataArray[] = $newData;

// Преобразование массива обратно в формат JSON
$newJsonData = json_encode($dataArray, JSON_PRETTY_PRINT);

// Запись обновленных данных обратно в JSON-файл
file_put_contents('data.json', $newJsonData);

// Отправка ответа клиенту
echo "saved";
?>
