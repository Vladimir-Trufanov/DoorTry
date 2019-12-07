<?php namespace prown;

// PHP7/HTML5, EDGE/CHROME                                 *** MakeType.php ***

// ****************************************************************************
// * TPhpPrown                        Преобразовать значение к заданному типу *
// *                                                                          *
// * v1.0, 24.05.2019                              Автор:       Труфанов В.Е. *
// * Copyright © 2019 tve                          Дата создания:  26.04.2019 *
// ****************************************************************************

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
