<?php

/**
 * @param int $input
 * @return int
 */
function digitCountEasyVariant(int $input): int
{
    //Взяли число по модулю и приведя к строке посчитали количество символов в строке
    return strlen(abs($input));
}

/**
 * @param int $input
 * @return int
 */
function digitCountHardVariant(int $input): int
{
    //Взяли число по модулю (нам без разницы на знак при подсчете цифр)
    $input = abs($input);

    //Поскольку делить будем на 10, то для чисел меньше 10 сразу возвращаем 1 цифру
    if ($input < 10) {
        return 1;
    }

    //0 знаков
    $digits = 0;

    //Пока в $input число большее чем 1, делим на 10 и увеличиваем количество цифр
    while ($input > 1) {
        $input = $input / 10;
        $digits++;
    }

    return $digits;
}

//Тестовый набор данных, первый элемент - число которое подадим в функцию, второй - то что ожидаем от неё получить
$testData = [
    [-25115, 5],
    [PHP_INT_MAX, 19],
    [25, 2],
    [1, 1],
    [0, 1],
    [-1, 1],
    [-25, 2]
];

//Тестируемые функции
$testFunctions = [
    'digitCountEasyVariant',
    'digitCountHardVariant'
];

foreach ($testData as $testSet) {
    $int = $testSet[0];
    $digits = $testSet[1];

    foreach ($testFunctions as $testFunction) {
        assert($testFunction($int) === $digits, "{$testFunction} on {$int} failed");
    }
}