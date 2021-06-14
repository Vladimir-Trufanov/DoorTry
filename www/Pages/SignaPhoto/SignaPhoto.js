// JavaScript/PHP7/HTML5, EDGE/CHROME                     *** SignaPhoto.js ***

/**
 * Библиотека прикладных функций страницы "Подписать фотографию"                             
 * 
 * v1.0, 13.06.2021        Автор: Труфанов В.Е. 
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
// *        Переопределить имя устройства и, при необходимости заменить       *
// *                 соответствующий текст в html-сценарии                    *
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
// *        Выполнить действия в связи с изменением ориентации смартфона      *
// ****************************************************************************

// http://greymag.ru/?p=175, 07.09.2011. При повороте устройства браузер 
// отсылает событие orientationchange. Это актуально для обеих операционных 
// систем. Но подписка на это событие может осуществляться по разному. 
// При проверке на разных устройствах iPhone, iPad и Samsung GT (Android),
// выяснилось что в iOS срабатывает следующий вариант установки обработчика: 
// window.onorientationchange = handler; А для Android подписка осуществляется 
// иначе: window.addEventListener( 'orientationchange', handler, false ); 
//
// Примечание: В обоих примерах handler - функция-обработчик. Текущую ориентацию
// экрана можно узнать проверкой свойства window.orientation, принимающего одно
// из следующих значений: 0 — нормальная портретная ориентация, -90 —
// альбомная при повороте по часовой стрелке, 90 — альбомная при повороте 
// против часовой стрелки, 180 — перевёрнутая портретная ориентация (пока 
// только для iPad).
//         
// Отследить переворот экрана:
// https://www.cyberforum.ru/javascript/thread2242547.html, 08.05.2018

// Подключить обработчик изменения положения смартфона
window.addEventListener('orientationchange',doOnOrientationChange);

//
function proba()
{
      // Определяем защишенность сайта, для того чтобы правильно сформулировать 
      // в запросе http или https
      $https='<?php echo $_SERVER["HTTPS"];?>';
      if ($https=="off") $https="http"
      else $https="https"; 
      console.log($https);
      // Готовим URL для мобильно-портретной разметки, то есть разметки
      // для jQuery-мobile c двумя страницами 
      $SignaPortraitUrl=$https+"://"+"<?php echo $_SERVER['HTTP_HOST'] ?>"+"/index.php?list=signaphotoportrait";
      console.log('1: '+$SignaPortraitUrl);
      // Готовим URL для настольно-ландшафтной разметки (одностраничной)
      $SignaUrl=$https+"://"+"<?php echo $_SERVER['HTTP_HOST'] ?>"+"/index.php?list=signaphoto";
      console.log($SignaUrl);
}


function doOnOrientationChange() 
{
   if ((window.orientation==0)||(window.orientation==180))
   {
      //alert('2: '+$SignaPortraitUrl);
      window.location = $SignaPortraitUrl;
   } 
   if ((window.orientation==90)||(window.orientation==-90)) 
      window.location = $SignaUrl;
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
