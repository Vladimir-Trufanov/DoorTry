<?php                                           
// PHP7/HTML5, EDGE/CHROME                                   *** Common.php ***

// ****************************************************************************
// * doortry.ru                                      Блок общих функций сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  05.03.2018
// Copyright © 2018 tve                              Посл.изменение: 03.02.2020

// ****************************************************************************
// *                      Вывести сообщение только при отладке                *
// ****************************************************************************
//function echod($String)
//{
//   if (!(($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru')))
//   echo ($String);
//}
// ****************************************************************************
// *                       Определить работаем ли на сайте                    *
// ****************************************************************************
function isDoortry()
{
   $Result=false;
   if ($_SERVER['HTTP_HOST']=='doortry.ru') $Result=true;
   return $Result;
}
// ****************************************************************************
// *                      Определить работаем ли на хостинге                  *
// ****************************************************************************
function isNichost()
{ 
   $Result=false;
   if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
   {
      $Result=true;
   }
   return $Result;
}

// ****************************************************************************
// *                Вывести значок верного CSS в текущей позиции              *
// ****************************************************************************
function MarkerCSS($mColor='vcss')
{
   if ($mColor=='vcss')
   {
   ?>
      <p>
      <a href="https://jigsaw.w3.org/css-validator/check/referer"
         title="Правильный CSS!">
         <img style="border:0;width:88px;height:31px"
            src="https://jigsaw.w3.org/css-validator/images/vcss"
            alt="Правильный CSS!" />
      </a>
      </p>
   <?php
   }
   else
   {
   ?>
      <p>
       <a href="https://jigsaw.w3.org/css-validator/check/referer"
          title="Правильный CSS!">
          <img style="border:0;width:88px;height:31px"
             src="https://jigsaw.w3.org/css-validator/images/vcss-blue"
             alt="Правильный CSS!" />
      </a>
      </p>
   <?php
   }
}

// ************************************************************* Common.php *** 
