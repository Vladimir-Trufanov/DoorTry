<?php namespace prown;

// PHP7/HTML5, EDGE/CHROME                                 *** MakeType.php ***
// ****************************************************************************
// * TPhpPrown                        Преобразовать значение к заданному типу *
// *                                                                          *
// * v1.1, 24.05.2019                              Автор:       Труфанов В.Е. *
// * Copyright © 2018 tve                          Дата создания:  26.04.2018 *
// ****************************************************************************

// В PHP не требуется строгого определения типа переменной. Каждая переменная
// может поменять свой тип в зависимости от контекста кода. Это и плохо и хорошо.
// Хорошо то, что в большинстве случаев можно не думать о типе переменной, 
// но существуют ситуации, когда такая универсальность вызывает многозначные 
// толкования и может быть источником ошибок. Это плохо. Например: при 
// формировании упорядоченных списков или массивов, или когда требуется работа с 
// размерностями в числах с плавающей точкой (и в других случаях, когда PHP 
// требует точного указания типа переменной). 

// В этих случаях можно воспользоваться процедурой приведения типов 
// https://www.php.net/manual/ru/language.types.type-juggling.php#language.types.typecasting
// или использовать функцию MakeType. Что применять определяется требованиями Вашего
// стиля программирования.

// Функция MakeType преобразует переданное значение к заданному типу и 
// возвращает его в соответствии с указанной константой типа:
//
// tArr   - array, массив (упорядоченное соответствия значений и ключей);
// tObj   - object, объект (представитель определённого класса);
// tInt   - integer, целое число (из множества {...,-2,-1,0,1,2,...});
// tFloat - double, число с плавающей точкой
// tStr   - string, набор символов=байт (256 различных значений)
// tBool  - boolean, простейший тип, выражающие истинность значения
// tNull  - null, переменные без значения

// Синтаксис:
//
//   $Result=MakeType($Value,$Type);

// Параметры:
//
//   $Value  - значение переменной, которое следует привести к заданному типу;
//   $Type   - константа, определяющая тип значения: array, object, integer,
//      double, string, boolean, null.

// Возвращаемое значение: 
//
//   $Result  - переданное значение функции заданного типа или null, если тип
//      значения указан неверно

require_once "iniConstMem.php";

function MakeType($Value,$Type)
{
    if ($Type==tInt) 
    {
        $Result=intval($Value);
    }
    elseif ($Type==tFloat) 
    {
        $Result=floatval($Value);
    }
    elseif ($Type==tStr) 
    {
        $Result=strval($Value);
    }
    elseif ($Type==tBool) 
    {
        $Result=$Value;
        settype($Result,tBool);
    }
    else $Result=null;
    return $Result;
}
// *********************************************************** MakeType.php *** 
