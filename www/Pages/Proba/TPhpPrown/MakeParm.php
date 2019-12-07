<?php namespace prown; 
                                         
// PHP7/HTML5, EDGE/CHROME                                 *** MakeParm.php ***

// ****************************************************************************
// * TPhpPrown             Установить новое значение параметра страницы сайта *
// *                                                                          *
// * v1.0, 30.05.2019                              Автор:       Труфанов В.Е. *
// * Copyright © 2019 tve                          Дата создания:  30.05.2019 *
// ****************************************************************************

// Замечание: 
//
//   Параметры страницы сайта хранятся либо в кукисах браузера, либо в 
//   сохраняемых переменных на диске компьютера пользователя.
//   На 30.05.2019 параметры страницы сайта хранятся в кукисах.

// Синтаксис:
//
//   $Result=MakeParm($Name,$Value,$Type=tStr);

// Параметры:
//
//   $Name  - имя параметра страницы сайта (как правило, по имени параметра 
//      формируется глобальная переменная сайтовой страницы добавлением префикса
//      "p_". Например: "FormNews" --> "$p_FormNews");
//   $Value - значение параметра страницы сайта;
//   $Type  - константа, определяющая тип значения: tArr, tObj, tInt, tFloat, 
//      tStr, tBool, tNull. По умолчанию - tInt.

// Возвращаемое значение: 
//
// $Result  - установленное значение параметра страницы сайта и соответствующей
//      переменной в сценарии сайтовой страницы

require_once "iniConstMem.php";
require_once "MakeCookie.php";

function MakeParm($Name,$Value,$Type=tStr)
{
    $Result=MakeCookie($Name,$Value,$Type);
    return $Result;
}

// *********************************************************** MakeParm.php ***
 
