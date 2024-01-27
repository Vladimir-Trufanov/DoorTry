<?php
// PHP7/HTML5, EDGE/CHROME                              *** BitofExpert.php ***

// ****************************************************************************
// * Крошки опыта           Кусочки информации о  преодоленных препятствиях в *
// *        программировании всего лишь одного человека. Здесь не представлен *
// *        весь путь: ассемблеры, алгол, фортран, кобол, бэйсик, c, clipper, *
// *        delphi, lazarus, java, PHP, js, apitor, arduino, chto-esche-budet * 
// ****************************************************************************

// v1.5, 27.01.2024                                   Автор:      Труфанов В.Е.
// Copyright © 2024 tve                               Дата создания: 21.01.2024

// Инициализируем массив изображений с шириной 40% для класса CSS: .imgWidth40
// и модифицируем текст страницы
function MakeImgWidth40($FileContent)
{
   $aimwidth40=array
   (
      'Last-step.jpg', 
   );
   $Result=false;
   foreach ($aimwidth40 as $filename) 
   {
      // Отлавливаем изображения с заранее заданной шириной в процентах:
      // <p><img src="../BitofExpert/bifeGitHub/kak-udalit-repozitarij-iz-github/Dashboard.jpg" /></p>
      // <img src="../BitofExpert/bifeGitHub/kak-udalit-repozitarij-iz-github/Last-step.jpg" alt="Уфф! Всё." /><figcaption>Уфф! Всё.</figcaption>
      
      // $regImgs='/\/([0-9a-zA-Z\-]+)\.jpg"/uU';
      $sfilename=quotemeta($filename); // экранировали символы в имени файла
      $regImgs='/\/'.$sfilename.'"/uU';
      $FileContent=preg_replace($regImgs,'/'.$filename.'" class="imgWidth40"',$FileContent);
   }
   return $FileContent;
}
// ****************************************************************************
// *               Переопределить ссылки на все "крошки опыта"                *
// ****************************************************************************
/*
Вид сообщения со страницы 404:
------------------------------
404 Не найдено
Запрашиваемая страница не найдена на сервере
URL: http-s://kwinflatht.nichost.ru/kroshki-opyta/Windows=
%D0%9A%D0%B0%D0%BA%20%D0%B7%D0%B0%D0%BC%D0%B5%D0%BD%D0%B8%D1%82%D1%8C%20%D0%B4%D1%80%D0%B0%D0%B9%D0%B2%D0%B5%D1%80%20%D0%BD%D0%B0%20Windows
---
IP: 178.19.253.110
Браузер: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0
Дата и время сервера: 26.01.2024 18:14:46
Вышли со страницы: https://kwinflatht.nichost.ru/kroshki-opyta/
HTTP_X_FORWARDED_FOR=178.19.253.110

По факту псевдоидентичные URI:
------------------------------
<h4><a href="/kroshki-opyta/Arduino=Инфракрасный пульт на смартфоне для всего"> Инфракрасный пульт на смартфоне для всего</a></h4>
             /kroshki-opyta/Arduino=Инфракрасный%20пульт%20на%20смартфоне%20для%20всего
             /kroshki-opyta/Arduino=%D0%98%D0%BD%D1%84%D1%80%D0%B0%D0%BA%D1%80%D0%B0%D1%81%D0%BD%D1%8B%D0%B9%20%D0%BF%D1%83%D0%BB%D1%8C%D1%82%20%D0%BD%D0%B0%20%D1%81%D0%BC%D0%B0%D1%80%D1%82%D1%84%D0%BE%D0%BD%D0%B5%20%D0%B4%D0%BB%D1%8F%20%D0%B2%D1%81%D0%B5%D0%B3%D0%BE
google       /kroshki-opyta/Arduino=%D0%98%D0%BD%D1%84%D1%80%D0%B0%D0%BA%D1%80%D0%B0%D1%81%D0%BD%D1%8B%D0%B9%20%D0%BF%D1%83%D0%BB%D1%8C%D1%82%20%D0%BD%D0%B0%20%D1%81%D0%BC%D0%B0%D1%80%D1%82%D1%84%D0%BE%D0%BD%D0%B5%20%D0%B4%D0%BB%D1%8F%20%D0%B2%D1%81%D0%B5%D0%B3%D0%BE
яндекс       /kroshki-opyta/Arduino=%D0%98%D0%BD%D1%84%D1%80%D0%B0%D0%BA%D1%80%D0%B0%D1%81%D0%BD%D1%8B%D0%B9%20%D0%BF%D1%83%D0%BB%D1%8C%D1%82%20%D0%BD%D0%B0%20%D1%81%D0%BC%D0%B0%D1%80%D1%82%D1%84%D0%BE%D0%BD%D0%B5%20%D0%B4%D0%BB%D1%8F%20%D0%B2%D1%81%D0%B5%D0%B3%D0%BE

<h4><a href="/kroshki-opyta/Windows=Как заменить драйвер на Windows">           Как заменить драйвер на Windows</a></h4>
             /kroshki-opyta/Windows=Как%20заменить%20драйвер%20на%20Windows
             /kroshki-opyta/Windows=%D0%9A%D0%B0%D0%BA%20%D0%B7%D0%B0%D0%BC%D0%B5%D0%BD%D0%B8%D1%82%D1%8C%20%D0%B4%D1%80%D0%B0%D0%B9%D0%B2%D0%B5%D1%80%20%D0%BD%D0%B0%20Windows

<h4><a href="/kroshki-opyta/GitHub=Как удалить репозитарий из GitHub">          Как удалить репозитарий из GitHub</a></h4>
             /kroshki-opyta/GitHub=Как%20удалить%20репозитарий%20из%20GitHub
             /kroshki-opyta/GitHub=%D0%9A%D0%B0%D0%BA%20%D1%83%D0%B4%D0%B0%D0%BB%D0%B8%D1%82%D1%8C%20%D1%80%D0%B5%D0%BF%D0%BE%D0%B7%D0%B8%D1%82%D0%B0%D1%80%D0%B8%D0%B9%20%D0%B8%D0%B7%20GitHub
*/
function MakeLinks($FileContent)
{
   // Определяем 'нежадное' регулярное выражение для выборки cсылки на страницу .md
   // (далее показаны четыре работающие регулярки и пятая с карманами - для использования)
   //$regArts='/<a\shref="bife[0-9a-zA-Z\.\s\/\-_<>="А-Яа-яЁё]{1,}<\/a>/uU';
   //$regArts='/href="bife[0-9a-zA-Z\.\s\/\-_<>="А-Яа-яЁё]{1,}\.md/uU';
   //$regArts='/href="bife[0-9a-zA-Z\.\s\/\-_<>="А-Яа-яЁё]+\.md"/uU';
   //$regArts='/href="bife([a-zA-Z]+)\/([a-z\-]+)\/[0-9a-zA-Z\.\s\/\-_<>="А-Яа-яЁё]+\.md"/uU';
   $regArts='/href="bife([a-zA-Z]+)\/([a-z\-]+)\/([a-z\-]+)\.md">([0-9a-zA-Z\.\s\/\-_<>="А-Яа-яЁё]+)<\/a>/uU';
   // Заменяем все ссылки на страницы .md (здесь используем два кармана: раздел и название материала)
   if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
   {
      $FileContent=preg_replace($regArts,'href="/kroshki-opyta/$1=$4">$4</a>',$FileContent);
   }
   else
   {
      $FileContent=preg_replace($regArts,'href="?list=kroshki-opyta&par=$1&tit=$4">$4</a>',$FileContent);
   }
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
/*
// Для отладки
$par=prown\getComRequest('par');
if ($par>'')
{
   echo '$par='.$par.'<br>';
}
$tit=prown\getComRequest('tit');
if ($tit>'')
{
   echo '$tit='.$tit.'<br>';
}
*/
// Если требуется загрузка файла темы по ссылке, то
// переопределяем имя файла загрузки темы, путь к файлу и префикс URI 
$par=prown\getComRequest('par');
if ($par>'')
{
   $FileDir=$FileDir.'bife'.$par.'/';
   $urlDir=$urlDir.'bife'.$par.'/';
}
// Получаем имя файла
$tit=prown\getComRequest('tit');
if ($tit>'')
{
   $art=prown\getTranslit($tit);
   $FileDir=$FileDir.$art.'/';
   $urlDir=$urlDir.$art.'/';
   $FileName=$art.'.html';
}
// Определяем спецификацию файла для его загрузки, загружаем его и модифицируем
$FileSpec=$FileDir.$FileName;
$FileContent=ReplaceHtmlExpert($FileSpec,'Крошки опыта');
// Модифицируем вызов имеющихся изображений и меняем заголовок
if (($par>'')||($tit>''))
{
   // В файле .md могут быть показаны изображения след.образом:
   //    <p><img src="probnyj-proekt.jpg" /></p>
   //    <img src="Iwont.jpg" alt="“Да, я хочу удалить свой репозитарий”" />
   $regImgs='/<img\ssrc="/uU';
   $FileContent=preg_replace($regImgs,'<img src="'.$urlDir,$FileContent);
   // Отлавливаем изображения с заранее заданной шириной в прцентах:
   // <p><img src="../BitofExpert/bifeGitHub/kak-udalit-repozitarij-iz-github/Dashboard.jpg" /></p>
   // <img src="../BitofExpert/bifeGitHub/kak-udalit-repozitarij-iz-github/Last-step.jpg" alt="Уфф! Всё." /><figcaption>Уфф! Всё.</figcaption>
   $FileContent=MakeImgWidth40($FileContent);
   // Меняем заголовок страницы <title>Крошки опыта</title>
   $regTit='/<title>([А-Яа-яЁё\s]+)<\/title>/uU';
   $FileContent=preg_replace($regTit,'<title>'.$tit.'</title>',$FileContent);
}
// Вставляем альтернативную ссылку в код:
// <title>Крошки опыта</title>
// <link rel="stylesheet" href="../BitofExpert/BitofExpert.css">
$alternateLink=$SiteProtocol.'://'.$_SERVER['HTTP_HOST'].'/kroshki-opyta/';
if (($par>'')&&($tit>'')) $alternateLink=$alternateLink.$par.'='.$tit;
$regAlt='/<\/title>/uU';
$FileContent=preg_replace($regAlt,
  '</title>'."\r  ".
  '<link rel="alternate" hreflang="ru" href="'.$alternateLink.'" />',
  $FileContent);
// Выводим затребованную страницу темы BitofExpert
echo $FileContent;

// ******************************************************** BitofExpert.php ***

