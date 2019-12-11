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
   'Findes' => 'выбрать из строки подстроку по регулярному выражению',   
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
         echo 'TPhpPrown/';
         echo prown\getTranslit($v).'"'.'>'.$k.'</a></li>';
      }
      else
      {
      echo '<li><a href="';
      echo 'index.php?TPhpPrown=';
      echo prown\getTranslit($v).'"'.'>'.$k.'</a></li>';
      }

   
   
   
   
   
   
   
   
   
   
   }
   return $Result;
}
// ****************************************************************************
// *   Выбрать имя функции, соответствующее транслиту, например: 'Findes' =>  *
// *'vybrat-iz-stroki-podstroku-sootvetstvuyushchuyu-regulyarnomu-vyrazheniyu'*
// ****************************************************************************
function getFunc($inv)
{
   global $aTPhpPrown;
   $Result='';
   foreach($aTPhpPrown as $k=>$v)
   {
      if (prown\getTranslit($v)==$inv)
      {
         $Result=$k;
      }
   }
   if ($Result=='')
   {
      $TypeExp='E_USER_ERROR';
      throw new $TypeExp("[getFunc] Не найдена функция, соответствующая транслиту");
   }
   return $Result;
}
// ****************************************************************************
// *                  Запустить сценарий публикации функции                   *
// ****************************************************************************
function MakeTPhpPrown($SiteRoot,$SiteDevice)
{
   // Определяем каталог страницы с заданной функцией (где есть index.php)
   //$translit=getComRequest('TPhpPrown');  
   //$FuncPage=getFunc($translit);  
   //$page='/Pages/TPhpPrown/_'.$FuncPage.'.php';
   // Запускаем сценарий публикации функции, отправляя заголовок страницы
   /*
   echo('$translit='.$translit.'<br>');
   echo('$FuncPage='.$FuncPage.'<br>');
   echo('$page='.$page.'<br>');
   echo("Location: http://".$_SERVER['HTTP_HOST'].$page);
   */


   // Определяем имя загружаемого сценария
   $translit=getComRequest('TPhpPrown');  
   //$FuncPage=getFunc($translit);  
   $page='/Pages/TPhpPrown/'.$translit.'.php';
   // Запускаем сценарий публикации функции, отправляя заголовок страницы
   /*
   echo('$translit='.$translit.'<br>');
   //echo('$FuncPage='.$FuncPage.'<br>');
   echo('$page='.$page.'<br>');
   echo("Location: http://".$_SERVER['HTTP_HOST'].$page);
   */
   if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
      Header("Location: https://".$_SERVER['HTTP_HOST'].$page);
   else Header("Location: http://".$_SERVER['HTTP_HOST'].$page);
   // Запускаем сценарий через javascript
   /*
   echo '<script>';
   echo 'location.replace("'.$page.'")';
   echo '</script>';
   */
}
// ******************************************************* IniTPhpPrown.php *** 
