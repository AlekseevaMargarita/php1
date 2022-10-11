<?php

/* 1. Подготовьте массив целых чисел (4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2).
Разработайте анонимную функцию для применения в качестве аргумента array_map,
возвращающую для каждого элемента массива строковое значение: «четное» или «нечетное».
Для проверки четности числа используйте деление по модулю (%); */

$stringFn = function(int $x): string
{
    return $x % 2 == 0 ? 'четное' : 'нечетное';
};

$arrOfInt = [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2];

$newArr = array_map($stringFn, $arrOfInt);

print_r($newArr);


/* 2. Разработайте функцию с объявленными типами аргументов и возвращаемого значения,
принимающую в качестве аргумента массив целых чисел.
Результатом работы функции должен быть массив, содержащий три элемента:
max — наибольшее число, min — наименьшее число, avg — среднее арифметическое всех чисел массива; */

function newArrFn(array $arr): array
{
    $newArr = [];
    $newArr['max'] = max($arr);
    $newArr['min'] = min($arr);
    $newArr['avg'] = array_sum($arr) / count($arr);

    return $newArr;
}

$arrOfInt = [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2];

$arrOfElements = newArrFn($arrOfInt);

print_r($arrOfElements);

/* 3. *Дан многомерный массив, представляющий собой коробку, в которую сложены предметы.
Помимо обычных предметов, каждая коробка может содержать другие коробки.
Необходимо написать функцию, проверяющую, есть ли предмет в цепочке коробок или нет.
Функция должна принимать два аргумента: стоковое название предмета для поиска (например: «Ключ») и изначальный массив.
Возвращаемое значение — bool, где true означает наличие предмета, а false его отсутствие.
Механизм поиска должен быть реализован с применением рекурсии. */


$box = [
   [
       0 => 'Тетрадь',
       1 => 'Книга',
       2 => 'Настольная игра',
       3 => [
           'Настольная игра',
           'Настольная игра',
       ],
       4 => [
           [
               'Ноутбук',
               'Зарядное устройство'
           ],
           [
               'Компьютерная мышь',
               'Набор проводов',
               [
                   'Фотография',
                   'Картина'
               ]
           ],
           [
               'Инструкция',
               [
                   'Ключ'
               ]
           ]
       ]
   ],
   [
       0 => 'Пакет кошачьего корма',
       1 => [
           'Музыкальный плеер',
           'Книга'
       ]
   ]
];

$item = 'Ключ';

function findItem(string $item, array $arr): bool
{
    foreach ($arr as $elem) {
        if (is_array($elem)) {
            if (findItem($item, $elem)) {
                return true;
            }
        } elseif ($elem == $item) {
            return true;
        }
    }
    return false;
}

var_dump(findItem($item, $box));


if (findItem($item, $box)) {
    echo "Предмет '$item' найден!";
} else {
    echo "Предмет '$item' не найден!";
}




