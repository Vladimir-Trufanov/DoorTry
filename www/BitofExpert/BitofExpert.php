<?php
// PHP7/HTML5, EDGE/CHROME                              *** BitofExpert.php ***

// ****************************************************************************
// * Крошки опыта           Кусочки информации о  преодоленных препятствиях в *
// *        программировании всего лишь одного человека. Здесь не представлен *
// *        весь путь: ассемблеры, алгол, фортран, кобол, бэйсик, c, clipper, *
// *        delphi, lazarus, java, PHP, js, apitor, arduino, chto-esche-budet * 
// ****************************************************************************

// v1.3, 25.01.2024                                   Автор:      Труфанов В.Е.
// Copyright © 2024 tve                               Дата создания: 21.01.2024

// ****************************************************************************
// *               Переопределить ссылки на все "крошки опыта"                *
// ****************************************************************************
function MakeLinks($FileContent)
{
   // Определяем 'нежадное' регулярное выражение для выборки cсылки на страницу .md
   // (далее показаны четыре работающие регулярки и пятая с карманами - для использования)
   //$regArts='/<a\shref="bife[0-9a-zA-Z\.\s\/\-_<>="А-Яа-яЁё]{1,}<\/a>/uU';
   //$regArts='/href="bife[0-9a-zA-Z\.\s\/\-_<>="А-Яа-яЁё]{1,}\.md/uU';
   //$regArts='/href="bife[0-9a-zA-Z\.\s\/\-_<>="А-Яа-яЁё]+\.md"/uU';
   //$regArts='/href="bife([a-zA-Z]+)\/([a-z\-]+)\/[0-9a-zA-Z\.\s\/\-_<>="А-Яа-яЁё]+\.md"/uU';
   $regArts='/href="bife([a-zA-Z]+)\/([a-z\-]+)\/([a-z\-]+)\.md">([0-9a-zA-Z\.\s\/\-_<>="А-Яа-яЁё]+)<\/a>/uU';
   // Заменяем все ссылки на страницы .md (здесь используем два кармана)
   $FileContent=preg_replace($regArts,'href="?list=kroshki-opyta&par=$1&art=$2&tit=$4">$4</a>',$FileContent);
   return $FileContent;
}
// ****************************************************************************
// *   Модифицировать файл темы "крошки опыта" для показа как html-страница   *
// ****************************************************************************
function ReplaceHtmlExpert($FileSpec,$Title,$BitofExpertCSS='<link rel="stylesheet" href="../BitofExpert/BitofExpert.css">')
{
   // Загружаем файл html
   $FileContent=file_get_contents($FileSpec);
   // Убираем все строки стиля и вставляем ссылку на файл CSS-стилей
   $begreg='<style';
   $endreg='\/style>';
   $FileContent=prown\Replaces($begreg,$FileContent,$endreg,$BitofExpertCSS);
   // Вставляем начало общего окна HTML "kroshki-opyta"
   $winKroshkiOpyta='/head>'.'<body>'.'<div id="kroshki-opyta">';
   $begreg='\/head>';
   $endreg='<body>';
   $FileContent=prown\Replaces($begreg,$FileContent,$endreg,$winKroshkiOpyta);
   // Вставляем завершение общего окна HTML "kroshki-opyta"
   $winKroshkiOpyta='</div>'.'</body>'.'</html>';
   $begreg='<\/body>';
   $endreg='<\/html>';
   $FileContent=prown\Replaces($begreg,$FileContent,$endreg,$winKroshkiOpyta);
   // Меняем заголовок страницы
   $winKroshkiOpyta='<title>'.$Title.'</title>';
   $begreg='<title>';
   $endreg='<\/title>';
   $FileContent=prown\Replaces($begreg,$FileContent,$endreg,$winKroshkiOpyta);
   $FileContent=MakeLinks($FileContent);
   return $FileContent;
}

/*
// Подключаем особенности стиля для компьютерной и мобильной версий
if ($SiteDevice==Mobile) 
{   
   //echo '<link href="/Styles/TPhpPrownMobi.css" rel="stylesheet">';
}
else 
{   
   //echo '<link href="/Styles/TPhpPrownComp.css" rel="stylesheet">';
}
*/

// Инициируем имя файла загрузки темы, путь к файлу и префикс URI 
$FileName='BitofExpert.html';
$FileDir=$SiteRoot.'/BitofExpert/';
$urlDir='../BitofExpert/';
// Если требуется загрузка файла темы по ссылке, то
// переопределяем имя файла загрузки темы, путь к файлу и префикс URI 
$par=prown\getComRequest('par');
if ($par>'')
{
   $FileDir=$FileDir.'bife'.$par.'/';
   $urlDir=$urlDir.'bife'.$par.'/';
}
$art=prown\getComRequest('art');
if ($art>'')
{
   $FileDir=$FileDir.$art.'/';
   $urlDir=$urlDir.$art.'/';
   $FileName=$art.'.html';
}
// Определяем спецификацию файла для его загрузки,
// загружаем его и модифицируем
$FileSpec=$FileDir.$FileName;
$FileContent=ReplaceHtmlExpert($FileSpec,'Крошки опыта');
// Модифицируем вызов имеющихся изображений и меняем заголовок
if (($par>'')||($art>''))
{
   echo ('$urlDir='.$urlDir.'<br><br>');
   // В файле .md могут быть показаны изображения след.образом:
   //    <p><img src="probnyj-proekt.jpg" /></p>
   //    <img src="Iwont.jpg" alt="“Да, я хочу удалить свой репозитарий”" />
   $regImgs='/<img\ssrc="/uU';
   $FileContent=preg_replace($regImgs,'<img src="'.$urlDir,$FileContent);
   // Меняем заголовок страницы
   $tit=prown\getComRequest('tit');
   if ($tit>'')
   {
      //<title>Крошки опыта</title>
      $regTit='/<title>([А-Яа-яЁё\s]+)<\/title>/uU';
      $FileContent=preg_replace($regTit,'<title>'.$tit.'</title>'.$urlDir,$FileContent);
   }
}
// Выводим затребованную страницу темы BitofExpert
// prown\ConsoleLog($urltxt);
echo $urltxt.'<br>';
echo $FileContent;

// ******************************************************** BitofExpert.php ***

