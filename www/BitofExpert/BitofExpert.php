<?php
// PHP7/HTML5, EDGE/CHROME                              *** BitofExpert.php ***

// ****************************************************************************
// * Крошки опыта           Кусочки информации о  преодоленных препятствиях в *
// *        программировании всего лишь одного человека. Здесь не представлен *
// *        весь путь: ассемблеры, алгол, фортран, кобол, бэйсик, c, clipper, *
// *        delphi, lazarus, java, PHP, js, apitor, arduino, chto-esche-budet * 
// ****************************************************************************

// v1.7, 24.02.2024                                   Автор:      Труфанов В.Е.
// Copyright © 2024 tve                               Дата создания: 21.01.2024

/**
 *  Замечания по парсингу файла HTML из MD (экспорт в ghostwriter 2.2.0)
 *  
 *  1. Экспорт формате Pandoc и *-"Умная типография".
 *  2. $regArts1 - регулярка для файла ".md" (в BitofExpert.html), которая подменяет
 *     вызов файла на url-запрос (по разному для local-сервера и реального сайта)
 *  3. $regImgs1 - регулярка для большинства изображений. По умолчанию все изображения
 *     в md-файлах локальные, размещаются в каталоге md-файла или в его подкаталогах. 
 *     $regImgs1 - подвешивает к имени файла изображения полный локальный путь.
 * 
 */



// Инициализируем массив изображений с шириной 40% для класса CSS: .imgWidth40
// и модифицируем текст страницы
function MakeImgWidth40($FileContent)
{
   // Перечень реальных файловизображений в разных файлах md->html
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
      
      // $regImgs1='/\/([0-9a-zA-Z\-]+)\.jpg"/uU';
      $sfilename=quotemeta($filename); // экранировали символы в имени файла
      $regImgs2='/\/'.$sfilename.'"/uU';
      $FileContent=preg_replace($regImgs2,'/'.$filename.'" class="imgWidth40"',$FileContent);
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
   $regArts1='/href="bife([a-zA-Z]+)\/([a-z\-]+)\/([a-z\-]+)\.md">([0-9a-zA-Z\.\(\)\s\/\-_<>="А-Яа-яЁё]+)<\/a>/uU';
   // Заменяем все ссылки на страницы .md (здесь используем два кармана: раздел и название материала)
   if (($_SERVER['HTTP_HOST']=='doortry.ru')||($_SERVER['HTTP_HOST']=='kwinflatht.nichost.ru'))
   {
      $FileContent=preg_replace($regArts1,'href="/kroshki-opyta/$1=$4">$4</a>',$FileContent);
   }
   else
   {
      $FileContent=preg_replace($regArts1,'href="?list=kroshki-opyta&par=$1&tit=$4">$4</a>',$FileContent);
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
// Инициируем имя xml-файла для показа
$FileXml='';
// Определяем спецификацию файла для его загрузки, загружаем его и модифицируем
$FileSpec=$FileDir.$FileName;

$FileContent=ReplaceHtmlExpert($FileSpec,'Крошки опыта');
// Модифицируем вызов имеющихся изображений, XML-файлов и меняем заголовок
if (($par>'')||($tit>''))
{
   // В файле .md могут быть показаны изображения след.образом:
   //    <p><img src="probnyj-proekt.jpg" /></p>
   //    <img src="Iwont.jpg" alt="“Да, я хочу удалить свой репозитарий”" />
   $regImgs1='/<img\ssrc="/uU';
   $FileContent=preg_replace($regImgs1,'<img src="'.$urlDir,$FileContent);
   // Отлавливаем изображения с заранее заданной шириной в процентах:
   // <p><img src="../BitofExpert/bifeGitHub/kak-udalit-repozitarij-iz-github/Dashboard.jpg" /></p>
   // <img src="../BitofExpert/bifeGitHub/kak-udalit-repozitarij-iz-github/Last-step.jpg" alt="Уфф! Всё." /><figcaption>Уфф! Всё.</figcaption>
   $FileContent=MakeImgWidth40($FileContent);

   // В файле .md могут быть ссылки на локальные XML-файлы след.образом:
   //    <a href="LCD-FM-RX-V2.0.xml">Формат FZP</a>
   // Делаем ссылку с относительным адресом файла
   $regXml1='/<a\shref="([a-zA-Z0-9\-\.]+)">/uU';
   $FileContent=preg_replace($regXml1,'<a href="'.$urlDir.'$1">',$FileContent);


   $FileContent=ReplaceHrefXml($FileContent,$SiteRoot);



   
   /*
   // Определяем имя xml-файла для показа
   $regXml='/href="\.\.(.*\.xml)/uU';
   $FileXml=prown\Findes($regXml,$FileContent);
   prown\ConsoleLog($FileXml);
   $FileXml=$SiteRoot.substr($FileXml,8); 
     
   // Отлавливаем ссылку на xml-файл и заменяем ее на прямой показ xml-файла:
   //   <h4 id="примерный-общий-вид-файла-fzp">
   //   <a href="../BitofExpert/bifeFritzing/predstavlenie-detali-komponenta-vo-fritzing/LCD-FM-RX-V2.0.xml">
   //   Примерный общий вид файла FZP</a></h4>
   if ($FileXml>$SiteRoot)
   {
      //$regXml='/<h4\s(.*)\.xml">(.*)<\/a><\/h4>/uU';
      //$FileContent=preg_replace($regXml,'<h4>$2</h4>'.highlight_xml($FileXml),$FileContent);
   } 
   */
   
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
// Трассируем xml-файл
// echo '['.$FileXml.']';


function ReplaceHrefXml($FileContent,$SiteRoot,$hteg='h4')
{
   // Находим все заголовки 'h4' со ссылками на файлы *.xml
   // $regXml='/href="\.\.(.*\.xml)/uU';
   $regXml='/<'.$hteg.'\s(.*)\.xml">(.*)<\/a><\/'.$hteg.'>/uU';
   
   $value=preg_match_all($regXml,$FileContent,$matches,PREG_OFFSET_CAPTURE);
   if ($value>0)
   { 
      $af=$matches[0];
      // Выделяем 
      foreach ($af as $matches2)
      {
         //echo '<br>***'.$matches2[0].'***<br>';
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
         //echo '$NameXml='.$NameXml.'<br>';
         //echo '$regNXml='.$regNXml.'<br>';
         //echo '$FileXml='.$FileXml.'<br>';
         //echo '$TitleXml='.$TitleXml.'<br>';
         
         // Формируем рег.выражение (экранируем)
         $regNXml='/'.preg_quote($NameXml,'/').'/uU';
         //echo '$regNXml='.$regNXml.'<br>';

         $FileContent=preg_replace($regNXml,$FileXml.'<br>',$FileContent);
         
         //$FileContent=preg_replace($regXml,'<'.$hteg.'>$2</'.$hteg.'>'.'<br>'.$FileXml.'<br>',$FileContent);
         //$FileContent=preg_replace($regXml,'<'.$hteg.'>$2</'.$hteg.'>'.'<br>'.$FileXml.'<br>',$FileContent);
   
         //$FileContent=preg_replace($regXml,'<'.$hteg.'>'.$TitleXml.'</'.$hteg.'>'.highlight_xml($FileXml),$FileContent);
         
         
      }
   }
   //$FileContent=preg_replace($regXml,'<'.$hteg.'>$2</'.$hteg.'>'.'<br>'.$FileXml.'<br>',$FileContent);
   
   
   
   
   
   
   /*
   $value=preg_match_all($regXml,$FileContent,$matches,PREG_OFFSET_CAPTURE);
   if ($value>0)
   { 
      $af=$matches[0];
      // Выделяем 
      foreach ($af as $matches2)
      {
         //echo '<br>***'.$matches2[0].'***<br>';
         $afNames[]=$matches2[0];
      }
      // Проходим по выбранным ссылкам на xml-файлы  
      foreach ($afNames as $NameXml)
      {
         //echo $NameXml;
         // Выбираем имена файлов
         //$regXml='/<'.$hteg.'\s(.*)\.xml">(.*)<\/a><\/'.$hteg.'>/uU';
         // Определяем имя xml-файла для показа
         $regXml='/href="\.\.(.*\.xml)/uU';
         $FileXml=prown\Findes($regXml,$NameXml);
         $FileXml=$SiteRoot.substr($FileXml,8); 
         echo '$FileXml='.$FileXml.'<br>';
         
         if ($FileXml>$SiteRoot)
         {
            //$regXml='/<'.$hteg.'\s(.*)\.xml">(.*)<\/a><\/'.$hteg.'>/uU';
            //echo '<br>';
            //echo $NameXml; 
            //echo '<br>';
            //echo addslashes($NameXml); 
            //echo '<br>';
            $regXml='/<'.$hteg.'\s(.*)\.xml">(.*)<\/a><\/'.$hteg.'>/uU';
            //echo '$regXml ='.$regXml.'<br>';
            //echo '$NameXml='.$NameXml.'<br>';
            //echo 'addslashes($FileXml)='.addslashes($FileXml).'<br>';
            //$FileContent=preg_replace($regXml,'***',$FileContent);
            //$FileContent=preg_replace($regXml,'<'.$hteg.'>$2</'.$hteg.'>'.highlight_xml($FileXml),$FileContent);
         } 

         
      } 
      
         
   }
   */
   return $FileContent;

}


// Из XML-файла получить раскрашенный текст
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

// ******************************************************** BitofExpert.php ***

