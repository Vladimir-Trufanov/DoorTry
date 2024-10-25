<?php
// PHP7/HTML5, EDGE/CHROME                              *** BitofExpert.php ***

// ****************************************************************************
// * Крошки опыта           Кусочки информации о  преодоленных препятствиях в *
// *        программировании всего лишь одного человека. Здесь не представлен *
// *        весь путь: ассемблеры, алгол, фортран, кобол, бэйсик, c, clipper, *
// *        delphi, lazarus, java, PHP, js, apitor, arduino, chto-esche-budet * 
// ****************************************************************************

// v1.22, 17.10.2024                                  Автор:      Труфанов В.Е.
// Copyright © 2024 tve                               Дата создания: 29.02.2024

/**
 *  Замечания по парсингу файла HTML из MD (экспорт в ghostwriter 2.2.0)
 *  
 *  1. Экспорт формате Pandoc и *-"Умная типография".
 *  2. $regArts1 - регулярка для файла ".md" (в BitofExpert.html), которая подменяет
 *     вызов файла на url-запрос (по разному для local-сервера и реального сайта)
 *  3. $regImgs1 - регулярка для большинства изображений. По умолчанию все изображения
 *     в md-файлах локальные, размещаются в каталоге md-файла или в его подкаталогах. 
 *     $regImgs1 - подвешивает к имени файла изображения полный локальный путь.
 *  4. $regXml - все заголовки 'h4' со ссылками на файлы *.xml
 *  5. $regNXml - экранированные заголовки 'h4' со ссылками на файлы *.xml
 * 
 */

// При необходимости, включаем режим отладки 
define ("isDebug","iyes");

// Инициируем имя файла загрузки темы, путь к файлу и префикс URI 
$FileName='BitofExpert.html';
$FileDir=$SiteRoot.'/BitofExpert/';
$urlDir='../BitofExpert/';
// Извлекаем параметры
$par=prown\getComRequest('par');
$tit=prown\getComRequest('tit');

// Если отладка, то в начале страницы подвешиваем параметры
if (isDebug=="yes")
{
   if ($par>'') echo '$par='.$par.'<br>';
   if ($tit>'') echo '$tit='.$tit.'<br>';
}
// Комплектуем содержимое страницы
$FileContent=SetOfContent($par,$tit,$FileDir,$urlDir,$FileName,$SiteProtocol,$SiteRoot);
// Выводим затребованную страницу темы BitofExpert
echo $FileContent;

// Трассируем xml-файлы
// echo (highlight_xml('C:\DoorTry\www/BitofExpert/bifeFritzing/predstavlenie-detali-komponenta-vo-fritzing/LCD-FM-RX-V2.0.xml'));
// echo '-------------------------------------------------------------------------------------------------------------<br>';
// echo (highlight_xml('C:\DoorTry\www/BitofExpert/bifeFritzing/predstavlenie-detali-komponenta-vo-fritzing/sitemap.xml'));

// ****************************************************************************
// *                        Собрать содержимое страницы                       *
// ****************************************************************************
function SetOfContent($par,$tit,$FileDir,$urlDir,$FileName,$SiteProtocol,$SiteRoot) 
{
   // Если требуется загрузка файла темы по ссылке, то
   // переопределяем имя файла загрузки темы, путь к файлу и префикс URI 
   if ($par>'')
   {
      $FileDir=$FileDir.'bife'.$par.'/';
      $urlDir=$urlDir.'bife'.$par.'/';
   }
   // Получаем имя файла
   if ($tit>'')
   {
      $art=prown\getTranslit($tit);
      $FileDir=$FileDir.$art.'/';
      $urlDir=$urlDir.$art.'/';
      $FileName=$art.'.html';
      // Если отладка, то покажем имя загружаемой страницы
      if (isDebug=="yes") echo '$FileName='.$FileName.'<br>';
   }
   // Инициируем имена xml-файлов, файлов-ino для показа
   $FileXml=''; $FileIno='';
   // Определяем спецификацию файла текущей страницы для загрузки, 
   // загружаем его и модифицируем
   $FileSpec=$FileDir.$FileName;
   $FileContent=ReplaceHtmlExpert($FileSpec,'Крошки опыта');
   // Модифицируем вызов имеющихся изображений, XML-файлов и меняем заголовок
   if (($par>'')||($tit>''))
   {
      // В файле .md могут быть показаны видео след.образом:
      //    <video src="GalaxyS4-Pult.mp4" width="640" type="video/mp4" controls>
      // или
      //    <iframe src="https://vk.com/video_ext.php?oid=41932239&id=456239392&hash=ad25d1a9c868b9d8" width="640" height="360" frameborder="0" allowfullscreen="1" allow="autoplay; encrypted-media; fullscreen; picture-in-picture"></iframe>
      $regImgs1='/<video\ssrc="/uU';
      $FileContent=preg_replace($regImgs1,'<video src="'.$urlDir,$FileContent);
      // В файле .md могут быть показаны изображения след.образом:
      // <video src="GalaxyS4-Pult.mp4" width="640" type="video/mp4" controls poster="poster-pult.jpg">
      $regImgs1='/\sposter="/uU';
      $FileContent=preg_replace($regImgs1,' poster="'.$urlDir,$FileContent);
      // В файле .md могут быть показаны изображения след.образом:
      //    <p><img src="probnyj-proekt.jpg" /></p>
      //    <img src="Iwont.jpg" alt="“Да, я хочу удалить свой репозитарий”" />
      $regImgs1='/<img\ssrc="/uU';
      $FileContent=preg_replace($regImgs1,'<img src="'.$urlDir,$FileContent);
      // Отлавливаем изображения с заранее заданной шириной в процентах:
      // <p><img src="../BitofExpert/bifeGitHub/kak-udalit-repozitarij-iz-github/Dashboard.jpg" /></p>
      // <img src="../BitofExpert/bifeGitHub/kak-udalit-repozitarij-iz-github/Last-step.jpg" alt="Уфф! Всё." /><figcaption>Уфф! Всё.</figcaption>
      $FileContent=MakeImgWidth40($FileContent);
      // Отлавливаем изображения для деталей Fritzing 
      //$FileContent=MakeImgFritzing($FileContent);
      // В файле .md могут быть ссылки на локальные XML-файлы, INO-файлы след.образом:
      //    <a href=             "LCD-FM-RX-V2.0.xml">Примерный общий вид файла FZP</a>
      //    <a href="MakeProntoHEX/MakeProntoHEX.ino">Скетч для подбора кодов MakeProntoHEX</a>
      // Делаем ссылку с относительным адресом файла
      $regXml1='/<a\shref="([a-zA-Z0-9\-\.\/]+)\.xml">/uU';
      $FileContent=preg_replace($regXml1,'<a href="'.$urlDir.'$1.xml">',$FileContent);
      $regXml1='/<a\shref="([a-zA-Z0-9\-\.\/]+)\.ino">/uU';
      $FileContent=preg_replace($regXml1,'<a href="'.$urlDir.'$1.ino">',$FileContent);
      // Показываем все xml-файлы по найденным ссылкам
      $FileContent=ReplaceHrefXml($FileContent,$SiteRoot);
      // Показываем все ino-файлы по найденным ссылкам
      $FileContent=ReplaceHrefExt($FileContent,$SiteRoot);
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
   return $FileContent;
} 
// ****************************************************************************
// *           Инициализировать массив изображений с заданной шириной         *
// *             (по умолчанию 40%) и модифицировать текст страницы           *
// ****************************************************************************
function MakeImgWidth40($FileContent)
{
   $aimwidth43=array
   (
      'Last-step.jpg', 
      'LCD-FM-RX-V2.0.jpg', 
   );
   $FileContent=MakeImgWidth($FileContent,43,$aimwidth43);
   
   $aimwidth31=array
   (
      'Battery3AA-A.jpg',
      'CP2102-USB-UART.jpg',
      'IRFZ24N.jpg', 
      'USB-TTL_UART.jpg', 
   );
   $FileContent=MakeImgWidth($FileContent,31,$aimwidth31);
   return $FileContent;
}
function MakeImgWidth($FileContent,$Percent,$aimwidth)
{
   $Result=$FileContent;
   foreach ($aimwidth as $filename) 
   {
      // Отлавливаем изображения с заранее заданной шириной в процентах:
      // <p><img src="../BitofExpert/bifeGitHub/kak-udalit-repozitarij-iz-github/Dashboard.jpg" /></p>
      // <img src="../BitofExpert/bifeGitHub/kak-udalit-repozitarij-iz-github/Last-step.jpg" alt="Уфф! Всё." /><figcaption>Уфф! Всё.</figcaption>
      $sfilename=quotemeta($filename); // экранировали символы в имени файла
      $regImgs2='/\/'.$sfilename.'"/uU';
      $FileContent=preg_replace($regImgs2,'/'.$filename.'" class="imgWidth40" style="width:'.$Percent.'%"',$FileContent);
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
   $regArts1='/href="bife([a-zA-Z0-9]+)\/([a-z0-9\-_]+)\/([a-z0-9\-_]+)\.md">([0-9a-zA-Z\.\(\)\s\/\-_<>,="А-Яа-яЁё]+)<\/a>/uU';
   // Заменяем все ссылки на страницы .md (здесь используем два кармана: раздел и название материала)
   if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
   {
      // Устаревший формат - вызов с 1 и 4 карманом
      // $FileContent=preg_replace($regArts1,'href="/kroshki-opyta/$1=$4">$4</a>',$FileContent);

      // Текущий формат - вызов с 1 и 2 карманом (kroshki-opyta/$1=$2)
      $FileContent=preg_replace($regArts1,'href="/kroshki-opyta/$1=$2">$4</a>',$FileContent);
   }
   else
   {
      // Устаревший формат, когда 2 параметр был на русском (после лета 2024 страницы перестали загружаться) 
      // $FileContent=preg_replace($regArts1,'href="?list=kroshki-opyta&par=$1&tit=$4">$4</a>',$FileContent);
      
      // Текущий формат, 2 параметр - моя транслитерация
      $FileContent=preg_replace($regArts1,'href="?list=kroshki-opyta&par=$1&tit=$2">$4</a>',$FileContent);
   }
   // Определяем регулярное выражение для взаимных ссылок между материалами в BitofExpert
   //$regArts1='/href="          bife([a-zA-Z]+)\/([a-z\-]+)\/([a-z\-]+)\.md">([0-9a-zA-Z\.\(\)\s\/\-_<>,="А-Яа-яЁё]+)<\/a>/uU';
   $regArts2='/href="\.\.\/\.\.\/bife([a-zA-Z]+)\/([a-z\-_]+)\/([a-z\-_]+)\.md">([0-9a-zA-Z\.\(\)\s\/\-_<>,="А-Яа-яЁё]+)<\/a>/uU';
   // Заменяем все ссылки на страницы .md (здесь используем два кармана: раздел и название материала)
   if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
   {
      $FileContent=preg_replace($regArts2,'href="/kroshki-opyta/$1=$2">$4</a>',$FileContent);
   }
   else
   {
      $FileContent=preg_replace($regArts2,'href="?list=kroshki-opyta&par=$1&tit=$4">$4</a>',$FileContent);
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
// ****************************************************************************
// *                  Показать все xml-файлы по найденным ссылкам             *
// ****************************************************************************
function ReplaceHrefXml($FileContent,$SiteRoot,$hteg='h4')
{
   // Находим все заголовки 'h4' со ссылками на файлы *.xml
   $regXml='/<'.$hteg.'\s(.*)\.xml">(.*)<\/a><\/'.$hteg.'>/uU';
   
   $value=preg_match_all($regXml,$FileContent,$matches,PREG_OFFSET_CAPTURE);
   if ($value>0)
   { 
      $af=$matches[0];
      // Выделяем все заголовки 'h4' со ссылками на файлы *.xml
      foreach ($af as $matches2)
      {
         $afNames[]=$matches2[0];
      }
      // Проходим по выбранным ссылкам на xml-файлы  
      foreach ($afNames as $NameXml)
      {
         // Определяем имя xml-файла для показа
         $regNXml='/href="\.\.(.*\.xml)/uU';
         $regNXml=prown\Findes($regNXml,$NameXml);
         $FileXml=$SiteRoot.substr($regNXml,8); 
         // Выделяем заголовок
         $regNXml='/xml">(.*)<\/a>/uU';
         $regNXml=prown\Findes($regNXml,$NameXml);
         $TitleXml=substr($regNXml,5);
         $TitleXml=substr($TitleXml,0,strlen($TitleXml)-4);
         // Формируем рег.выражение (экранируем)
         $regNXml='/'.preg_quote($NameXml,'/').'/uU';
         //echo '$NameXml='.$NameXml.'<br>';
         //echo '$FileXml='.$FileXml.'<br>';
         //echo '$TitleXml='.$TitleXml.'<br>';
         //echo '$regNXml='.$regNXml.'<br>';

         // Примеры заголовков со ссылками на xml-файлы для их вывода на экран браузера
         // <h4 id="sitemapfzp">                   <a href="sitemap.xml">       Примерный SITEMAP            </a></h4>
         // <h4 id="примерный-общий-вид-файла-fzp"><a href="LCD-FM-RX-V2.0.xml">Примерный общий вид файла FZP</a></h4>

         // Примеры заголовков с подставленными ссылками на xml-файлы с явным путем в BitofExpert
         // <h4 id="sitemapfzp">                   <a href="../BitofExpert/bifeFritzing/predstavlenie-detali-komponenta-vo-fritzing/       sitemap.xml">Примерный SITEMAP</a></h4>
         // <h4 id="примерный-общий-вид-файла-fzp"><a href="../BitofExpert/bifeFritzing/predstavlenie-detali-komponenta-vo-fritzing/LCD-FM-RX-V2.0.xml">Примерный общий вид файла FZP</a></h4>

         // Примеры экранированных заголовков с подставленными ссылками на xml-файлы для регулярного выражения
         // /\<h4 id\="примерный\-общий\-вид\-файла\-fzp"\> \<a href\="\.\.\/BitofExpert\/bifeFritzing\/predstavlenie\-detali\-komponenta\-vo\-fritzing\/ LCD\-FM\-RX\-V2\.0\.xml"\> Примерный общий вид файла FZP \<\/a\>\<\/h4\>/uU<br>
         // /\<h4 id\="sitemapfzp"\>                        \<a href\="\.\.\/BitofExpert\/bifeFritzing\/predstavlenie\-detali\-komponenta\-vo\-fritzing\/            sitemap\.xml"\> Примерный SITEMAP             \<\/a\>\<\/h4\>/uU<br>

         // Подставляем вместо ссылки на xml-файл заголовок и явный вывод расцвеченного файла
         $FileContent=preg_replace($regNXml,'<'.$hteg.'>'.$TitleXml.'</'.$hteg.'>'.highlight_xml($FileXml),$FileContent);
      }
   }
   return $FileContent;
}
// ****************************************************************************
// *                  Из XML-файла получить раскрашенный текст                *
// ****************************************************************************
function highlight_xml($FileName)
{
   $FileContent=file_get_contents($FileName);
   $FileCode=highlight_string($FileContent,true);
   
   // Вырезаем верхний и единственный SPAN: <span style="color: #000000"> и </span>, 
   // которые появились после работы highlight_string()
   $FileCode=preg_replace("~<code><span.*>~iU",'',$FileCode);
   $FileCode=preg_replace("~<\/span>~iU",'',$FileCode);
   $FileCode=preg_replace("~<\/code>~iU",'',$FileCode);

   $cRU="абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ";

   // Окрашиваем двухкомпонентные строки c тегами:
   // &lt;author&gt;Vladimir&nbsp;Trufanov&lt;/author&gt; 
   $FileCode=preg_replace("~&lt;([a-zA-Z0-9]+)&gt;([a-zA-Z0-9&;:/\-\.]+)&lt;([/a-zA-Z0-9]+)&gt;~iU",
      '&lt;$1&gt;<span style="color:Blue">$2</span>&lt;$3&gt;',
      $FileCode);

   // Окрашиваем трехкомпонентные строки c тегами:
   // &lt; property&nbsp;name="family" &gt; FM&nbsp;radio                      &lt; /property &gt;
   // &lt; property&nbsp;name="прием"  &gt; 87,0&nbsp;МГц-108,0&nbsp;МГц&nbsp; &lt; /property &gt;
   $FileCode=preg_replace(
      "~&lt;([a-zA-Z0-9".$cRU."&;:<>\s=\"/]+)&gt;([a-zA-Z0-9".$cRU."&;:\,/\-\.]+)&lt;([/a-zA-Z0-9]+)&gt;~U",
      '&lt;$1&gt;<span style="color:DarkSlateGray">$2</span>&lt;$3&gt;',
      $FileCode);
   
   // Окрашиваем двухкомпонентные строки без тегов:
   //    fritzingVersion="0.3.15b.02.03.3943" 
   //    moduleId="LCD-FM-RX-V2.0_52aa9f163650adf1bd33aebd1592fa04_1" 
   //    name="прием"
   $FileCode=preg_replace("~([a-zA-Z0-9\.]+)=\"([a-zA-Z0-9".$cRU."\.\-&;_]+)\"~iU",
      '<span style="color:LightSeaGreen">$1</span>="<span style="color:Blue">$2</span>"',
      $FileCode);
   
   // Окрашиваем комментарии
   // <!--         Файл метаданных компонента (детали) .fzp                          -->
   // &lt;!--&nbsp;Файл&nbsp;метаданных&nbsp;компонента&nbsp;(детали)&nbsp;.fzp&nbsp;--&gt;
   $FileCode=preg_replace("~&lt;!--(.*)--&gt;~iU", '&lt;!--<span style="color:Green">$1</span>--&gt;',$FileCode);
   
   // Окрашиваем xml version
   // &lt;?xml&nbsp;version='1.0'&nbsp;encoding='UTF-8'?&gt;
   $FileCode=preg_replace("~&lt;\?xml.*\?&gt;~iU", '<span style="color:#FF8000">$0</span>',$FileCode);
   
   // Окрашиваем защищенный комментарий
   $FileCode=preg_replace("~&lt;description&gt;.*&lt;/description&gt;~iU",'<span style="color:Chocolate">$0</span>',$FileCode);

   $FileCode=
      '<div style="color:Purple;background:Azure;font-size:1.4rem;'.
      'font-weight:bold;overflow-x:auto;">'.$FileCode.'</div>';
   return $FileCode;
}

// ****************************************************************************
// *     Показать все ino-файлы (то есть с заданным расширением) по найденным *
// * ссылкам.        !!! В ПУТИ ФАЙЛА НЕ ДОЛЖНО БЫТЬ ЗНАКОВ ПОДЧЕРКИВАНИЯ "_" *
// ****************************************************************************
function ReplaceHrefExt($FileContent,$SiteRoot,$hteg='h4',$ext='ino')
{
   // Находим все заголовки 'h4' со ссылками на файлы с заданным расширением
   // <h4 id="скетч-для-подбора-кодов-makeprontohex"><a href="MakeProntoHEX/MakeProntoHEX.ino">Скетч для подбора кодов MakeProntoHEX</a></h4>
   $regXml='/<'.$hteg.'\s(.*)\.'.$ext.'">(.*)<\/a><\/'.$hteg.'>/uU';
   if (isDebug=="yes") echo '$regXml: '.$regXml.'<br>';
   $value=preg_match_all($regXml,$FileContent,$matches,PREG_OFFSET_CAPTURE);
   if ($value>0)
   { 
      $af=$matches[0];
      // Выделяем все заголовки 'h4' со ссылками на файлы .$ext
      foreach ($af as $matches2)
      {
         $afNames[]=$matches2[0];
      }
      // Проходим по выбранным ссылкам на xml-файлы  
      foreach ($afNames as $NameXml)
      {
         // Если отладка, то показываем имя загружаемой страницы
         if (isDebug=="yes") echo '---------------------<br>';
         if (isDebug=="yes") echo '$NameXml='.$NameXml.'<br>';
         // Выделяем идентификатор заголовка (при отладке показываем)
         $idhteg='/id="(.*'.'"'.')/uU';
         $idhteg=prown\Findes($idhteg,$NameXml);
         if (isDebug=="yes") echo '$idhteg: '.$idhteg.'<br>';

         // Определяем имя xml-файла для показа (при отладке показываем)
         $regNXml='/href="\.\.(.*\.'.$ext.')/uU';
         if (isDebug=="yes") echo '$regNXml1: '.$regNXml.'<br>';
         $regNXml=prown\Findes($regNXml,$NameXml);
         if (isDebug=="yes") echo '$regNXml2: '.$regNXml.'<br>';
        
         // Формируем имя файла с путем
         $FileXml=$SiteRoot.substr($regNXml,8); 
         if (isDebug=="yes") echo '$FileXml: '.$FileXml.'<br>';
         // Выделяем заголовок
         $regNXml='/'.$ext.'">(.*)<\/a>/uU';
         $regNXml=prown\Findes($regNXml,$NameXml);
         $TitleXml=substr($regNXml,5);
         $TitleXml=substr($TitleXml,0,strlen($TitleXml)-4);
         // Формируем рег.выражение (экранируем)
         $regNXml='/'.preg_quote($NameXml,'/').'/uU';
         if (isDebug=="yes") echo '$regNXml: '.$regNXml.'<br>';
 
         // Примеры заголовков со ссылками на xml-файлы для их вывода на экран браузера
         // <h4 id="sitemapfzp">                   <a href="sitemap.xml">       Примерный SITEMAP            </a></h4>
         // <h4 id="примерный-общий-вид-файла-fzp"><a href="LCD-FM-RX-V2.0.xml">Примерный общий вид файла FZP</a></h4>

         // Примеры заголовков с подставленными ссылками на xml-файлы с явным путем в BitofExpert
         // <h4 id="sitemapfzp">                   <a href="../BitofExpert/bifeFritzing/predstavlenie-detali-komponenta-vo-fritzing/       sitemap.xml">Примерный SITEMAP</a></h4>
         // <h4 id="примерный-общий-вид-файла-fzp"><a href="../BitofExpert/bifeFritzing/predstavlenie-detali-komponenta-vo-fritzing/LCD-FM-RX-V2.0.xml">Примерный общий вид файла FZP</a></h4>

         // Примеры экранированных заголовков с подставленными ссылками на xml-файлы для регулярного выражения
         // /\<h4 id\="примерный\-общий\-вид\-файла\-fzp"\> \<a href\="\.\.\/BitofExpert\/bifeFritzing\/predstavlenie\-detali\-komponenta\-vo\-fritzing\/ LCD\-FM\-RX\-V2\.0\.xml"\> Примерный общий вид файла FZP \<\/a\>\<\/h4\>/uU<br>
         // /\<h4 id\="sitemapfzp"\>                        \<a href\="\.\.\/BitofExpert\/bifeFritzing\/predstavlenie\-detali\-komponenta\-vo\-fritzing\/            sitemap\.xml"\> Примерный SITEMAP             \<\/a\>\<\/h4\>/uU<br>

         // Подставляем вместо ссылки на xml-файл заголовок и явный вывод расцвеченного файла
         if ($ext=='ino') 
           $FileContent=preg_replace($regNXml,'<'.$hteg.' '.$idhteg.'>'.$TitleXml.'</'.$hteg.'>'.highlight_ino($FileXml),$FileContent);
           //$FileContent=preg_replace($regNXml,'<'.$hteg.' '.$idhteg.'>'.$TitleXml.'</'.$hteg.'>'.'167',$FileContent);
         else 
           $FileContent=preg_replace($regNXml,'<'.$hteg.'>'.$TitleXml.'</'.$hteg.'>',$FileContent);
      }
   }
   return $FileContent;
}

// ****************************************************************************
// *                  Из INO-файла получить раскрашенный текст                *
// ****************************************************************************
function highlight_ino($FileName)
{
   $FileContent=file_get_contents($FileName);
   $FileCode=highlight_string($FileContent,true);
   
   // Вырезаем верхний и единственный SPAN: <span style="color: #000000"> и </span>, 
   // которые появились после работы highlight_string()
   $FileCode=preg_replace("~<code><span.*>~iU",'',$FileCode);
   $FileCode=preg_replace("~<\/span>~iU",'',$FileCode);
   $FileCode=preg_replace("~<\/code>~iU",'',$FileCode);

   $cRU="абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ";

   // Окрашиваем цифры с точкой между круглыми скобками в синий цвет:
   //      delay(4000);
   $FileCode=preg_replace("~\(([0-9\.\-\+]+)\)~iU",
      '<span style="color:Blue">($1)</span>',
      $FileCode);
   
   // Окрашиваем между кавычками в коричневый цвет:
   // Serial.print(F("Датчик готов к приему ИК-сигналов протоколов:\r\n"));
   $FileCode=preg_replace("~\"([a-zA-Z0-9".$cRU."\.\-=&;_]+)\"~iU",
      '<span style="color:SaddleBrown">"$1"</span>',
      $FileCode);

   // Окрашиваем комментарии
   //   /*
   //   <br />&nbsp;*&nbsp;MakeProntoHEX.cpp
   //   <br />&nbsp;*
   //   <br />&nbsp;*******************************************************************************
   //   <br />&nbsp;
   //   */
   $FileCode=preg_replace("~\/\*(.*)\*\/~iU", '<span style="color:Green">/*$1*/</span>',$FileCode);
   // Окрашиваем комментарии
   //   <br />//&nbsp;Пример&nbsp;места&nbsp;размещения&nbsp;arduino.h
   //   <br />//&nbsp;C:/Users/Евгеньевич/AppData/Local/Arduino15/packages/arduino/hardware/avr/1.8.6/cores/arduino/Arduino.h
   $FileCode=preg_replace("~\/\/(.*)<br\s/>~iU", '<span style="color:Green">//$1</span><br />',$FileCode);
   
   $FileCode='<code>'.$FileCode.'</code>';
   return $FileCode;
}
// ******************************************************** BitofExpert.php ***

