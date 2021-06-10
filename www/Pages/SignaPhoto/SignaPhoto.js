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
// *        Преобразовать логическое значение в соответствующий текст         *
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
   $('#OriChange').remove();
   if (window.orientation==0)
   {
      $('#Play').css('display','block');
   }
   else
   {
      $('#Play').css('display','none');
      var cHtml='<div id="OriChange">'+SiteDevice+' поверните, игра запустится!</div>';
      $('#Main').prepend(cHtml);
      $('#OriChange').css('font-size','3.6rem');
      $('#OriChange').css('width','77rem');
      $('#OriChange').css('padding-left','2rem');
      $('#OriChange').css('margin-top','4rem');
      $('#OriChange').css('margin-left','auto');
      $('#OriChange').css('margin-right','auto');
      $('#OriChange').css('font-weight','bold');
      $('#OriChange').css('color','#E00B0B');
   }
}
// ********************************************************** SignaPhoto.js ***
