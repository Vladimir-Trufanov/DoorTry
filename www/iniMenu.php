<?php
// PHP7/HTML5, EDGE/CHROME                                  *** iniMenu.php ***

// ****************************************************************************
// * doortry.ru                                        Отработать пункты меню *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 26.11.2019

/**
 *  Список новостных лент
 *  https://subscribe.ru/catalog?rss
**/
// ****************************************************************************
// *                       Вывести пункты новостного меню                     *
// ****************************************************************************
function NewsMenu()
{
   global $aNews;
   $Result = true;
   foreach($aNews as $k=>$v)
   {
      echo '<li><a href="';
      if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
      {
         //echo 'novosti=';
      }
      else
      {
         echo 'index.php?novosti=';
      }
      echo prown\getTranslit($k).'"'.
         ' rel="nofollow">'.      // исключили ссылку из индексирования
         $k.'</a></li>';
   }
   return $Result;
}
// ****************************************************************************
// *                       Вывести пункты меню стихотворений                  *
// ****************************************************************************
function StihiMenu()
{
   global $aStihi;
   $Result = true;
   foreach($aStihi as $k=>$v)
   {
      $li='<li><a href="';
      if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
      {
         $li=$li.'/stihi/'.$v.'"'.'>'.$k;
      }
      else
      {
         $li=$li.'?stihi='.$v.'"'.'>'.$k;
      }
      $li=$li.'</a></li>';
      echo $li;
      //prown\ConsoleLog($li);
   }
   return $Result;
}
// ****************************************************************************
// *                      Отработать пункты верхнего меню                     *
// ****************************************************************************
function TopMenu()
{
   $Result = true;
   // Формируем кнопку гамбургера (в компьютерном варианте она скрыта)
   echo '<input id="main-menu-state" type="checkbox"/>';
   echo '<label class="main-menu-btn" for="main-menu-state">';
      echo '<span class="main-menu-btn-icon"></span>'; // Кнопка меню-гамбургера
   echo '</label>';
   // Формируем смарт-меню
   echo '<ul id="main-menu" class="sm sm-doortry">';
   // Переключаем пункты меню главных материалов сайта
   if (prown\isComRequest(prown\getTranslit(ConnHandler),'list'))
   {
      echo '<li>';
      // Для основного и контрольного сайтов выводим краткий URL
      if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
      {
         echo '<a href="'.prown\getTranslit(SimPrincip).'">'.SimPrincip.'</a>';
      }
      else
      {
         echo '<a href="index.php?list='.prown\getTranslit(SimPrincip).'">'.SimPrincip.'</a>';
      }
      echo '</li>';
   }
   else
   {                                               
      echo '<li>';
      if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
      {
         echo '<a href="'.prown\getTranslit(ConnHandler).'">'.ConnHandler.'</a>';
      }
      else
      {
         echo '<a href="index.php?list='.prown\getTranslit(ConnHandler).'">'.ConnHandler.'</a>';
      }
      echo '</li>';
   }
   // Подключаем сведения о библиотеке TPhpPrown                                                    
   echo '<li><a href="#">TPhpPrown</a>';
      echo '<ul>';
      TPhpPrownMenu();
      echo '</ul>';
   echo '</li>';
   // Подключаем показ стихотворения
   echo '<li><a href="#">Штрихотворения</a>';
      echo '<ul>';
      StihiMenu();
      echo '</ul>';
   echo '</li>';
   // Подключаем пробную страницу
   //echo '<li><a href="index.php?list=proba">Пробная страница</a></li>';
   // Подключаем пробную  по BaseMaker
   //echo '<li><a href="index.php?list=basemaker">Пробная BaseMaker страница</a></li>';
   // Подключаем "Подписать фотографию"
   //echo '<li><a href="index.php?list=signaphoto">Подписать фотографию</a></li>';
    
   // Подключаем страницы для проверки FsbProba
   /*
   echo '<li><a href="index.php?fsb=probaPolityConfident">probaPolityConfident</a></li>';
   echo '<li><a href="index.php?fsb=probaPolzoSogl">probaPolzoSogl</a></li>';
   echo '<li><a href="index.php?fsb=FsbProba">FsbProba</a></li>';
   */
   // Подключаем вызов новостей                                                    
   echo '<li><a href="#">Новости</a>';
      echo '<ul>';
      NewsMenu();
      echo '</ul>';
   echo '</li>';
   // Подключаем страницу с инструментами и документацией
   if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
   {
      echo '<li><a href="instrumenty">Инструменты</a></li>';
   }
   else
   {
      echo '<li><a href="index.php?list=instrumenty">Инструменты</a></li>';
   }
   //echo '<li><a href="#">SoftШутки</a></li>';
   echo '</ul>';
   return $Result;
}
// ************************************************************ iniMenu.php ***
