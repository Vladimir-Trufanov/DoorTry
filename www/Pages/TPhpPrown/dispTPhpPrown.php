<?php
// PHP7                                               *** dispTPhpPrown.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown                            Диспетчер страниц TPhpPrown *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  07.12.2019
// Copyright © 2019 tve                              Посл.изменение: 03.02.2020

   // Инициализируем рабочее пространство: корневой каталог сайта и т.д.
   require_once $_SERVER['DOCUMENT_ROOT'].'/iniWorkSpace.php';
   $_WORKSPACE=iniWorkSpace();
   $SiteRoot   = $_WORKSPACE[wsSiteRoot];    // Корневой каталог сайта
   $SiteAbove  = $_WORKSPACE[wsSiteAbove];   // Надсайтовый каталог
   $SiteHost   = $_WORKSPACE[wsSiteHost];    // Каталог хостинга
   $SiteDevice = $_WORKSPACE[wsSiteDevice];  // 'Computer' | 'Mobile' | 'Tablet'
   $UserAgent  = $_WORKSPACE[wsUserAgent];   // HTTP_USER_AGENT
   // Подключаем файлы библиотеки прикладных модулей:
   $TPhpPrown=$SiteHost.'/TPhpPrown';
   require_once $TPhpPrown."/TPhpPrown/getTranslit.php";
   require_once $TPhpPrown."/TPhpPrown/MakeUserError.php";
   // Определяем страничные константы
   define ("Script", "vybrat-iz-stroki-podstroku-po-regulyarnomu-vyrazheniyu"); 
   define ("WasTest", "WasTest");   // "Тест уже запускался"
   // Подгружаем рабочие модули
   require_once $SiteRoot."/Common.php";
   require_once $SiteRoot."/iniErrDoorTry.php";
   require_once $SiteRoot."/iniTPhpPrown.php";
   // Определяем, какой передан параметр и верен ли он
   $Parm=getComRequest('list');
   if (IsSet($Parm)) 
   {
      // Если параметр запроса к сайту не соответствует массиву функций 
      // библиотеки, то выдаем сообщение "Страница из библиотеки указана 
      // неверно!"
      if (!isTPhpPrownFunc($Parm,$aTPhpPrown))
      {
         \prown\MakeUserError(InvalidLibraryPage,'DoorTry',$ModeError);
      }
   }
   // Если параметр в запросе не указан, то выводим сообщение "Страница 
   // из библиотеки не указана в параметре!"
   else \prown\MakeUserError(PageLibraryIsNot,'DoorTry',$ModeError);
//}

require_once $_SERVER['DOCUMENT_ROOT']."/TDoorTryer/DoorTryerPage.php";
try 
{
   // Загружаем контент выбранной страницы
   //echo $Parm;
   require_once $SiteRoot."/Pages/TPhpPrown/viewTPhpPrown.php";
}
catch (E_EXCEPTION $e) 
{
   DoorTryPage($e);
}

// <!-- --> ********************************************* dispTPhpPrown.php ***
