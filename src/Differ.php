<?php

namespace Differ\Differ;

//функция которая принимает два аргумента - JSON строки и складывает значения в один общий массив и выводит его на экран

function genDiff($path1, $path2): string
{
    // Преобразуем файлы в ассоциативные массивы
    //$parsedContent1 = json_decode(file_get_contents($path1), true);
    //$parsedContent2 = json_decode(file_get_contents($path2), true);
    $parsedContent1 = $path1;
    $parsedContent2 = $path2;

    // Получаем список всех ключей из обоих массивов
    $keys = array_unique(array_merge(array_keys($parsedContent1), array_keys($parsedContent2)));
    // Сортируем массив по ключам в алфавитном порядке
    sort($keys);
    // Создаем пустой массив для хранения результата
    $result = [];
    // Проходим по всем ключам
    foreach ($keys as $key) {
        $result[] = '  ' . array_diff_by_key($key, $parsedContent1, $parsedContent2);
    }
    return '{' . "\n" . implode("\n", $result) . "\n" . '}';
}

function array_diff_by_key(string $key, array $first, array $second): string
{
        $first = $first[$key];
        $second = $second[$key];

    if (is_bool($first)) {
        $first = ($first === true) ? "true" : "false";
    }
    if (is_bool($second)) {
        $second = ($second === true) ? "true" : "false";
    }
    if (!$first) {
        return "+ $key: $second";
    }
    if (!$second) {
        return "- $key: $first";
    }
    if ($first == $second) {
        return "  $key: $first";
    } else {
        return  "- $key: $first\n  + $key: $second";
    }
}

// начать с 5 этапа а именно пройти там задачку от хекслета для начала...
// добавить приведение boolean к строке 'true' / 'false'! отдельно для прохождения тестов
// пройти 4 этап с гитхабом
// продолжить 5 этап пройти (аналогично с 3 этапом. отдельно в другом файле)
// перейти и начать 6 этап 'Рекурсивное сравнение'
// связаться с Артуром по достижению любых сложностей ... желательно на 6 этапе!!!
//RED LINE
//до 9 числа максимум!!!
