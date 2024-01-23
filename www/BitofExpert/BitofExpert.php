<?php
// PHP7/HTML5, EDGE/CHROME                              *** BitofExpert.php ***

// ****************************************************************************
// * Крошки опыта           Кусочки информации о  преодоленных препятствиях в *
// *        программировании всего лишь одного человека. Здесь не представлен *
// *        весь путь: ассемблеры, алгол, фортран, кобол, бэйсик, c, clipper, *
// *        delphi, lazarus, java, PHP, js, apitor, arduino, chto-esche-budet * 
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  21.01.2024
// Copyright © 2024 tve                              Посл.изменение: 23.01.2024


function ReplaceHtmlExpert($FileSpec,$Title,$BitofExpertCSS='<link rel="stylesheet" href="../BitofExpert/BitofExpert.css">')
{
   //prown\Alert($FileSpec);
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
   // Заменяем расширения подгружаемых файлов 'md' на 'html'
   $FileContent=str_replace('.md"','.html"',$FileContent);
   // Заменяем каталог загрузки подгружаемых файлов html
   $FileContent=str_replace('href="bife','href="BitofExpert/bife',$FileContent);
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

/*
// Загружаем файл html
$FileContent=file_get_contents($SiteRoot."/Pages/BitofExpert/BitofExpert.html");

// Специальные символы следует экранировать обратной наклонной чертой (обратным слэшем) "\"

// Спецсимволы, которые следует экранировать:             $ ^ . * + ? \ { } [ ] ( ) |
// по опыту tve (22.01.2024) экранировать:                -
// если ограничитель рег.выражения / , то экранировать:   /
// экранировать пробел, перевод строки, возврат каретки:  \s \n \r

// Не являются спецсимволами:                             // @ : , ' " ; - _ = < > % # ~ ` & ! /

$FileContent=preg_replace('/<!DOCTYPE([0-9a-zA-Zа-яёА-ЯЁ><!=":;,%\[\]\{\}\/\-\.\s\n\r]+)body/u', '<body', $FileContent);
echo $FileContent;
*/

//require_once "BitofExpert.html";

$Text=
'<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="" xml:lang="">
<head>
  <meta charset="utf-8" />
  <meta name="generator" content="pandoc" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
  <title>Untitled</title>
  <style type="text/css">
      code{white-space: pre-wrap;}
      span.smallcaps{font-variant: small-caps;}
      span.underline{text-decoration: underline;}
      div.line-block{white-space: pre-line;}
      div.column{display: inline-block; vertical-align: top; width: 50%;}
  </style>
  <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
  <![endif]-->
</head>
<body>
Hello World!
</body>
</html>
';

//require_once "Replaces.php";

/*
// Заменяем текст второй строки на <html>
$beg='<html';
$endreg='lang="">';
$newfrag='<html>';
echo prown\Replaces($beg,$Text,$endreg,$newfrag);
*/

/*
// На место трех строк meta вставляем только первую
$beg='<meta';
$endreg='"\s\/>';
$newfrag='<meta charset="utf-8" />';
echo prown\Replaces($beg,$Text,$endreg,$newfrag);
*/

/*
// Убираем все строки стиля (включая возврат каретки и перевод строки вначале)
$begreg='\/title>';
$endreg='\/style>';
$newfrag='/title>';
echo prown\Replaces($begreg,$Text,$endreg,$newfrag);
*/

// Готовим ссылку на файл CSS-стилей для файлов темы BitofExpert
//$BitofExpertCSS='<link rel="stylesheet" href="BitofExpert/BitofExpert.css">';
//$BitofExpertCSS='<link rel="stylesheet" href="'.'../'.'BitofExpert/BitofExpert.css">';



/*
//
//$SiteRoot=preg_quote($SiteRoot);
// Готовим ссылку на файл CSS-стилей для файлов темы BitofExpert
$BitofExpertCSS='<link rel="stylesheet" href="'.'../../'.'BitofExpert/BitofExpert.css">';
// Обрабатываем файлы раздела Windows
prown\ConsoleLog('$SiteRoot='.$SiteRoot);
$FileSpec=$SiteRoot."/BitofExpert/bifeGitHub/kak-udalit-repozitarij-v-github/kak-udalit-repozitarij-v-github.html";
$FileContent=ReplaceHtmlExpert($FileSpec,'Как удалить репозитарий из GitHub',$BitofExpertCSS);
*/

// Обрабатываем корневой файл темы BitofExpert, не изменяя его самого
// prown\ConsoleLog('$SiteRoot='.$SiteRoot);
$FileSpec=$SiteRoot."/BitofExpert/BitofExpert.html";
$FileContent=ReplaceHtmlExpert($FileSpec,'Крошки опыта');
echo $FileContent;

// ******************************************************** BitofExpert.php ***

