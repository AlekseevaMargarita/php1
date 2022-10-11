<?php

/* 1. Подготовьте два массива одинаковой размерности, но не менее 10 элементов, с произвольными числовыми значениями.
Разработайте скрипт для запуска из командной строки, выполняющий перемножение элементов двух массивов и выводящий
результат в консоль с помощью print_r. Умножение должно выполняться только между элементами соответствующих индексов,
то есть нулевой элемент первого массива умножается на нулевой элемент второго массива.*/


$array1 = range(1, 10);
shuffle($array1);
print_r($array1);

$array2 = [3, 5, 15, 25, 4, 5, 12, 8, 7, 0];
print_r($array2);

// вариант 1
for ($i = 0; $i < 10; $i++) {
    print_r($array1[$i] * $array2[$i] . PHP_EOL);
}

// вариант 2
$array3 = [];

for ($i = 0; $i < 10; $i++) {
    $array3[] = $array1[$i] * $array2[$i];
}

print_r($array3);

/* 2-3. Разработайте скрипт для запуска из командной строки, генерирующий персонализированные поздравления с днём рождения.
Подготовьте два массива: в первом храните пожелания (счастья, здоровья и т.д.), во втором эпитеты
(бесконечного, крепкого и т.д.). При запуске запросите имя именинника и после ввода сгенерируйте текст поздравления,
включающий три пожелания. Комбинации эпитетов и пожеланий должны быть случайными.
В результате необходимо получить строку, по следующему примеру: «Дорогой Илон Маск, от всего сердца поздравляю тебя
с днем рождения, желаю космического терпения, бесконечного здоровья и безудержного воображения!».
Для реализации используйте функции array_rand и implode.*/

$epithets = [
    'бесконечного',
    'крепкого',
    'космического',
    'нескончаемого',
    'безудержного'
];
$wishes = [
    'счастья',
    'здоровья',
    'терпения',
    'вдохновения',
    'воображения'
];

$name = readline('Как вас зовут? ');

$randKeysEpithets = array_rand($epithets, 3);
$randKeysWishes = array_rand($wishes, 3);

for ($i = 0; $i < 3; $i++) {
    $wishArr = [];
    $wishArr[] = $epithets[$randKeysEpithets[$i]];
    $wishArr[] = $wishes[$randKeysWishes[$i]];
    $wish = "wish$i";
    $$wish = implode(' ', $wishArr);
}

echo "Дорогой(ая) $name, от всего сердца поздравляю тебя с днем рождения, желаю $wish0, $wish1 и $wish2!";


/* 3. Подготовьте многомерный ассоциативный массив следующего вида:
$students = [
   'ИТ20' => [
       'Иванов Иван' => 5,
       'Кириллов Кирилл' => 3
   ],
   'БАП20' => [
       'Антонов Антон' => 4
   ]
];
В качестве ключей массива используются названия групп. В качестве элементов — отношение студента и его оценки.
Добавьте произвольные имена студентов и их оценки в обе группы. После подготовки массива, реализуйте скрипт
командной строки, выполняющий следующие вычисления:
Вычислить арифметическое среднее по всем оценкам в рамках группы.
Вывести на экран название группы с самым большим вычисленным значением успеваемости;
Составить список на отчисление, в который попадают студенты из любой группы, имеющие оценку ниже трёх.
В списке студенты должны быть сгруппированы по их группе.
Выведите полученные данные в консоль, с помощью функции print_r;*/

$students = [
    'ИТ20' => [
        'Иванов Иван' => 5,
        'Кириллов Кирилл' => 3,
        'Рыжов Артем' => 2,
        'Антонова Оксана' => 4,
        'Иванов Кирилл' => 4,
        'Рябова Ольга' => null
    ],
    'БАП20' => [
        'Антонов Антон' => 4,
        'Клименко Мария' => 2,
        'Суворова Анастасия' => 5,
        'Исаев Антон' => 3,
        'Парамонов Илья' => 5
    ],
    'БАП30' => [
        'Антонов Антон' => 4,
        'Клименко Мария' => 2,
        'Суворова Анастасия' => 5,
        'Исаев Антон' => 3,
        'Парамонов Илья' => 5
    ],
    'Пустая группа' => [],
    'Пустая группа 2' => null,
    'Непонятное значение'
];

print_r($students);

$studentsAvg = [];
$deductionList = [];

foreach ($students as $group => $studentList) {
    if (is_array($studentList) && count($studentList)) {
        $avg = array_sum($studentList) / count($studentList);
    } else {
        $avg = 0;
    }
    $studentsAvg[$group] = $avg;
    if (is_array($studentList)) {
        foreach ($studentList as $student => $grade) {
            if ($grade < 3) {
                $deductionList[$group][] = $student;
                // $deductionList[$group][$student] = $grade;
            }
        }
    }
}

// вернет только одно название группы
// $nameMaxAvgGroup = array_search(max($studentsAvg), $studentsAvg);

// несколько групп с одинаковым максималным значением
$maxAvgGroup = array_keys($studentsAvg, max($studentsAvg));

$nameMaxAvgGroup = implode(', ', $maxAvgGroup);

echo "Группа(-ы) с самым высоким значением успеваемости: $nameMaxAvgGroup." .PHP_EOL;

print_r($deductionList);

