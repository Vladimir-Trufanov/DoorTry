
// Значения name и value являются обязательными, а остальные не обязательны.
// http://www.codenet.ru/webmast/js/Cookies.php 
function setCookie(name,value,expires,path,domain,secure) 
{
   document.cookie = 
      name + "=" + 
      escape(value) +
      ((expires) ? "; expires=" + expires : "") +
      ((path) ? "; path=" + path : "") +
      ((domain) ? "; domain=" + domain : "") +
      ((secure) ? "; secure" : "");
}
// Для получения значения кукисов в JavaScript, можно воспользоваться 
// document.cookie. Обычно, document.cookie имеет строку следующего формата:
// foo=bar;this=that;somename=somevalue;.....
// Эта строка содержит пары имя=значение, разделённые точкой с запятой.
// Функция getCookie() позволяет осуществить разбор параметров этой строки
function getCookie(name) 
{
	var cookie = " " + document.cookie;
	var search = " " + name + "=";
	var setStr = null;
	var offset = 0;
	var end = 0;
	if (cookie.length > 0) 
   {
		offset = cookie.indexOf(search);
		if (offset != -1) 
      {
			offset += search.length;
			end = cookie.indexOf(";", offset)
			if (end == -1) 
         {
				end = cookie.length;
			}
			setStr = unescape(cookie.substring(offset, end));
		}
	}
	return(setStr);
}
// ****************************************************************************
// *              Определить, включены ли у пользователя cookie               *
// ****************************************************************************
function IsCookieEnabled()
{
   // Проверяем существование свойства navigator.cookieEnabled
   if(typeof(navigator.cookieEnabled)!="undefined")
      return navigator.cookieEnabled;
   else
   {
      // Если свойство navigator.cookieEnabled не поддерживается, то просто 
      // попробуем установить и получить назад тестовый cookie
		var tmpCookie = "testCookieForCheck";
		SetCookie(tmpCookie, "1");
		if (GetCookie(tmpCookie) != null)
  		{
         DeleteCookie(tmpCookie);
  			return true;
  		}
      return false;
  	}
   // https://learn.javascript.ru/cookie
   // Иногда посетители отключают cookie. Отловить это можно проверкой
   // свойства navigator.cookieEnabled
   // if (!navigator.cookieEnabled) 
   // {
   //    alert('Включите cookie для комфортной работы с этим сайтом');
   // }
}
function MakeCatchyQuotes()
{
   var Result=0;
   $(document).ready(function() 
   {
      $('span.pq').each(function() 
      {
         var quote=$(this).clone();
         quote.removeClass('pq');
         quote.addClass('pullquote');
         $(this).before(quote);
      }); // конец each
   }); // конец ready
   return Result;
}
function getTime(secs) {
	var sep = ':'; //separator character
	var hours,minutes,seconds,time,am_pm;
	var now = new Date();
	hours = now.getHours();
	if (hours < 12) {
		am_pm = 'am';
	} else {
		am_pm = 'pm';
	}
	hours = hours % 12;
	if (hours === 0) {
		hours = 12;
	} 
	time = hours;
	minutes = now.getMinutes();
	if (minutes < 10) {
		minutes = '0' + minutes;
	}
	time += sep + minutes;
	if (secs) {
		seconds = now.getSeconds();
		if (seconds < 10) {
			seconds = '0' + seconds;
		}
		time += sep + seconds;
	} 
	return time + ' ' + am_pm;
}
        
  function TurnOnHotkeys(){
  
      document.onkeydown = function(e) {

      // Ctrl+I  Показать установленные настройки сайта
      if (e.ctrlKey && e.keyCode == 'I'.charCodeAt(0)) 
      {
        document.location.replace("index.php?Com=Sett");
        return false;
      }

      // Ctrl+K  Показать кукисы
      else if (e.ctrlKey && e.keyCode == 'K'.charCodeAt(0)) 
      {
        document.location.replace("index.php?Com=Cook");
        return false;
      }
      
      // Ctrl+P  Распечатать страницу (функцию предоставляет браузер)
 
      // Ctrl+Q  Показать параметры запроса к сайту
      else if (e.ctrlKey && e.keyCode == 'Q'.charCodeAt(0)) 
      {
        document.location.replace("index.php?Com=Parm");
        return false;
      }

      // Ctrl+R  Перегрузить сайт без параметров
      else if (e.ctrlKey && e.keyCode == 'R'.charCodeAt(0)) 
      {
        document.location.replace("index.php?Com=Remv");
        return false;
      }

      // Ctrl+S  Сохранить страницу сайта (функцию предоставляет браузер Chrome‎)

      // Ctrl+Z  Передать значение переменной в PHP
      else if (e.ctrlKey && e.keyCode == 'Z'.charCodeAt(0)) 
      {
        var idi = 1352;
        document.location.replace("index.php?idi="+idi);
        return false;
      }
      
    }
  }

