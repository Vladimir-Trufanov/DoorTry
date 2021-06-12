// JavaScript/PHP7/HTML5, EDGE/CHROME                     *** SignaPhoto.js ***

/**
 * Библиотека прикладных функций страницы "Подписать фотографию"                             
 * 
 * v1.0, 05.06.2021        Автор: Труфанов В.Е. 
 * Copyright © 2019 tve    Дата создания: 03.06.2021
 * 
**/ 

// ****************************************************************************
// *        Преобразовать логическое значение в соответствующий текст         *
// ****************************************************************************
function sayLogic($logic)
{
   $Result='false';
   if ($logic) $Result='true';
   return $Result;
}
// ****************************************************************************
// *        =-----Преобразовать логическое значение в соответствующий текст         *
// ****************************************************************************
function MakeSiteDevice($Name,$isElem=false)
{
   $Result='Устройство';
   // Определяем устройство
   if ($Name=='Computer') $Result = 'Компьютер';
   else if ($Name=='Mobile') $Result = 'Смартфон';
   // Если требуется, то меняем элемент на странице
   if ($isElem) 
   {
      var elem = document.getElementById("SiteDevice");
      elem.innerHTML=$Result;
   }
   return $Result;
}
// ****************************************************************************
// *                        Определить общесайтовые события                   *
// ****************************************************************************

// http://greymag.ru/?p=175, 07.09.2011. При повороте устройства браузер отсылает событие orientationchange.
// Это актуально для обеих операционных систем. Но подписка на это событие может осуществляться по разному. 
// При проверке на разных устройствах iPhone, iPad и Samsung GT (Android), выяснилось что в iOS срабатывает 
// следующий вариант установки обработчика: window.onorientationchange = handler; А для Android подписка
// осуществляется иначе: window.addEventListener( 'orientationchange', handler, false ); Примечание: В обоих
// примерах handler - функция-обработчик. Текущую ориентацию экрана можно узнать проверкой свойства 
// window.orientation, принимающего одно из следующих значений: 0 — нормальная портретная ориентация, -90 —
// альбомная при повороте по часовой стрелке, 90 — альбомная при повороте против часовой стрелки, 
// 180 — перевёрнутая портретная ориентация (пока только для iPad).
//
// Отследить переворот экрана:
// https://www.cyberforum.ru/javascript/thread2242547.html, 08.05.2018

window.addEventListener('orientationchange',doOnOrientationChange);
function doOnOrientationChange() 
{
   // Если ориентация портретная, то запускаем страницу с разметкой для jQuery 
   // mobile c двумя страницами 
   $DeviceOrient="Orient "+window.orientation;
   //alert($DeviceOrient);
   if (window.orientation==0) 
   {
      //alert($SignaPortraitUrl);
      window.location = $SignaPortraitUrl;
   }
   if (window.orientation==180) window.location = $SignaPortraitUrl;
   if (window.orientation==90) 
   {
      //alert($SignaUrl);
      window.location = $SignaUrl;
   }
   if (window.orientation==-90) 
   {
      window.location = $SignaUrl;
   }
}

/*
function doOnOrientationChange($isStart=false) 
{
   $SiteDevice='<?php echo $SiteDevice; ?>';
   console.log('*** '+$SiteDevice+' ***');
   console.log('*** $isStart='+sayLogic($isStart)+' ***');
    

   if ($SiteDevice=='Mobile')
   {
      // Определяем защишенность сайта, для того чтобы правильно сформулировать 
      // в запросе "http" или "https"
      $https='<?php echo $_SERVER["HTTPS"]; ?>';
      if ($https=='off') $https='http'
      else $https='https'; 
      console.log($https);
      // Если ориентация портретная, то запускаем страницу с разметкой для jQuery 
      // mobile c двумя страницами 
      if (window.orientation==0)
      {
         // Готовим вызов страницы c разметкой для режима "мобильный и портретный"
         // и перезапускем страницу
         $page=$https+'://'+"<?php echo $_SERVER['HTTP_HOST'] ?>"+"/index.php?list=signaphotoportrait";
         console.log($page);
         //window.location = $page;
      }
      // Если ориентация ландшафтная, то запускаем страницу с компьютерной,
      // настольной разметкой (при начальном запуске пропускаем ветвление)
      if ($isStart) {}
      else
      {
         $page=$https+'://'+"<?php echo $_SERVER['HTTP_HOST'] ?>"+"/index.php?list=signaphoto";
         console.log($page);
         window.location = $page;
      }
   }
}
*/
// ********************************************************** SignaPhoto.js ***
