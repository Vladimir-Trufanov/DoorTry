<?php
// PHP7/HTML5, EDGE/CHROME                              *** ConnHandler.php ***

// ****************************************************************************
// * doortry.ru                       Подключить обработчик ошибок/исключений *
// *                                                 - главный материал сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 02.08.2019

// Переадресация страницы:
// 'Podklyuchit-obrabotchik-oshibok-isklyucheniy'='index.php?Com=ConnHandler'

function SeoTags()
{
    echo "<title>Подключение обработчика ошибок/исключений</title>";
    echo "<meta name=\"description\" content=\"Сайт используется для обработки ошибок/исключений и их комментирования в PHP5-PHP7. Показан способ для подключения этой возможности к Вашим сайтам.\">";
    echo "<meta name=\"keywords\" content=\"универсальная обработка ошибок и исключений PHP5-7, принцип DO-or-TRY, Делай или Пробуй\">";
}

function MakeH1()
{
    echo "<h1>Подключить обработчик ошибок/исключений - Connect error/exception handler</h1>";
}

function PageContent()
{
   $Result = true;
   ?>
   <br>
   <p>
   Для подключения обработчика ошибок/исключений к сайтам следует выполнить несколько шагов:
   </p>
   <p>
   1 шаг. Включить в стартовый файл сайта, например index.php, собственно вызов обработчика.
   </p>
   <p>
   
   
// PHP7/HTML5, EDGE/CHROME                                    *** index.php ***

// ****************************************************************************
// * doortry.ru    Сайт сбора сообщений об ошибках/исключениях и формирования *
// *         страницы с выводом сообщений, а также комментариев для PHP5-PHP7 *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  09.04.2019
// Copyright © 2019 tve                              Посл.изменение: 10.05.2019

// Инициализируем корневой каталог сайта
$SiteRoot=$_SERVER['DOCUMENT_ROOT'];
// Подключаем сайт сбора сообщений об ошибках/исключениях и формирования 
// страницы с выводом сообщений, а также комментариев для PHP5-PHP7
require_once $SiteRoot."/TDoorTryer/DoorTryerPage.php";

try 
{
   // Запускаем сценарий сайта
   require_once $SiteRoot."/Main.php";
   // Запускаем примеры ошибок и исключений
   //require_once $SiteRoot."/MainDoorTry.php";
}
catch (E_EXCEPTION $e) 
{
   // Подключаем обработку исключений верхнего уровня
   DoorTryPage($e);
}
// ************************************************************** index.php ***
    </p>
   <p>Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor. Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. </p>
   <h3><img src="imgs/jellyfish.jpg" alt="Медуза" class="half left">Подзаголовок</h3>
   <p>Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor. Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. </p>
   <p>Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor. Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor. Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tortor. Suspendisse vitae quam lorem, in tempus velit. Sed vitae ante quis felis fringilla condimentum. Aenean orci ante, venenatis non adipiscing vitae, fringilla et neque. In pharetra, eros imperdiet luctus imperdiet, nunc sem pharetra mi, vel faucibus elit risus id tor</p>
   <?php
   return $Result;
}
// <!-- --> *********************************************** ConnHandler.php ***
