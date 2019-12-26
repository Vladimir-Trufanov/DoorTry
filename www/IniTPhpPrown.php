<?php 
// PHP7/HTML5, EDGE/CHROME                             *** IniTPhpPrown.php ***

// ****************************************************************************
// * doortry.ru                    Произвести установки глобальных переменных *
// *                    для публикации на сайте функций TPhpPrown, подключить *
// *                                                  вспомогательные функции *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  10.12.2019
// Copyright © 2019 tve                              Посл.изменение: 24.12.2019

// ****************************************************************************
// *            Проинициализировать массив функций библиотеки TPhpPrown       *
// ****************************************************************************
$aTPhpPrown=array
(
   'О библиотеке'  => 'о библиотеке',   
   'Findes'        => 'выбрать из строки подстроку по регулярному выражению',   
   'iniConstMem'   => 'определить общие константы и переменные',   
   'iniErrMessage' => 'определить общие сообщения библиотеки',   
   'iniRegExp'     => 'определить популярные регулярные выражения PHP',   
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
         echo '/Pages/TPhpPrown/'.prown\getTranslit($v).'.php'.'"'.'>';
         echo $k.'</a></li>';
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
         if ($k=='Findes') $ext='выбрать из строки подстроку, соответствующую регулярному выражению';
         else if ($k=='iniConstMem') $ext='определить общие константы и переменные библиотеки';
         else if ($k=='') $ext='';
         else if ($k=='') $ext='';
         else if ($k=='') $ext='';
         else if ($k=='') $ext='';
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
// ******************************************************* IniTPhpPrown.php *** 
