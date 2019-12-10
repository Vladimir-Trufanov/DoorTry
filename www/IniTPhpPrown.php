<?php 
// PHP7/HTML5, EDGE/CHROME                             *** IniTPhpPrown.php ***

// ****************************************************************************
// * doortry.ru                    Произвести установки глобальных переменных *
// *                    для публикации на сайте функций TPhpPrown, подключить *
// *                                                  вспомогательные функции *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  10.12.2019
// Copyright © 2019 tve                              Посл.изменение: 10.12.2019

// ****************************************************************************
// *            Проинициализировать массив функций библиотеки TPhpPrown       *
// ****************************************************************************
$aTPhpPrown=array
(            
   'Findes' => 'выбрать из строки подстроку, соответствующую регулярному выражению',   
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
      echo '<li><a href="';
      echo 'index.php?TPhpPrown=';
      echo prown\getTranslit($v).'"'.'>'.$k.'</a></li>';
   }
   return $Result;
}

function MakeTPhpPrown($SiteRoot,$SiteDevice)
{
   // Определяем каталог страницы с заданной функцией (где есть index.php)
   $FuncPage=getComRequest('TPhpPrown');  
   $page='/Pages/TPhpPrown/'.$FuncPage;
   // Запускаем сценарий публикации функции, отправляя заголовок страницы
   /*
   echo('$FuncPage='.$FuncPage.'<br>');
   echo('$page='.$page.'<br>');
   echo("Location: http://".$_SERVER['HTTP_HOST'].$page);
   */
   
   if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
      Header("Location: https://".$_SERVER['HTTP_HOST'].$page);
   else Header("Location: http://".$_SERVER['HTTP_HOST'].$page);
   
   // Запускаем сценарий стихотворения через javascript
   /*
   echo '<script>';
   echo 'location.replace("'.$page.'")';
   echo '</script>';
   */
}
// ******************************************************* IniTPhpPrown.php *** 
