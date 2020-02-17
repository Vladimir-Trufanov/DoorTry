<?php 
// PHP7/HTML5, EDGE/CHROME                             *** iniTPhpPrown.php ***

// ****************************************************************************
// * doortry.ru                    Произвести установки глобальных переменных *
// *                    для публикации на сайте функций TPhpPrown, подключить *
// *                                                  вспомогательные функции *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  10.12.2019
// Copyright © 2019 tve                              Посл.изменение: 02.02.2019

// ****************************************************************************
// *            Проинициализировать массив функций библиотеки TPhpPrown       *
// ****************************************************************************
$aTPhpPrown=array
(
   'О библиотеке'    => 'О библиотеке',   
   'Findes'          => 'Выбрать из строки подстроку по регулярному выражению',   
   'iniConstMem'     => 'Определить общие константы и переменные',   
   'iniErrMessage'   => 'Определить общие сообщения библиотеки',   
   'iniRegExp'       => 'Определить популярные регулярные выражения PHP', 
   'isCalcInBrowser' => 'Определить работает ли функция Calc для CSS', 
   'MakeType'        => 'Преобразовать значение к заданному типу',  
   'MakeUserError'   => 'Вывести сообщение об ошибке на php',  
);
// ****************************************************************************
// *                  Вывести пункты меню по библиотеке TPhpPrown             *
// ****************************************************************************
function TPhpPrownMenu()
{
   global $aTPhpPrown;
   $Result = true;
   foreach($aTPhpPrown as $k=>$v)
   {
      if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
      {
         echo '<li><a href="';
         echo '/TPhpPrown/'.prown\getTranslit($v).'"'.'>';
         echo $k.'</a></li>';
      }
      else
      {
         echo '<li><a href="';
         echo '/Pages/TPhpPrown/_dispTPhpPrown.php?list='.prown\getTranslit($v).'"'.'>';
         //echo '/Pages/TPhpPrown/'.prown\getTranslit($v).'.php'.'"'.'>';
         echo $k.'</a>'.$v.'</li>';
      }
   }
   return $Result;
}
// ****************************************************************************
// *   Вывести список функций со ссылками на странице о библиотеке TPhpPrown  *
// ****************************************************************************
function TPhpPrownList()
{
   global $aTPhpPrown;
   $Result = true;
   foreach($aTPhpPrown as $k=>$v)
   {
      if (!($k=='О библиотеке'))
      {
         $ext=$v;
         if ($k=='Findes') 
            $ext='выбрать из строки подстроку, соответствующую регулярному выражению';
         else if ($k=='iniConstMem') 
            $ext='определить общие константы и переменные библиотеки';
         else if ($k=='MakeUserError') 
            $ext='вывести сообщение разработчика об ошибке в программируемом '.
            'модуле или сформировать пользовательское исключение';
         else if ($k=='isCalcInBrowser') 
            $ext='проанализировать UserAgent браузера по версиям родительских '.
            'браузеров и определить работает ли функция Calc для CSS';
         else if ($k=='') $ext='';
         
         if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
         {
            //echo 'doortry.ru: '.$k.'==>'.$v.'<br>';
            echo '<h4><a '.
               'href="/TPhpPrown/'.prown\getTranslit($v).'">'.
               $k.'</a>'.' - '.$ext.'.</h4>';
            //echo '<li><a href="';
            //echo '/TPhpPrown/'.prown\getTranslit($v).'"'.'>';
            //echo $k.'</a></li>';
         }
         else
         {
            //echo 'localhost: '.$k.'==>'.$v.'<br>';
            echo '<h4><a '.
               'href="/Pages/TPhpPrown/'.prown\getTranslit($v).'.php">'.
               $k.'</a>'.' - '.$ext.'.</h4>';
         }
      }
   }
   return $Result;
}
// ****************************************************************************
// * Проверить, соответствует ли параметр элементу массива функций библиотеки *
// ****************************************************************************
function isTPhpPrownFunc($Parm,$aTPhpPrown)
{
   $Result = false;
   foreach($aTPhpPrown as $k=>$v)
   {
      if ($Parm==prown\getTranslit($v))
      {
         $Result = true; 
         break;
      }
   }
   return $Result;
}
// ******************************************************* iniTPhpPrown.php *** 
