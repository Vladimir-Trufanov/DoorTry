<?php
// PHP7                                              *** _viewTPhpPrown.php ***

// ****************************************************************************
// * DoorTry-TPhpPrown         Вывод в браузер управляемой страницы TPhpPrown *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  07.12.2019
// Copyright © 2019 tve                              Посл.изменение: 02.04.2020

// Если подключается страница о MakeCookie, то инициализируем сессионную 
// переменную для возможного теста MakeCookie
// и делаем подготовку текущего прохода этого теста
/*
if (FuncName=='MakeCookie') 
{
   if (!IsSet($_COOKIE['WasTest']))
   {
      MakeCookieTest(entryDoorTry);
   }
}
*/
// Выводим разметку страницы
echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';
echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
SeoTags();
// Подключаем jquery/jquery-ui
echo '<link rel="stylesheet" type="text/css" '. 
     'href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">';
echo '<script '.
     'src="https://code.jquery.com/jquery-3.3.1.min.js" '.
     'integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" '.
     'crossorigin="anonymous">'.
     '</script>';
echo '<script '.
     'src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" '.
     'integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" '.
     'crossorigin="anonymous">'.
     '</script>';
// Подключаем JS-библиотеки
echo '<script src="/JS/DoorTry.js"></script>';
echo '<link href="/TJsPrown/TJsPrown.css" rel="stylesheet" type="text/css">'; 
echo '<script src="/TJsPrown/TJsPrown.js"></script>';
// Обеспечиваем двойной скролл для кода;
echo '<script src="/JS/jquery.doubleScroll.js"></script>';
// Подключаем особенности стиля для компьютерной и мобильной версий
if ($SiteDevice==Mobile) 
{   
   echo '<link href="/Styles/TPhpPrownMobi.css" rel="stylesheet">';
}
else 
{   
   echo '<link href="/Styles/TPhpPrownComp.css" rel="stylesheet">';
}
echo '</head>';
echo '<body>';
echo '<div class="TPhpPrown">';
DescriptPart();
echo '</div>';
// Завершаем страницу, если выводится только описательная часть
if (FuncName=="No")
{
   echo '</body>'; echo '</html>';
} 
// В большинстве случаев, когда страница посвящена конкретной функции,
// выводим код функции и тест её
else
{ 
   // Загружаем в страницу код функции
   echo '<div class="CodeText">';
   CodePart($TPhpPrown,FuncName.'.php',Pattern,Replacement);
   echo '</div>';
   // В компьютерной версии даем возможность запускать тест
   if ($SiteDevice==Computer) 
   {
      $Testing=Testing;
      if  ($Testing=="Yes") TestPart($SiteHost,$Parm);
      else {echo '</body>'; echo '</html>';}
   }
   else
   {
      echo '</body>'; echo '</html>';
   }
}
// <!-- --> ******************************************** _viewTPhpPrown.php ***
