<?php
// PHP7/HTML5, EDGE/CHROME                                  *** iniMenu.php ***

// ****************************************************************************
// * doortry.ru                                        Отработать пункты меню *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 21.01.2024

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
      $li=NewLine.'<li><a href="';
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
   }
   echo NewLine;

   /*
   global $aStihi;
   $Result = true;
   // Делаем так, чтобы в трассировке кода явно были видны <li>
   $NewLine="\r\n";
   $NewLine='';
   $li=$NewLine; 
   
   foreach($aStihi as $k=>$v)
   {
      prown\ConsoleLog($k.'=='.$v);
      $li=$li.$NewLine.'<li><a href="';
      if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
      {
         $li=$li.'/stihi/'.$v.'"'.'>'.'+'.$k;
      }
      else
      {
         $li=$li.'?stihi='.$v.'"'.'>'.'='.$k;
      }
      $li=$li.'</a></li>';
      echo $li;
      prown\ConsoleLog($k.'=='.$v);
   }
   //prown\Alert($li);
   
   //echo $NewLine;
   */
   
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
   echo NewLine.'<li><a href="#">TPhpPrown</a>';
      echo NewLine.'<ul>';
      TPhpPrownMenu();
      echo '</ul>'.NewLine;
   echo '</li>'.NewLine;
   // Подключаем показ стихотворения
   echo NewLine.'<li><a href="#">Штрихотворения</a>';
      echo NewLine.'<ul>';
      StihiMenu();
      echo '</ul>'.NewLine;
   echo '</li>'.NewLine;
   
   // Подключаем пробную страницу
   //echo '<li><a href="index.php?list=proba">Пробная страница</a></li>';
   // Подключаем пробную  по BaseMaker
   //echo '<li><a href="index.php?list=basemaker">Пробная BaseMaker страница</a></li>';

   // Подключаем "Подписать фотографию"
   if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
   {
      //echo '<li><a href="podpisat-fotografiyu">Подписать фотографию</a></li>';
      echo '<li><a href="index.php?list=signaphoto">Подписать фотографию</a></li>';
   }
   else
   {
      echo '<li><a href="index.php?list=signaphoto">Подписать фотографию</a></li>';
   }

   // Подключаем страницы для проверки FsbProba
   /*
   echo '<li><a href="index.php?fsb=probaPolityConfident">probaPolityConfident</a></li>';
   echo '<li><a href="index.php?fsb=probaPolzoSogl">probaPolzoSogl</a></li>';
   echo '<li><a href="index.php?fsb=FsbProba">FsbProba</a></li>';
   */

   // Подключаем страницы темы "Крошки опыта" 
   echo '<li>';
      // Для основного и контрольного сайтов выводим краткий URL
      if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
      {
         echo '<a href="index.php/kroshki-opyta">Крошки опыта</a>';
      }
      else
      {
         echo '<a href="index.php?list=kroshki-opyta">Крошки опыта</a>';
      }
   echo '</li>';

   
   /*                                                   
   echo NewLine.'<li><a href="/Pages/BitofExpert/BitofExpert.html">Крошки опыта</a>';
      / *
      <li><a href="/TPhpPrown/bajty-v-kilo-kibi-mega-mebibajty-i-obratno">RecalcSizeInfo</a></li>
      
      echo NewLine.'<ul>';
      BitofExpertMenu();
      echo '</ul>'.NewLine;
      * /
   echo '</li>'.NewLine;
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
      $href='index.php?list=instrumenty';                              
      echo '<li><a href="'.$href.'">Инструменты</a></li>';
   }
   //echo '<li><a href="#">SoftШутки</a></li>';
   echo '</ul>';
   return $Result;
}
// ************************************************************ iniMenu.php ***
