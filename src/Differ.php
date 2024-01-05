<?php

namespace Differ\Differ;

//функция которая принимает два аргумента - JSON строки и складывает значения в один общий массив и выводит его на экран

function genDiff(string $path1, string $path2): string
{
    // Преобразуем файлы в ассоциативные массивы
    $parsedContent1 = json_decode(file_get_contents($path1), true);
    $parsedContent2 = json_decode(file_get_contents($path2), true);    
    
    // Получаем список всех ключей из обоих массивов
    $keys = array_unique(array_merge(array_keys($parsedContent1), array_keys($parsedContent2)));
    // Сортируем массив по ключам в алфавитном порядке
    sort ($keys);
    // Создаем пустой массив для хранения результата
    $result = [];
    // Проходим по всем ключам
    foreach ($keys as $key) {
        // Проверяем, есть ли ключ в первом массиве
        if (array_key_exists($key, $parsedContent1)) {
            // Проверяем, есть ли ключ во втором массиве
            if (array_key_exists($key, $parsedContent2)) {
                // Сравниваем значения по ключу в обоих массивах
                if ($parsedContent1[$key] == $parsedContent2[$key]) {
                    // Если значения равны, добавляем ключ и значение в результат со значением " "
                    $result[] = "    {$key}: {$parsedContent1[$key]}";
                } else {
                    // Если значения не равны, добавляем ключ и значения из обоих массивов в результат со значением "-" и "+"
                    $result[] = "  - {$key}: {$parsedContent1[$key]}";
                    $result[] = "  + {$key}: {$parsedContent2[$key]}";
                }
            } else {
                // Если ключа нет во втором массиве, добавляем ключ и значение из первого массива в результат со значением "-"
                $result[] = "  - {$key}: {$parsedContent1[$key]}";
            }
        } else {
            // Если ключа нет в первом массиве, добавляем ключ и значение из второго массива в результат со значением "+"
            $result[] = "  + {$key}: {$parsedContent2[$key]}";
        }
    }

    // Возвращаем результат в виде строки, разделяя элементы переносом строки
    return '{' . "\n" . implode("\n", $result) . "\n" . '}';
}

// начать с 5 этапа а именно пройти там задачку от хекслета для начала...
// добавить приведение boolean к строке 'true' / 'false'! отдельно для прохождения тестов
// пройти 4 этап с гитхабом
// продолжить 5 этап пройти (аналогично с 3 этапом. отдельно в другом файле)
// перейти и начать 6 этап 'Рекурсивное сравнение' 
// связаться с Артуром по достижению любых сложностей ... желательно на 6 этапе!!! 
//RED LINE
//до 9 числа максимум!!!